<?php

namespace App\Dto\Permission;

use Illuminate\Support\Str;

class RoleDto
{
    public readonly string $title;
    public readonly string $color;
    public $permissions;
    public readonly string $guard_name;

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
        $this->guard_name = 'web';
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
            'guard_name' => $this->guard_name,
            'name' => Str::slug($this->title),
        ];

        return $return;
    }
}
