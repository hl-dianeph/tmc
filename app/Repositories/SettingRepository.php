<?php

namespace App\Repositories;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SiteConfigRepository
 * @package App\Repositories
 * @version April 4, 2018, 5:38 pm UTC
 *
 * @method Setting findWithoutFail($id, $columns = ['*'])
 * @method Setting find($id, $columns = ['*'])
 * @method Setting first($columns = ['*'])
*/
class SettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type',
        'value'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Setting::class;
    }

    // get /index
    public function getForIndex() {
        $settings = [];
        $data = DB::table('settings')->whereIn('name', ['keywords', 'og_description', 'logo', 'favicon'])->get();
        
        foreach ($data as $key => $item) {
            $settings[$item->name] = $item;
        }

        return $settings;
    }

    // update seo
    public function updateSeo($settings) {
        $wasUpdated = false;

        // keywords
        if (isset($settings['keywords'])) {
            $keywords = Setting::where('name', 'keywords')->first();
            $keywords->value = $settings['keywords'];
            $keywords->save();

            $wasUpdated = true;
        }

        // og_description
        if (isset($settings['og_description'])) {
            $ogDescription = Setting::where('name', 'og_description')->first();
            $ogDescription->value = $settings['og_description'];
            $ogDescription->save();

            $wasUpdated = true;
        }

        return $wasUpdated;
    }
}
