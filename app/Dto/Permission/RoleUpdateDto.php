<?php

namespace App\Dto\Permission;

class RoleUpdateDto
{
    public readonly string $title;
    public readonly string $color;
    public $permissions;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->title = $request['title'];
        $this->color = $request['color'];
        $this->permissions = $request['permissions'];
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        $return = [
            'title' => $this->title,
            'color' => $this->color,
            'permissions' => $this->permissions,
        ];

        return $return;
    }
}
