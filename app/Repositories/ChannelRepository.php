<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Channel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $avatar = ($data['avatar_local']) ? Image::make(public_path(Channel::IMAGE_PUBLIC_TMP_DIR . $data['avatar_local'])) : Image::make($data['avatar']);
        $imageName = Channel::IMAGE_PUBLIC_DIR . $data['telegram_id'] . '.jpg';
        $avatar->save(public_path($imageName, 80));
        $data['avatar'] = $imageName;

        return $this->create($data);
    }

    // update old
    public function updateOld($input, $old) {
        // avatar
        if (isset($input['avatar'])) {
            $imageName = $input['telegram_id'] . '.' . $input['avatar']->getClientOriginalExtension();

            // TODO: DRY!
            try {
                // upload new
                $input['avatar']->move(public_path(Channel::IMAGE_PUBLIC_DIR), $imageName);
                $input['avatar'] = Channel::IMAGE_PUBLIC_DIR . $imageName;
            } catch (\Exception $e) {
                // ...
            }
        }

        // tags
        $tags = explode(',', $input['tags']);
        $old->syncTags([]);
        
        foreach ($tags as $key => $tag) {
            $old->attachTag(trim($tag));
        }

        // TODO: try-catch?
        return $this->update($input, $old->id);
    }

    // get /index
    public function getForIndex($perPage) {
        return $this->makeModel()->published()->orderBy('id', 'DESC')->paginate(
            $perPage,
            ['id', 'title', 'name', 'description', 'avatar']
        );
    }

    // get by category
    public function getByCategory($categoryId, $perPage) {
        return $this->makeModel()->published()->where('category_id', $categoryId)->orderBy('id', 'DESC')->paginate(
            $perPage,
            ['id', 'title', 'name', 'description', 'avatar', 'members_count']
        );
    }

    // get by name
    public function getByName($name) {
        return $this->makeModel()->where('name', $name)->first();
    }

    // search
    public function search($q) {
        $result = collect();

        // name, title, description
        $channels = $this->makeModel()
            ->where('status', 'published')
            ->where('name', 'like', '%' . $q . '%')
            ->orWhere('title', 'like', '%' . $q . '%')
            ->orWhere('description', 'like', '%' . $q . '%')
            ->orderBy('members_count', 'DESC')
            ->get(['id', 'avatar', 'name', 'title', 'description', 'category_id']);

        foreach ($channels as $channel) {
            $result[$channel->id] = $channel;
        }

        // categories
        $categories = Category::with('channels')
            ->where('name', 'like', '%' . $q . '%')
            ->get(['id', 'name']);

        foreach ($categories as $category) {
            foreach ($category->channels as $channel) {
                $result[$channel->id] = $channel;
            }
        }

        return $channels; 
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

    // get stats
    public function getStats() {
        $today = \Carbon\Carbon::today();
        $weekAgo = \Carbon\Carbon::today()->subWeek();
        $monthAgo = \Carbon\Carbon::today()->subMonth();

        $yesterday = \Carbon\Carbon::today()->subDay();
        // dd($yesterday);

        $countTotal = Channel::published()->count();
        $countToday = Channel::published()->where('published_at', '>', $today)->count();
        $countWeek = Channel::published()->where('published_at', '>', $weekAgo)->count();
        $countMonth = Channel::published()->where('published_at', '>', $monthAgo)->count();

        $countYesterday = Channel::published()->where('published_at', '>', $yesterday)->count();

        $todayDiff = $countToday - $countYesterday;


        return [
            'total' => $countTotal,
            'today' => $countToday,
            'weekAgo' => $countWeek,
            'countMonth' => $countMonth,

            'todayDiff' => $todayDiff,
        ];
    }
}
