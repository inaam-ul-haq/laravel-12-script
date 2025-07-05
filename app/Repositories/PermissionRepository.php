<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;

class PermissionRepository extends BaseRepository
{
    /**
     * Create a new service instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Permission $model)
    {
        $this->setModel($model);
    }

    public function index()
    {
        return $this->all();
    }
}
