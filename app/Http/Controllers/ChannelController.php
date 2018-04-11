<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\AddChannelStep3Request;
use App\Http\Requests\AddChannelStep5Request;
use App\Http\Requests\CreateChannelRequest;
use App\Http\Requests\UpdateChannelRequest;
use App\Models\Channel;
use App\Models\Type;
use App\Repositories\ChannelRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ChannelController extends AppBaseController
{
    /** @var  ChannelRepository */
    private $channelRepository;
    private $_perPage = 3;

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
        $channels = $this->channelRepository->getForIndex($this->_perPage);

        return view('backend.channels.index')
            ->with('channels', $channels)
            ->with('page', $request->page);
    }

    /**
     * Show the form for creating a new Channel.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.channels.create');
    }

    /**
     * Store a newly created Channel in storage.
     *
     * @param CreateChannelRequest $request
     *
     * @return Response
     */
    public function store(CreateChannelRequest $request)
    {
        $input = $request->all();

        $channel = $this->channelRepository->create($input);

        Flash::success('Канал успешно сохранен.');

        return redirect(route('backend.channels.index'));
    }

    /**
     * Display the specified Channel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $channel = $this->channelRepository->findWithoutFail($id);

        if (empty($channel)) {
            Flash::error('Канал не найден');

            return redirect(route('backend.channels.index'));
        }

        return view('backend.channels.show')->with('channel', $channel);
    }

    /**
     * Show the form for editing the specified Channel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $channel = $this->channelRepository->findWithoutFail($id);

        if (empty($channel)) {
            Flash::error('Канал не найден');

            return redirect(route('backend.channels.index'));
        }

        return view('backend.channels.edit')
            ->with('channel', $channel)
            ->with('tags', $channel->tags->pluck('name')->implode(', '))
            ->with('page', $request->page);
    }

    /**
     * Update the specified Channel in storage.
     *
     * @param  int              $id
     * @param UpdateChannelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChannelRequest $request)
    {
        // dd($request->validated());

        $channel = $this->channelRepository->findWithoutFail($id);

        if (empty($channel)) {
            Flash::error('Канал не найден');

            return redirect(route('backend.channels.index'));
        }

        // dd($request->validated());

        $channel = $this->channelRepository->updateOld($request->validated(), $channel);

        Flash::success('Канал успешно обновлен.');

        return redirect(route('backend.channels.index'));
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
            Flash::error('Канал не найден');

            return redirect(route('backend.channels.index'));
        }

        $this->channelRepository->destroy($channel);

        Flash::success('Канал успешно удален.');

        return redirect(route('backend.channels.index'));
    }


    // ajax /addchannel-step1
    public function ajaxPostAddChannelStep1(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:channels',
        ]);

        if ($validator->fails()) {
            return ['status' => 'error', 'errors' => 'Ошибка: укажите название канала или канал уже существует'];
        }

        return ['status' => 'ok'];
    }

    // ajax /addchannel-step2
    public function ajaxPostAddChannelStep2(Request $request) {
        return ['status' => 'ok'];
    }

    // ajax /addchannel-step3
	public function ajaxPostAddChannelStep3(Request $request) {
		$validator = Validator::make($request->all(), [
            'category_id' => 'required|numeric',
            'description' => 'required',
            // 'email' => 'required|email'
        ]);

		if ($validator->fails()) {
			return ['status' => 'error', 'errors' => $validator->errors()];
		}

		return ['status' => 'ok'];
	}

	// ajax /post-checkchannel-subscription
	public function ajaxPostCheckChannelSubscription(Request $request) {
		// TODO: don't repeat yourself
		$client = new \GuzzleHttp\Client();
    	
    	// TODO: make const urls
    	$baseUrl = 'https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN');
    	$urlGetChatMember = $baseUrl . '/getChatMember';

    	$user = Auth::user();

    	try {
			$responseGetChatMember = $client->request('GET', $urlGetChatMember, [
				'query' => ['chat_id' => '@dianeph', 'user_id' => $user->telegram_id]
			]);

			// $dataGetChatMember = json_decode($responseGetChatMember->getBody()->getContents());
			$data = json_decode($responseGetChatMember->getBody()->getContents());
			

			$res = [
				'status' => $data->result->status
			];

			return $res;
		} catch (\Exception $e) {
			return ['status' => 'error', 'message' => $e->getMessage()];
		}
	}

    // ajax /upload avatar
    public function ajaxPostUploadAvatar(Request $request) {
        if (!$request->hasFile('avatar')) {
            return ['status' => 'error', 'message' => 'Пожалуйста выберите изображение'];
        }

        // TODO: validate
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|file|mimes:jpg,png,jpeg|max:1024|dimensions:ratio=1/1,min_width:640,min_height:640',
            // 'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return ['status' => 'error', 'errors' => 'Ошибка:<br>- тип изображения: jpeg, jpg, png<br>- размер: не более 1024 Кб<br>- ширина х высота: 640х640 (минимум)'];
        }

        // upload
        $imageName = $request->id . '.' . $request->avatar->getClientOriginalExtension();

        try {
            $request->avatar->move(public_path(Channel::IMAGE_PUBLIC_TMP_DIR), $imageName);
            return [
                'status' => 'ok', 
                'path' => asset(Channel::IMAGE_PUBLIC_TMP_DIR . $imageName),
                'local_path' => $imageName
            ];

        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    // ajax /getchat
    public function ajaxGetChannel(Request $request) {
    	// TODO: validate here
    	// ...

    	$client = new \GuzzleHttp\Client();
    	
    	// TODO: make const urls
    	$baseUrl = 'https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN');
    	$baseFileUrl = 'https://api.telegram.org/file/bot' . env('TELEGRAM_BOT_TOKEN');

    	$urlGetChat = $baseUrl . '/getChat';
    	$urlGetChatMembersCount = $baseUrl . '/getChatMembersCount';
    	$urlGetFile = $baseUrl . '/getFile';

    	// TODO: add '@' if missing in the beginning

    	try {
			$responseGetChat = $client->request('GET', $urlGetChat, [
				'query' => ['chat_id' => $request->name]
			]);

			$dataGetChat = json_decode($responseGetChat->getBody()->getContents());

			// get members' count
			$count = 0;
			$responseGetChatMembersCount = $client->request('GET', $urlGetChatMembersCount, [
				'query' => ['chat_id' => $request->name]
			]);

			$dataGetChatMembersCount = json_decode($responseGetChatMembersCount->getBody()->getContents());
			$count = $dataGetChatMembersCount->result;

			// get avatar
			$avatar = null;
			$avatarExists = false;

			if (!isset($dataGetChat->result->photo)) {
				$avatar = asset(Channel::IMAGE_PUBLIC_DIR . Channel::DEFAULT_IMAGE);
			} else {
				$responseGetFile = $client->request('GET', $urlGetFile, [
					'query' => ['file_id' => $dataGetChat->result->photo->big_file_id]
				]);
				$dataGetFile = json_decode($responseGetFile->getBody()->getContents());
				$avatar = $baseFileUrl . '/' . $dataGetFile->result->file_path;
				$avatarExists = true;
			}

			$res = [
				'status' => 'ok',
				'result' => [
					'id' => $dataGetChat->result->id,
					'title' => $dataGetChat->result->title,
					'name' => $dataGetChat->result->username,
					'description' => $dataGetChat->result->description,
					'type' => $dataGetChat->result->type,
					'count' => $count,
					'avatar' => $avatar,
					'avatar_exists' => $avatarExists
				],
				// TODO: remove from production
				// 'debug' => [
				// 	'getChat' => $dataGetChat,
				// 	'getChatMembersCount' => $dataGetChatMembersCount,
				// 	'getFile' => $dataGetFile
				// ]
			];

			return $res;
		} catch (\Exception $e) {
			return ['status' => 'error', 'message' => $e->getMessage()];
		}
    }

    // ajax /post create channel
    public function ajaxPostCreateChannel(AddChannelStep5Request $request) {
        try {
            $channel = $this->channelRepository->addChannel($request->all(), Type::TYPE_CHANNEL, Auth::user());

            return ['status' => 'ok'];
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
            // return ['status' => 'error', 'message' => 'Произошла ошибка на сервере, попробуйте позднее'];
        }
    }
}
