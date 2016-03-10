<?php

namespace App\Http\Controllers\API;

use Validator;
use App\Http\Controllers\Controller;
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

		$this->validate($request, [
			'naam' => 'max:256',
			'artist' => 'max:256',
			'description' => 'max:4096',
			'retail' => 'numeric',
			'year' => 'numeric'
		]);


		$query = Painting::query();

		if(! empty($data['naam']))
			$query->where('naam', 'like', '%' . $data['naam'] . '%');

		if(! empty($data['artist']))
			$query->where('artist', 'like', '%' . $data['artist'] . '%');

		if(! empty($data['description']))
			$query->where('description', 'like', '%' . $data['description'] . '%');

		if(! empty($data['retail']))
			$query->where('retail', '=', $data['retail']);

		if(! empty($data['year']))
			$query->where('year', '=', $data['year']);

		return response()->json($query->paginate(1));
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
