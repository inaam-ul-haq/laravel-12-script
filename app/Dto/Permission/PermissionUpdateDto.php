<?php

namespace App\Dto\Permission;

class PermissionUpdateDto
{
    public readonly string $title;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->title = $request['title'];
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        $return = [
            'title' => $this->title,
        ];

        return $return;
    }
}
