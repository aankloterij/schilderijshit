<?php

namespace App\Http\Controllers\API;

use Validator;
use App\Painting;
use App\Http\Requests;
use Illuminate\Http\Request;

class PaintingController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function search(Request $request){

		$data = $request->only([
			'naam',
			'artist',
			'description',
			'retail',
			'year'
		]);

		Validator::make($data, [
			'naam' => 'max:256',
			'artist' => 'max:256',
			'description' => 'max:4096',
			'retail' => 'numeric',
			'year' => 'numeric'
		]);


		$query = Painting::query();

		if(isset($data['naam']))
			$query->where('naam', 'like', '%' . $data['naam'] . '%');

		if(isset($data['artist']))
			$query->where('artist', 'like', '%' . $data['artist'] . '%');

		if(isset($data['description']))
			$query->where('description', 'like', '%' . $data['description'] . '%');

		if(isset($data['retail']))
			$query->where('retail', '=', $data['retail']);

		if(isset($data['year']))
			$query->where('year', '=', $data['year']);

		return response()->json($query->paginate(20));
	}

	public function get($id){

		if(!is_numeric($id))
			return response()->json([
				"error" => [
					"status" => 400,
					"message" => "The id must be numeric"
				]
			]);

		$painting = Painting::find($id);


		// The painting was not found
		if($painting == null)
			return response()->json([
				"error" => [
					"status" => 404,
					"message" => "This painting was not found"
				]
			]);

		return response()->json($painting);
	}


}
