<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\UpdateAccountSettingsRequest;
use App\Http\Requests\UpdateIconsSettingsRequest;
use App\Http\Requests\UpdateSeoSettingsRequest;
use App\Repositories\SettingRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $admin = Auth::user();

        return view('backend.settings.index', compact('settings', 'admin'));
    }

    /**
     * Update the seo settings (keywords, description) in storage.
     *
     * @param  int              $id
     * @param UpdateSeoSettingsRequest $request
     *
     * @return Response
     */
    public function updateSeo(UpdateSeoSettingsRequest $request)
    {
        $result = $this->settingRepository->updateSeo($request->validated());

        if ($result['error']) {
            Flash::error($result['error']);
        }

        if ($result['wasUpdated']) {
            Flash::success('SEO settings updated successfully.');
        }

        return redirect(route('backend.settings.index'));
    }

    /**
     * Update the icons settings (logo, favicon) in storage.
     *
     * @param  int              $id
     * @param UpdateIconsSettingsRequest $request
     *
     * @return Response
     */
    public function updateIcons(UpdateIconsSettingsRequest $request)
    {
        $result = $this->settingRepository->updateIcons($request->validated());

        if ($result['error']) {
            Flash::error($result['error']);
        }

        if ($result['wasUpdated']) {
            Flash::success('Icons settings updated successfully.');
        }

        return redirect(route('backend.settings.index'));
    }


    /**
     * Update account settings (email, password) in storage.
     *
     * @param  int              $id
     * @param UpdateAccountSettingsRequest $request
     *
     * @return Response
     */
    public function updateAccount(UpdateAccountSettingsRequest $request)
    {
        $result = $this->settingRepository->updateAccount($request->validated());

        if ($result['error']) {
            Flash::error($result['error']);
        }

        if ($result['wasUpdated']) {
            Flash::success('Account settings updated successfully.');
        }

        return redirect(route('backend.settings.index'));
    }
}
