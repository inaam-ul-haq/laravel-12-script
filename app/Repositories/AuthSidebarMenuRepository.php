<?php

namespace App\Repositories;

use App\Interfaces\AuthSidebarMenuInterface;
use App\Dto\AuthSidebarMenuDto;
use App\Models\AuthSidebarMenu;

class AuthSidebarMenuRepository extends BaseRepository implements AuthSidebarMenuInterface
{
    /**
     * Create a new service instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(AuthSidebarMenu $model)
    {
        $this->setModel($model);
    }

    public function index($relation = null)
    {
        return $this->_model->whereNull('parent_id')
            ->with([
                'permissions',
                'children' => function ($query) {
                    $query
                        ->orderBy('sort_order');
                },
                'parent'
            ])
            ->orderBy('sort_order')
            ->get();
    }

    public function sidebarMenus()
    {
        $user = auth()->user();

        return $this->_model->where('status', 1)
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->with([
                'permissions',
                'children' => function ($query) use ($user) {
                    $query->where('status', 1)
                        ->orderBy('sort_order')
                        ->whereHas('permissions', function ($q) use ($user) {
                            $q->whereIn('name', $user->getAllPermissions()->pluck('name'));
                        })
                        ->with('permissions');
                },
                'parent'
            ])
            ->whereHas('permissions', function ($query) use ($user) {
                $query->whereIn('name', $user->getAllPermissions()->pluck('name'));
            })
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthSidebarMenuDto $data)
    {
        $dataArray = $data->toArray();

        $menu = $this->checkRecord($dataArray['menu_id']);

        $status = $dataArray['status'];

        $menu->status = $status;
        $menu->save();

        if ($menu->children->count()) {
            foreach ($menu->children as $child) {
                $child->status = $status;
                $child->save();
            }
        }

        return true;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, AuthSidebarMenuDto $data)
    {
        $result = $this->checkRecord($id);

        $dataArray = $data->toArray();
        return $result->update($dataArray);
    }
}
