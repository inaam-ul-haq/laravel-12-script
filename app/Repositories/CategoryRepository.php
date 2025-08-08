<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Dto\CategoryDto;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    /**
     * Create a new service instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(Category $model)
    {
        $this->setModel($model);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryDto $data)
    {
        $dataArray = $data->toArray();

        if (empty($dataArray['slug'])) {
            $dataArray['slug'] = Str::slug($dataArray['name']);
        } else {
            $dataArray['slug'] = Str::slug($dataArray['slug']);
        }

        return $this->add($this->_model, $dataArray);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, CategoryDto $data)
    {
        $result = $this->checkRecord($id);

        $dataArray = $data->toArray();
        return $result->update($dataArray);
    }
}
