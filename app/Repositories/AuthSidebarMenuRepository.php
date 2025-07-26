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

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthSidebarMenuDto $data)
    {
        $dataArray = $data->toArray();
        $image = $dataArray['image'];

        unset($dataArray['image']);

        $dataResult = $this->add($this->_model, $dataArray);

        if ($image != null) {
            $imageUploaded = $this->uploadFile($image, $this->_imgPath);
            $dataResult->images()->create($imageUploaded);
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
