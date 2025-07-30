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
                'message' => 'Successfully created.',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'error' => $th->getMessage() // Optional: helpful in dev environment
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
            return redirect()->route($this->_route . '.index')->with('success', 'Updated succesfully');
        } catch (\Throwable $th) {
            if ($th instanceof NotFoundHttpException) {
                $message = $th->getMessage(); // Get the exception message
                return redirect()->route($this->_route . '.index')->with('error', $message);
            } else {
                return redirect()->route($this->_route . '.index')->with('error', 'Something went wrong..');
            }
        }
    }
}
