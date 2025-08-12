<?php

namespace App\Dto;

class PostDto
{
    public readonly string $title;
    public readonly string $slug;
    public readonly ?string $short_summary;
    public readonly string $content;
    public readonly ?string $focus_keyword;
    public readonly ?string $meta_title;
    public readonly ?string $meta_description;
    public readonly string $status;
    public readonly ?string $published_at;
    public readonly bool $is_featured;
    public readonly int $view_count;
    public readonly ?string $featured_image;
    public readonly ?string $author_id;

    /**
     * Create a new DTO instance.
     */
    public function __construct($request)
    {
        $this->title            = $request['title'];
        $this->slug             = $request['slug'];
        $this->short_summary    = $request['short_description'] ?? null;
        $this->content          = $request['content'];
        $this->focus_keyword    = $request['focus_keyword'] ?? null;
        $this->meta_title       = $request['meta_title'] ?? null;
        $this->meta_description = $request['meta_description'] ?? null;
        $this->status           = $request['status'] ?? 'draft';
        $this->published_at     = $request['published_at'] ?? null;
        $this->is_featured      = isset($request['is_featured']) ? (bool)$request['is_featured'] : false;
        $this->view_count       = 0;
        $this->featured_image   = isset($request['featured_image']) ? $request['featured_image'] : null;
        $this->author_id        = auth()->id();
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        return [
            'title'            => $this->title,
            'slug'             => $this->slug,
            'short_summary'    => $this->short_summary,
            'content'          => $this->content,
            'focus_keyword'    => $this->focus_keyword,
            'meta_title'       => $this->meta_title,
            'meta_description' => $this->meta_description,
            'status'           => $this->status,
            'published_at'     => $this->published_at,
            'is_featured'      => $this->is_featured,
            'view_count'       => $this->view_count,
            'featured_image'   => $this->featured_image,
            'author_id'        => $this->author_id,
        ];
    }
}
