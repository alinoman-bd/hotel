<?php

namespace App\Http\Controllers\Design;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function index()
	{
		dd(Auth::user()->toArray());
		return view('design.index');
	}
	public function informationForm()
	{
		return view('design.information-form');
	}
	public function faq()
	{
		return view('design.faq');
	}
	public function details()
	{
		return view('design.details');
	}
	public function profile()
	{
		return view('design.profile');
	}
	public function searchResult()
	{
		return view('design.search-result');
	}
}
