<?php

namespace App\Dto;

class CategoryDto
{
    public readonly string $name;
    public readonly ?string $slug;
    public readonly ?string $parent_id;
    public readonly string $status;

    public function __construct($request)
    {
        $this->name = $request['name'];
        $this->slug = $request['slug'];
        $this->parent_id = $request['category_id'] ?? null;
        $this->status = $request['status'] ?? '1';
    }

    public static function fromRequest($request): self
    {
        return new self($request);
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'parent_id' => $this->parent_id,
            'status' => $this->status,
        ];
    }
}
