<?php

namespace App\Http\Controllers;

use App\Painting;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PaintingsController extends Controller
{
	public function showSearch(Request $request)
	{
		$paintings = $this->doSearch($request);

		if ($request->ajax()) return $paintings->toJson();

		return view('painting.search')->withPaintings($paintings);
	}

	public function doSearch(Request $request)
	{
		// soort van api-call -> json response!
		$query = Painting::query();

		if ($naam = $request->get('naam')) $this->addConstraint($query, 'naam', $naam);
		if ($artist = $request->get('artist')) $this->addConstraint($query, 'artist', $artist);
		if ($description = $request->get('description')) $this->addConstraint($query, 'description', $description);
		if ($retail = $request->get('retail')) $this->addNumConstraint($query, 'retail', $retail);
		if ($year = $request->get('year')) $this->addNumConstraint($query, 'year', $year);

		return $query->paginate();
	}

	protected function addConstraint(Builder $query, $key, $value)
	{
		return $query->orWhere($key, 'LIKE', "%$value%");
	}

	protected function addNumConstraint(Builder $query, $key, $value)
	{
		if (preg_match("/(.*) (\d)/", $value, $matches))
		{
			list($value, $operator, $ammount) = $matches;
		}

		else
		{
			$ammount = $value;
			$operator = '=';
		}

		if ($operator == '<' || $operator == '>') $operator .= '=';

		return $query->orWhere($key, $operator, preg_replace('/\D/', '', $ammount));
	}

	public function showSinglePainting(Painting $painting)
	{
		return view('painting.single')->withPainting($painting);
	}
}
