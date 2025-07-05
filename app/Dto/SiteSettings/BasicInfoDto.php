<?php

namespace App\Dto\SiteSettings;

class BasicInfoDto
{
    public readonly string $name;
    public readonly string $url;
    public readonly string $email;
    public $file;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->name = $request['site_name'];
        $this->url = $request['site_url'];
        $this->email = $request['site_email'];
        $this->file = isset(request()->file) ? request()->file : null;
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'url' => $this->url,
            'email' => $this->email,
            'image' => $this->file
        ];
    }
}
