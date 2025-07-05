<?php

namespace App\Repositories;

use App\Helper\BaseQuery;
use App\Helper\FileUpload;

abstract class BaseRepository
{
    use BaseQuery, FileUpload;

    protected $_imgPath = '/';
    protected $_model = null;

    public function setModel($model)
    {
        $this->_model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->get_all($this->_model);
    }

    /**
     * Display a listing of the resource.
     */
    public function all($relation = null)
    {
        return $this->getAll($this->_model, $relation);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->get_by_id($this->_model, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = $this->checkRecord($id);
        return $result->delete();
    }

    protected function checkRecord($id)
    {
        $result = $this->show($id);

        if ($result == null) {
            return null;
        }

        return $result;
    }
}
