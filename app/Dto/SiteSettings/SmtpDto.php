<?php

namespace App\Dto\SiteSettings;

class SmtpDto
{
    public readonly string $smtp_host;
    public readonly string $smtp_port;
    public readonly string $smtp_username;
    public readonly string $smtp_password;
    public readonly string $smtp_encryption;
    public readonly string $smtp_sender_email;
    public readonly string $smtp_sender_name;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        $this->smtp_host = $request['host'];
        $this->smtp_port = $request['port'];
        $this->smtp_username = $request['username'];
        $this->smtp_password = $request['password'];
        $this->smtp_encryption = $request['encryption'];
        $this->smtp_sender_email = $request['sender_email'];
        $this->smtp_sender_name = $request['sender_name'];
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        return [
            'smtp_host' => $this->smtp_host,
            'smtp_port' => $this->smtp_port,
            'smtp_username' => $this->smtp_username,
            'smtp_password' => $this->smtp_password,
            'smtp_encryption' => $this->smtp_encryption,
            'smtp_email' => $this->smtp_sender_email,
            'smtp_sender_name' => $this->smtp_sender_name
        ];
    }
}
