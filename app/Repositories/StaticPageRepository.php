<?php

namespace App\Repositories;

use App\Models\StaticPage;
use Illuminate\Support\Str;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StaticPageRepository
 * @package App\Repositories
 * @version April 4, 2018, 4:20 pm UTC
 *
 * @method StaticPage findWithoutFail($id, $columns = ['*'])
 * @method StaticPage find($id, $columns = ['*'])
 * @method StaticPage first($columns = ['*'])
*/
class StaticPageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'slug',
        'content',
        'keywords',
        'og_description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StaticPage::class;
    }

    // get /index
    public function getForIndex($perPage) {
        return $this->orderBy('id', 'DESC')->paginate(
            $perPage,
            ['id', 'name', 'slug', 'content']
        );
    }

    // create new
    public function storeNew($input) {
        // slug
        $input['slug'] = Str::slug($input['name']);

        return $this->create($input);
    }

    // update old 
    public function updateOld($input, $old) {
        // slug
        // $input['slug'] = Str::slug($input['name']);

        // TODO: try-catch?
        return $this->update($input, $old->id);
    }

    // delete
    public function destroy($staticPage) {
        // TODO: try-catch?
        return $this->delete($staticPage->id);
    }
}
