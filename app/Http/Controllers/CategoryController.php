<?php

namespace App\Http\Controllers;

use App\Dto\CategoryDto;
use App\Interfaces\CategoryInterface;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(CategoryInterface $repo)
    {
        $this->setRepo($repo, 'auth.pages.categories', 'blog.category');
    }

    public function index($id = null)
    {
        try {
            $data['all'] = $this->_repo->index(['parent']);

            if ($id != null) {
                $data['category'] = $this->_repo->show($id);
            }

            return view($this->_directory . '.all', compact('data'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->route($this->_route . '.index')->with('error', __('language.something_went_wrong'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $this->_repo->store(CategoryDto::fromRequest($request->validated()));
            return redirect()->route($this->_route . '.index')->with('success', __('language.successfully_created'));
        } catch (\Throwable $th) {
            return redirect()->route($this->_route . '.index')->with('error', __('language.something_went_wrong'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request Validation $validation
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $this->_repo->update($id, CategoryDto::fromRequest($request->validated()));
            return redirect()->route($this->_route . '.index')->with('success', __('language.updated_successfully'));
        } catch (\Throwable $th) {
            if ($th instanceof NotFoundHttpException) {
                $message = $th->getMessage(); // Get the exception message
                return redirect()->route($this->_route . '.index')->with('error', $message);
            } else {
                return redirect()->route($this->_route . '.index')->with('error', __('language.something_went_wrong'));
            }
        }
    }
}
