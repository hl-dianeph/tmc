<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingRequest;
use App\Repositories\SettingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SettingController extends AppBaseController
{
    /** @var  SettingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingsRepo)
    {
        $this->settingRepository = $settingsRepo;
    }

    /**
     * Index page
     */
    public function index(Request $request) {
        $settings = $this->settingRepository->getForIndex();
        // dd($settings);

        return view('backend.settings.index', compact('settings'));
    }


    /**
     * Update the specified SiteConfig in storage.
     *
     * @param  int              $id
     * @param UpdateSiteConfigRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSettingsRequest $request)
    {
        $setting = $this->settingRepository->findWithoutFail($id);

        if (empty($setting)) {
            Flash::error('Setting not found');

            return redirect(route('backend.settings.index'));
        }

        $setting = $this->settingRepository->updateOld($request->validated(), $setting);

        Flash::success('Setting updated successfully.');

        return redirect(route('backend.settings.index'));
    }
}
