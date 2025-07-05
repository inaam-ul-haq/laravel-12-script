<?php

namespace App\Http\Controllers;

use App\Dto\Permission\RoleDto;
use App\Dto\Permission\RoleUpdateDto;
use App\Http\Requests\RolePermission\AssignPermission;
use App\Http\Requests\RolePermission\RoleRequest;
use App\Http\Requests\RolePermission\RoleUpdateRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RoleController extends BaseController
{
    public function __construct(RoleRepository $repo)
    {
        $this->setRepo($repo, "auth.pages.roles", "roles");
    }

    public function create()
    {
        $rawPermissions = app()->make('App\Repositories\PermissionRepository')->index();
        $groupedPermissions = $rawPermissions->groupBy('category');

        return view($this->_directory . '.create', compact('groupedPermissions'));
    }

    public function edit($id)
    {
        try {
            $data = $this->_repo->show($id);
            $rawPermissions = app()->make('App\Repositories\PermissionRepository')->index();
            $groupedPermissions = $rawPermissions->groupBy('category');

            if ($data == null) {
                abort(404);
            }

            return view($this->_directory . '.edit', compact('data', 'groupedPermissions'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong..');
        }
    }

    public function store(RoleRequest $request)
    {
        try {
            $role = $this->_repo->store(RoleDto::fromRequest($request->validated()));
            return redirect()->route($this->_route . '.show', $role->id)->with('success', 'Role Created! Now Assign Permissions to this role');
        } catch (\Throwable $th) {
            return redirect()->route($this->_route . '.index')->with('error', 'Something went wrong..');
        }
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        try {
            $this->_repo->update($id, RoleUpdateDto::fromRequest($request->validated()));

            return redirect()->route($this->_route . '.show', $id)->with('success', 'Updated succesfully');
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            if ($th instanceof NotFoundHttpException) {
                return redirect()->route($this->_route . '.index')->with('error', $message);
            } else {
                return redirect()->route($this->_route . '.index')->with('error', 'Something went wrong..');
            }
        }
    }

    public function assign_permission(AssignPermission $request)
    {
        try {
            $data = $this->_repo->assign_permission($request->validated());
            return redirect()->route($this->_route . '.index')->with('success', 'Updated succesfully');
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            dd($message);
            if ($th instanceof NotFoundHttpException) {
                return redirect()->route($this->_route . '.index')->with('error', $message);
            } else {
                return redirect()->route($this->_route . '.index')->with('error', 'Something went wrong..');
            }
        }
    }
}
