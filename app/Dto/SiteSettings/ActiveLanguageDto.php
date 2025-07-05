<?php

namespace App\Dto\SiteSettings;

class ActiveLanguageDto
{
    public readonly string $locale;
    public readonly string $is_installed;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->locale = $request['locale'];
        $this->is_installed = $request['is_installed'];
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        return [
            'is_installed' => $this->is_installed,
            'locale' => $this->locale
        ];
    }
}
