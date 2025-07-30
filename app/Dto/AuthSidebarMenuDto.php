<?php

namespace App\Dto;

class AuthSidebarMenuDto
{
    public readonly string $menu_id;
    public readonly string $status;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->menu_id = $request['menu_id'];
        $this->status = $request['status'];
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        return [
            'menu_id' => $this->menu_id,
            'status' => $this->status,
        ];
    }
}
