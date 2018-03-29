<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
	/**
	 * Index / Dashboard page.
	 */
    public function index() {
    	return view('backend.index');
    }
}
