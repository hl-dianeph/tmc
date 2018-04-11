<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Repositories\ChannelRepository;
use Illuminate\Http\Request;

class BackendController extends AppBaseController
{
	/** @var  ChannelRepository */
    private $channelRepository;

    public function __construct(ChannelRepository $channelRepo)
    {
        $this->channelRepository = $channelRepo;
    }

	/**
	 * Index / Dashboard page.
	 */
    public function index() {
    	$today = \Carbon\Carbon::today()->format('d-m-Y');
    	$stats = $this->channelRepository->getStats();

    	return view('backend.index', compact('stats', 'today'));
    }
}
