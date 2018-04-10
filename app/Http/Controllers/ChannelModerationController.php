<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Repositories\ChannelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;

class ChannelModerationController extends AppBaseController
{
    /** @var  ChannelRepository */
    private $channelRepository;

    protected $_perPage = 3;

    public function __construct(ChannelRepository $channelRepo)
    {
        $this->channelRepository = $channelRepo;
    }

    /**
     * Display a listing of the Channel.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->channelRepository->pushCriteria(new RequestCriteria($request));
        $channels = $this->channelRepository->getUnderModeration($this->_perPage);

        return view('backend.channels.moderation.index')
            ->with('channels', $channels)
            ->with('page', $request->page);
    }

    /**
     * Show the form for moderating the specified channel.
     *
     * @param  Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $channel = $this->channelRepository->with('author')->findWithoutFail($id);

        if (empty($channel)) {
            Flash::error('Channel not found');

            return redirect(route('backend.channels.moderation.index'));
        }

        // re-moderation
        $channel->status = 'draft';
        $channel->save();

        return view('backend.channels.moderation.edit')
            ->with('channel', $channel)
            ->with('page', $request->page);
    }

    /**
     * Moderate.
     *
     * @param  int              $id
     * @param Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function moderate($id, Request $request)
    {
        $channel = $this->channelRepository->findWithoutFail($id);

        if (empty($channel)) {
            Flash::error('Channel not found');

            return redirect(route('backend.channels.moderation.index'));
        }

        // decline
        if ($request->has('decline')) {
    		$channel->status = 'declined';
    		$channel->save();

    		return redirect(route('backend.channels.moderation.index'));
    	}

    	// accept
    	$validator = Validator::make($request->all(), [
    		'keywords' => 'required',
    		'og_description' => 'required',
    		'description' => 'required',
    		'tags' => 'required'
    	]);

    	if ($validator->fails()) {
    		return redirect()->back()->withInput()->withErrors($validator);
    	}

    	$channel = $this->channelRepository->moderate($request->all(), $channel);

        Flash::success('Channel accepted and published successfully.');

        return redirect(route('backend.channels.moderation.index', ['page' => $request->page]));
    }

    /**
     * Remove the specified Channel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $channel = $this->channelRepository->findWithoutFail($id);

        if (empty($channel)) {
            Flash::error('Channel not found');

            return redirect(route('backend.channels.moderation.index'));
        }

        $this->channelRepository->destroy($channel);

        Flash::success('Channel deleted successfully.');

        return redirect(route('backend.channels.moderation.index'));
    }
}
