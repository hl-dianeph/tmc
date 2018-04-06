<?php

namespace App\Repositories;

use App\Models\Setting;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $result = ['wasUpdated' => false, 'error' => null];

        // keywords
        if (isset($settings['keywords'])) {
            try {
                $keywords = Setting::where('name', 'keywords')->first();
                $keywords->value = $settings['keywords'];
                $keywords->save();

                $result['wasUpdated'] = true;
            } catch (\Exception $e) {
                $result['wasUpdated'] = false;
                $result['error'] = $e->getMessage();
            }
        }

        // og_description
        if (isset($settings['og_description'])) {
            try {
                $ogDescription = Setting::where('name', 'og_description')->first();
                $ogDescription->value = $settings['og_description'];
                $ogDescription->save();

                $result['wasUpdated'] = true;
            } catch (\Exception $e) {
                $result['wasUpdated'] = false;
                $result['error'] = $e->getMessage();
            }
        }

        return $result;
    }

    // update icons
    public function updateIcons($settings) {
        $result = ['wasUpdated' => false, 'error' => null];

        // logo
        if (isset($settings['logo'])) {
            try {
                // remove old
                unlink(public_path(Setting::IMAGE_PUBLIC_DIR . Setting::LOGO_NAME));

                // upload new
                $settings['logo']->move(public_path(Setting::IMAGE_PUBLIC_DIR), Setting::LOGO_NAME);

                $logo = Setting::where('name', 'logo')->first();
                $logo->value = Setting::IMAGE_PUBLIC_DIR . Setting::LOGO_NAME;
                $logo->save();

                $result['wasUpdated'] = true;
            } catch (\Exception $e) {
                $result['wasUpdated'] = false;
                $result['error'] = $e->getMessage();
            }
        }

        // favicon
        if (isset($settings['favicon'])) {
            try {
                // remove old
                unlink(public_path(Setting::FAVICON_NAME));

                // upload new
                $settings['favicon']->move(public_path(), Setting::FAVICON_NAME);

                $favicon = Setting::where('name', 'favicon')->first();
                $favicon->value = Setting::FAVICON_NAME;
                $favicon->save();

                $result['wasUpdated'] = true;
            } catch (\Exception $e) {
                $result['wasUpdated'] = false;
                $result['error'] = $e->getMessage();
            }
        }

        return $result;
    }

    // update account
    public function updateAccount($settings) {
        $result = ['wasUpdated' => false, 'error' => null];

        $userId = Auth::user()->id;                       
        
        try {
            $userObj = User::find($userId);
            $userObj->email = $settings['email'];
            $userObj->password = Hash::make($settings['new_password']);;
            $userObj->save(); 

            $result['wasUpdated'] = true;
        } catch (\Exception $e) {
            $result['wasUpdated'] = false;
                $result['error'] = $e->getMessage();
        }
        
        return $result;
    }
}
