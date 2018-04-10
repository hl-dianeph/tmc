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
    private $perPage = 2;
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
        $categories = $this->categoryRepository->getAll();

    	return view('frontend.categories.index', compact('categories'));
    }

    /**
     * Category
     */
    public function showCategory(Request $request, $slug) {
        $category = $this->categoryRepository->getBySlug($slug);
        // dd($category->toArray());

        if (empty($category)) {
            return redirect(route('categories.index'));
        }

        $this->channelRepository->pushCriteria(new RequestCriteria($request));
        $channels = $this->channelRepository->getByCategory($category->id, $this->perPage);

        $prevLink = $channels->previousPageUrl();
        $nextLink = $channels->nextPageUrl();

        return view('frontend.categories.show', compact('category', 'channels', 'prevLink', 'nextLink'));
    }

    /**
     * Channel
     */
    public function showChannel(Request $request, $name) {
        $channel = $this->channelRepository->getByName($name);

        if (empty($channel)) {
            return redirect(route('channels.index'));
        }

        // hit++
        $channel->hits += 1;
        $channel->save();

        // api call -> members count
        $membersCount = $channel->members_count;

        $client = new \GuzzleHttp\Client();
        
        // TODO: make const urls
        $baseUrl = 'https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN');
        $urlGetChatMembersCount = $baseUrl . '/getChatMembersCount';

        try {
            $responseGetChatMembersCount = $client->request('GET', $urlGetChatMembersCount, [
                'query' => ['chat_id' => $channel->name]
            ]);

            $dataGetChatMembersCount = json_decode($responseGetChatMembersCount->getBody()->getContents());
            $membersCount = $dataGetChatMembersCount->result;
        } catch (\Exception $e) {
            // ...
        }

        return view('frontend.channels.show', compact('channel', 'membersCount'));
    }

    /**
     * Search
     */
    public function search(Request $request) {
        $search = $request->q;
        $channels = $this->channelRepository->search($search);

        return view('frontend.categories.search', compact('channels', 'search'));
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
