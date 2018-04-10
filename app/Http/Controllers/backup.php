// ajax /addchat-step3
	public function ajaxPostAddChannelStep3(CreateCRequest $e) {

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
				// TODO: use const from model
				$avatar = 'channels/default.png';
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
				'debug' => [
					'getChat' => $dataGetChat,
					'getChatMembersCount' => $dataGetChatMembersCount,
					'getFile' => $dataGetFile
				]
			];

			return $res;
		} catch (\Exception $e) {
			return ['status' => 'error', 'message' => $e->getMessage()];
		}
    }