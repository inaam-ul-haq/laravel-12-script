<?php

namespace App\Dto\SiteSettings;

class InstallLanguageDto
{
    public readonly string $available;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->available = $request['available'];
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        return [
            'available' => $this->available
        ];
    }
}
