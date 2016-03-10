<?php

namespace App\Http\Controllers;

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

	public function create(Request $request){
		$this->validate($request, [

			'naam' => 'required|max:256',
			'artist' => 'max:256',
			'description' => 'max:4096',

			'image_location' => 'required|max:256',

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
		return view('painting.new');
	}

	public function get($id){

		if(!is_numeric($id))
			return view('errors.blank', [
				'status' => 400,
				'message' => 'The <code>ID</code> must be numeric'
			]);

		$painting = Painting::find($id);

		if($painting == null)
			return view('errors.blank', [
				'status' => 404,
				'message' => "A painting with the id <code>{$id}</code> does not exist"
			]);

		return view('painting.view', ['painting' => $painting]);
	}

	/**
	 * Show the search page
	 */
	public function search(Request $request){
		return view('painting.search');
	}

	public function quickSearch(Request $request){

		$this->validate($request, [
			'naam' => 'required|max:256'
		]);

		$naam = $request->input('naam');

		$paintings = Painting::where('naam', 'like', '%' . $naam . '%')->get();

		if($naam == null)
			return redirect('/dashboard');

		return view('painting.quicksearch', ['paintings' => $paintings]);
	}

	public function showCatalog(){
		$paintings = Painting::simplePaginate(10);

		return view('painting.catalog', ['paintings' => $paintings]);
	}

	public function delete($id){

		Validator::make(
			[
				'id' => $id
			],
			[
				'id' => 'numeric|required'
			]
		);

		Painting::destroy($id);

		return redirect('/dashboard');
	}
}
