<?php

namespace App\Interfaces;

interface PostInterface
{
    public function index();
    public function all($relation = null);
    public function show($id);
    public function destroy($id);
    public function store(\App\Dto\PostDto $data);
    public function update($id, \App\Dto\PostDto $data);
}
