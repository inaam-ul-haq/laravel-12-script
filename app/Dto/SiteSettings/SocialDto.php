<?php

namespace App\Dto\SiteSettings;

class SocialDto
{
    public readonly string $facebook_active;
    public readonly string $facebook_api_key;
    public readonly string $facebook_api_secret;
    public readonly string $facebook_redirect_url;

    public readonly string $github_active;
    public readonly string $github_api_key;
    public readonly string $github_api_secret;
    public readonly string $github_redirect_url;

    public readonly string $google_active;
    public readonly string $google_api_key;
    public readonly string $google_api_secret;
    public readonly string $google_redirect_url;

    public readonly string $twitter_active;
    public readonly string $twitter_api_key;
    public readonly string $twitter_api_secret;
    public readonly string $twitter_redirect_url;

    /**
     * Create a new controller instance.
     *
     * @return $reauest, $modal
     */
    public function __construct($request)
    {
        if (isset($request['factivate'])) {
            $this->facebook_active = $request['factivate'];
            $this->facebook_api_key = $request['fapi'];
            $this->facebook_api_secret = $request['fsecret'];
            $this->facebook_redirect_url = $request['furl'];
        }

        if (isset($request['gitactivate'])) {
            $this->github_active = $request['gitactivate'];
            $this->github_api_key = $request['gitapi'];
            $this->github_api_secret = $request['gitsecret'];
            $this->github_redirect_url = $request['giturl'];
        }

        if (isset($request['gactivate'])) {
            $this->google_active = $request['gactivate'];
            $this->google_api_key = $request['gapi'];
            $this->google_api_secret = $request['gsecret'];
            $this->google_redirect_url = $request['gurl'];
        }

        if (isset($request['tactivate'])) {
            $this->twitter_active = $request['tactivate'];
            $this->twitter_api_key = $request['tapi'];
            $this->twitter_api_secret = $request['tsecret'];
            $this->twitter_redirect_url = $request['turl'];
        }
    }

    public static function fromRequest($request)
    {
        return new self($request);
    }

    public function toArray()
    {
        $data = [];

        $data['facebook_active'] = isset(request()['factivate']) ? 1 : 0;
        $data['github_active'] = isset(request()['gitactivate']) ? 1 : 0;
        $data['google_active'] = isset(request()['gactivate']) ? 1 : 0;
        $data['twitter_active'] = isset(request()['tactivate']) ? 1 : 0;

        if (isset(request()['factivate'])) {
            $data['facebook_api_key'] = $this->facebook_api_key;
            $data['facebook_api_secret'] = $this->facebook_api_secret;
            $data['facebook_redirect_url'] = $this->facebook_redirect_url;
        }

        if (isset(request()['gitactivate'])) {
            $data['github_api_key'] = $this->github_api_key;
            $data['github_api_secret'] = $this->github_api_secret;
            $data['github_redirect_url'] = $this->github_redirect_url;
        }

        if (isset(request()['gactivate'])) {
            $data['google_api_key'] = $this->google_api_key;
            $data['google_api_secret'] = $this->google_api_secret;
            $data['google_redirect_url'] = $this->google_redirect_url;
        }

        if (isset(request()['tactivate'])) {
            $data['twitter_api_key'] = $this->twitter_api_key;
            $data['twitter_api_secret'] = $this->twitter_api_secret;
            $data['twitter_redirect_url'] = $this->twitter_redirect_url;
        }

        return $data;
    }
}
