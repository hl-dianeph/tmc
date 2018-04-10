<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\Category;
use App\Models\StaticPage;
use App\Repositories\CategoryRepository;
use App\Repositories\ChannelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;

class FrontendController extends AppBaseController
{
    /** @var  ChannelRepository */
    private $channelRepository;
    private $categoryRepository;
    private $perPage = 3;
    private $top = 9;

    public function __construct(ChannelRepository $channelRepo, CategoryRepository $categoryRepo)
    {
        $this->channelRepository = $channelRepo;
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the channels.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->channelRepository->pushCriteria(new RequestCriteria($request));
        $channels = $this->channelRepository->getTop($this->top);

        return view('frontend.index')
            ->with('channels', $channels)
            ->with('top', $this->top);
    }

    /**
     * Categories
     */
    public function showCategories(Request $request) {
    	$this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoryRepository->getForIndex($this->perPage);

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
