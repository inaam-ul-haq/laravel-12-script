<?php

namespace App\Dto\Permission;

class PermissionDto
{
    public readonly string $title;
    public $name = null;
    public $guard_name = null;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->title = $request['title'];
        $this->name = isset($request['slug']) ? $request['slug'] : null;
        $this->guard_name = isset($request['guard']) ? $request['guard'] : null;
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        $return = [
            'title' => $this->title,
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ];

        return $return;
    }
}
