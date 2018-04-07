<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // dd('sdf');
    	if (!Auth::check()) {
            return redirect(route('login.telegram')); 
        }
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
