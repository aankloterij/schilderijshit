<?php

namespace App\Http\Controllers;

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

	public function create(Request $request){
		$this->validate($request, [

			'naam' => 'required|max:512',
			'artist' => 'max:512',
			'description' => 'max:4096',

			'image_location' => 'required|max:512',

			'width' => 'required',
			'height' => 'required',

		]);

		$data = $request->only([
			'naam',
			'artist',
			'description',
			'retail',
			'image_location',
			'width',
			'height',
			'year'
		]);

		$painting = Painting::create($data);

		return redirect('/painting/' . $painting->id);
	}

	public function showCreateForm(){
		return view('newpainting');
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

		if(request()->wantsJson()){

			// The painting was not found
			if($painting == null)
				return response()->json([
					"error" => [
						"status" => 404,
						"message" => "This painting was not found"
					]
				]);

			return response()->json($painting);
		}else
			return view('painting.view', ['painting' => $painting]);

	}

	public function search($id){

	}
}
