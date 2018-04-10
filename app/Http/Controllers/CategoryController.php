<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;
    private $perPage = 3;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));

        $categories = $this->categoryRepository->getForIndex($this->perPage);

        return view('backend.categories.index')
            ->with('categories', $categories)
            ->with('page', $request->page);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.categories.create')
            ->with('page', 1);
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->validated();
        // dd($input);

        $category = $this->categoryRepository->storeNew($input);

        Flash::success('Category saved successfully.');

        return redirect(route('backend.categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('backend.categories.index'));
        }

        return view('backend.categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('backend.categories.index'));
        }

        return view('backend.categories.edit')
            ->with('category', $category)
            ->with('page', $request->page);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  int              $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('backend.categories.index'));
        }

        $category = $this->categoryRepository->updateOld($request->validated(), $category);

        Flash::success('Category updated successfully.');

        return redirect(route('backend.categories.index', ['page' => $request->page]));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('backend.categories.index'));
        }

        $this->categoryRepository->destroy($category);

        Flash::success('Category deleted successfully.');

        return redirect(route('backend.categories.index'));
    }
}
