<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
    	return view('frontend.index');
    }

    /**
     * Categories
     */
    public function showCategories() {
    	$categories = Category::orderBy('id', 'DESC')->paginate(10);
    	// dd($categories->toArray());
    	return view('frontend.categories.index', compact('categories'));
    }

    /**
     * Create channel - TODO: own controller? (I guess yes!)
     */
    public function showCreateChannel() {
    	
    	return view('frontend.channels.create', compact('categories'));
    }



    /**
     * Static page: by slug
     */
    public function showStaticPage($slug) {
    	// TODO: use repository
    	$page = StaticPage::whereSlug($slug)->firstOrFail();

    	return view('frontend.static', compact('page'));
    }
}
