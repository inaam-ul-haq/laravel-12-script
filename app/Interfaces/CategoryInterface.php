<?php

namespace App\Interfaces;

interface CategoryInterface
{
    public function index($relation = null);
    public function all($relation = null);
    public function show($id);
    public function destroy($id);
    public function store(\App\Dto\CategoryDto $data);
    public function update($id, \App\Dto\CategoryDto $data);
}
