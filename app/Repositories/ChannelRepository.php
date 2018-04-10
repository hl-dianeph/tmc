<?php

namespace App\Repositories;

use App\Models\Channel;
use Illuminate\Support\Facades\Auth;
use InfyOm\Generator\Common\BaseRepository;
use Intervention\Image\Facades\Image;

/**
 * Class ChannelRepository
 * @package App\Repositories
 * @version April 8, 2018, 5:48 am UTC
 *
 * @method Channel findWithoutFail($id, $columns = ['*'])
 * @method Channel find($id, $columns = ['*'])
 * @method Channel first($columns = ['*'])
*/
class ChannelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'name',
        'type_id',
        'category_id',
        'avatar',
        'description',
        'keywords',
        'og_description',
        'status',
        'published_at',
        'members_count',
        'telegram_id',
        'telegram_type',
        'author_id',
        'moder_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Channel::class;
    }


    // get top
    public function getTop($limit) {
        return $this->makeModel()
            ->published()
            ->orderBy('members_count', 'DESC')
            ->limit($limit)
            ->get([
                'id', 'title', 'name', 'description', 'avatar', 'members_count'
            ]);
    }



    // add channel from frontend
    public function addChannel($data, $typeId, $author) {
        $data['type_id'] = $typeId;
        $data['author_id'] = $author->id;

        // save image, 80% quality is OK
        $avatar = Image::make($data['avatar']);
        $imageName = Channel::IMAGE_PUBLIC_DIR . $data['telegram_id'] . '.jpg';
        $avatar->save(public_path($imageName, 80));
        $data['avatar'] = $imageName;

        return $this->create($data);
    }

    // get /index
    public function getForIndex($perPage) {
        return $this->makeModel()->published()->orderBy('id', 'DESC')->paginate(
            $perPage,
            ['id', 'title', 'name', 'description', 'avatar']
        );
    }

    // get under moderation
    public function getUnderModeration($perPage) {
        return $this->makeModel()->where('status', Channel::STATUS_DRAFT)->orderBy('id', 'DESC')->paginate(
            $perPage,
            ['id', 'title', 'name', 'avatar', 'description']
        );
    }

    // moderate
    public function moderate($data, $channel) {
        $tags = explode(',', $data['tags']);

        // tags
        $channel->syncTags([]);
        
        foreach ($tags as $key => $tag) {
            $channel->attachTag(trim($tag));
        }

        // other
        $channel->keywords = trim($data['keywords']);
        $channel->og_description = trim($data['og_description']);
        $channel->description = trim($data['description']);
        $channel->status = 'published';
        $channel->moder_id = Auth::user()->id;
        $channel->published_at = date('Y-m-d H:i:s');
        $channel->save();

        return $channel;
    }

    // delete
    public function destroy($channel) {
        try {
            unlink(public_path($channel->avatar));
        } catch (\Exception $e) {
            // ...
        }

        // TODO: try-catch?
        return $channel->forceDelete();
    }
}
