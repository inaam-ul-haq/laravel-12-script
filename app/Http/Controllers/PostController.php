<?php

namespace App\Http\Controllers;

use App\Dto\PostDto;
use App\Interfaces\PostInterface;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(PostInterface $repo)
    {
        $this->setRepo($repo, 'auth.pages.post', 'blog.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try {
            $this->_repo->store(PostDto::fromRequest($request->validated()));
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
    public function update(PostRequest $request, $id)
    {
        try {
            $this->_repo->update($id, PostDto::fromRequest($request->validated()));
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
