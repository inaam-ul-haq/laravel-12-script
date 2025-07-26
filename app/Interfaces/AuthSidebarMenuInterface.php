<?php

namespace App\Interfaces;

interface AuthSidebarMenuInterface
{
    public function index();
    public function all($relation = null);
    public function show($id);
    public function destroy($id);
    public function store(\App\Dto\AuthSidebarMenuDto $data);
    public function update($id, \App\Dto\AuthSidebarMenuDto $data);
}
