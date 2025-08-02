<?php

namespace App\Http\Controllers;

use App\Dto\AuthSidebarMenuDto;
use App\Interfaces\AuthSidebarMenuInterface;
use App\Http\Requests\AuthSidebarMenuRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthSidebarMenuController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(AuthSidebarMenuInterface $repo)
    {
        $this->setRepo($repo, 'auth.pages.manues', 'menues');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAjax($id)
    {
        $data = $this->_repo->getByColumn(['parent_id' => $id]);

        if ($data == null || $data->isEmpty()) {
            return response()->json([
                'message' => __('language.no_data_found'),
            ], 404);
        }

        $view = view($this->_directory . '.showAjax', compact('data'))->render();

        return response()->json([
            'data' => $view
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthSidebarMenuRequest $request)
    {
        try {
            $this->_repo->store(AuthSidebarMenuDto::fromRequest($request->validated()));

            return response()->json([
                'status' => true,
                'message' => __('language.successfully_created'),
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => __('language.something_went_wrong')
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request Validation $validation
     * @return \Illuminate\Http\Response
     */
    public function update(AuthSidebarMenuRequest $request, $id)
    {
        try {
            $this->_repo->update($id, AuthSidebarMenuDto::fromRequest($request->validated()));
            return redirect()->route($this->_route . '.index')->with('success', __('language.updated_successfully'));
        } catch (\Throwable $th) {
            if ($th instanceof NotFoundHttpException) {
                $message = $th->getMessage();
                return redirect()->route($this->_route . '.index')->with('error', $message);
            } else {
                return redirect()->route($this->_route . '.index')->with('error', __('language.something_went_wrong'));
            }
        }
    }
}
