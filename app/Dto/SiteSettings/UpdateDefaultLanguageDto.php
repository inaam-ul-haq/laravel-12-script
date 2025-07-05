<?php

namespace App\Dto\SiteSettings;

class UpdateDefaultLanguageDto
{
    public readonly string $language;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->language = $request['language'];
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        return [
            'default_language' => $this->language
        ];
    }
}
