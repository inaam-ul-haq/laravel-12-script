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
        $this->setRepo($repo, '{{directory_name}}', 'authsidebarmenus');
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
            return redirect()->route($this->_route . '.index')->with('success', 'Successfully created.');
        } catch (\Throwable $th) {
            return redirect()->route($this->_route . '.index')->with('error', 'Something went wrong..');
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
