<?php

namespace App\Helper;

trait BaseQuery
{
    /**
     * add new record
     */
    public function add($model, $data)
    {
        return $model->create($data);
    }

    /**
     * get all record without pagination
     */
    public function getAll($model, $relation = null)
    {
        if ($relation == null) {
            return $model->orderBy('created_at', 'desc')->get();
        } else {
            return $model->with($relation)->orderBy('created_at', 'desc')->get();
        }
    }

    /**
     * get all record
     */
    public function get_all($model, $relation = null, $pagination = 20)
    {

        if ($relation == null) {
            return $model->orderBy('created_at', 'desc')->paginate($pagination);
        } else {
            return $model->with($relation)->orderBy('created_at', 'desc')->paginate($pagination);
        }
    }

    /**
     * get record by its id
     */
    public function get_by_id($model, $id, $relation = null)
    {
        if ($relation == null) {
            return $model->find($id);
        } else {
            return $model->with($relation)->find($id);
        }
    }

    /**
     * get record by its slug
     */
    public function get_by_slug($model, $slug, $relation = null)
    {
        if ($relation == null) {
            return $model->whereSlug($slug)->first();
        } else {
            return $model->with($relation)->whereSlug($slug)->first();
        }
    }

    /**
     * get record by column
     */
    public function get_by_column($model, $columArr, $relation = null, $pagination = 20)
    {
        if ($relation == null) {
            return $model->where($columArr)->orderBy('created_at', 'desc')->paginate($pagination);
        } else {
            return $model->with($relation)->where($columArr)->orderBy('created_at', 'desc')->paginate($pagination);
        }
    }

    /**
     * get record by column
     */
    public function get_by_column_without_pagination($model, $columArr, $relation = null)
    {
        if ($relation == null) {
            return $model->where($columArr)->orderBy('created_at', 'desc')->get();
        } else {
            return $model->with($relation)->where($columArr)->orderBy('created_at', 'desc')->get();
        }
    }

    /**
     * get record by column single
     */
    public function get_by_column_single($model, $columArr, $relation = null)
    {
        if ($relation == null) {
            return $model->where($columArr)->first();
        } else {
            return $model->with($relation)->where($columArr)->first();
        }
    }

    /**
     * delete record by its id
     */
    public function delete($model, $id)
    {
        return $model->findOrFail($id)->delete();
    }

    /**
     * get single record
     */
    public function get_single($model, $relation = null)
    {
        if ($relation == null) {
            return $model->latest()->first();
        } else {
            return $model->with($relation)->latest()->first();
        }
    }
}
