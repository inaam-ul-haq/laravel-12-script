<?php

namespace App\Dto\SiteSettings;

class RegisterDto
{
    public readonly string $registration;
    public readonly string $boarding;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->registration = isset($request['registration']) ? 1 : 0;
        $this->boarding = isset($request['boarding']) ? 1 : 0;
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        return [
            'registration' => $this->registration,
            'on_boarding' => $this->boarding,
        ];
    }
}
