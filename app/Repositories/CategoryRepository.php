<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CategoryRepository
 * @package App\Repositories
 * @version March 29, 2018, 7:08 am UTC
 *
 * @method Category findWithoutFail($id, $columns = ['*'])
 * @method Category find($id, $columns = ['*'])
 * @method Category first($columns = ['*'])
*/
class CategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'short_desc',
        'full_desc',
        // 'image',
        // 'keywords',
        // 'og_description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Category::class;
    }

    // get /index
    public function getForIndex($perPage) {
        return $this->orderBy('id', 'DESC')->paginate(
            $perPage,
            ['id', 'name', 'slug', 'short_desc', 'full_desc', 'image']
        );
    }

    // create new
    public function storeNew($input) {
        // slug
        $input['slug'] = Str::slug($input['name']);

        // image
        $imageName = time() . '-' . $input['slug'] . '.' . $input['image']->getClientOriginalExtension();

        try {
            $input['image']->move(public_path(Category::IMAGE_PUBLIC_DIR), $imageName);
            $input['image'] = $imageName;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return $this->create($input);
    }

    // update old category
    public function updateOld($input, $old) {
        // slug
        $input['slug'] = Str::slug($input['name']);

        // image
        if (isset($input['image'])) {
            $imageName = time() . '-' . $input['slug'] . '.' . $input['image']->getClientOriginalExtension();

            // TODO: DRY!
            try {
                // upload new
                $input['image']->move(public_path(Category::IMAGE_PUBLIC_DIR), $imageName);
                $input['image'] = $imageName;

                // remove old
                unlink(public_path(Category::IMAGE_PUBLIC_DIR . $old->image));
            } catch (\Exception $e) {
                // ...
            }
        }

        // TODO: try-catch?
        return $this->update($input, $old->id);
    }

    // delete
    public function destroy($category) {
        try {
            unlink(public_path(Category::IMAGE_PUBLIC_DIR . $category->image));
        } catch (\Exception $e) {
            // ...
        }

        // TODO: try-catch?
        return $category->forceDelete();
    }
}
