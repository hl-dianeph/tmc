<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStaticPageRequest;
use App\Http\Requests\UpdateStaticPageRequest;
use App\Repositories\StaticPageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StaticPageController extends AppBaseController
{
    /** @var  StaticPageRepository */
    private $staticPageRepository;

    /** @var perPage number of static pages */
    protected $perPage = 3;

    public function __construct(StaticPageRepository $staticPageRepo)
    {
        $this->staticPageRepository = $staticPageRepo;
    }

    /**
     * Display a listing of the StaticPage.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->staticPageRepository->pushCriteria(new RequestCriteria($request));
        $staticPages = $this->staticPageRepository->getForIndex($this->perPage);

        return view('backend.static_pages.index')
            ->with('staticPages', $staticPages)
            ->with('page', $request->page);
    }

    /**
     * Show the form for creating a new StaticPage.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.static_pages.create')
            ->with('page', 1);
    }

    /**
     * Store a newly created StaticPage in storage.
     *
     * @param CreateStaticPageRequest $request
     *
     * @return Response
     */
    public function store(CreateStaticPageRequest $request)
    {
        $input = $request->validated();

        $staticPage = $this->staticPageRepository->storeNew($input);

        Flash::success('Static Page saved successfully.');

        return redirect(route('backend.staticPages.index'));
    }

    /**
     * Display the specified StaticPage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $staticPage = $this->staticPageRepository->findWithoutFail($id);

        if (empty($staticPage)) {
            Flash::error('Static Page not found');

            return redirect(route('backend.staticPages.index'));
        }

        return view('backend.static_pages.show')->with('staticPage', $staticPage);
    }

    /**
     * Show the form for editing the specified StaticPage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $staticPage = $this->staticPageRepository->findWithoutFail($id);

        if (empty($staticPage)) {
            Flash::error('Static Page not found');

            return redirect(route('backend.staticPages.index'));
        }

        return view('backend.static_pages.edit')
            ->with('staticPage', $staticPage)
            ->with('page', $request->page);
    }

    /**
     * Update the specified StaticPage in storage.
     *
     * @param  int              $id
     * @param UpdateStaticPageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStaticPageRequest $request)
    {
        $staticPage = $this->staticPageRepository->findWithoutFail($id);

        if (empty($staticPage)) {
            Flash::error('Static Page not found');

            return redirect(route('backend.staticPages.index'));
        }

        $staticPage = $this->staticPageRepository->updateOld($request->validated(), $staticPage);

        Flash::success('Static Page updated successfully.');

        return redirect(route('backend.staticPages.index', ['page' => $request->page]));
    }

    /**
     * Remove the specified StaticPage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $staticPage = $this->staticPageRepository->findWithoutFail($id);

        if (empty($staticPage)) {
            Flash::error('Static Page not found');

            return redirect(route('backend.staticPages.index'));
        }

        $this->staticPageRepository->destroy($staticPage);

        Flash::success('Static Page deleted successfully.');

        return redirect(route('backend.staticPages.index'));
    }
}
