<?php

namespace App\Http\Controllers;

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
            'painted_at'
        ]);

        $painting = Painting::create($data);
    }

    public function showCreateForm(){
        return view('newpainting');
    }
}
