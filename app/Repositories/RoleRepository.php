<?php

namespace App\Repositories;

use App\Constants\Constants;
use App\Dto\Permission\RoleDto;
use App\Dto\Permission\RoleUpdateDto;
use App\Models\Role;
use App\Models\Permission;

class RoleRepository extends BaseRepository
{
    /**
     * Create a new service instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Role $model)
    {
        $this->setModel($model);
    }

    public function get_all_roles()
    {
        return $this->_model->where('name', '!=', Constants::SUPERADMIN)->get();
    }

    public function get_staff_roles()
    {
        return $this->_model->whereNotIn('name', [Constants::SUPERADMIN, Constants::USER])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleDto $data)
    {
        $dataArr = $data->toArray();
        $permissions = array_keys(array_filter($dataArr['permissions'] ?? []));

        unset($dataArr['permissions']);

        $role = $this->add($this->_model, $dataArr);
        $role->availablePermissions()->sync($permissions);

        return $role;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, RoleUpdateDto $data)
    {
        $result = $this->checkRecord($id);

        $dataArr = $data->toArray();
        $permissions = array_keys(array_filter($dataArr['permissions'] ?? []));

        unset($dataArr['permissions']);

        $result->update($data->toArray());
        $result->availablePermissions()->sync($permissions);

        return true;
    }

    public function assign_permission($data)
    {
        $role = $this->checkRecord($data['role']);
        $permissions = array_keys(array_filter($data['permissions'] ?? []));

        $role->syncPermissions($permissions);

        return true;
    }
}
