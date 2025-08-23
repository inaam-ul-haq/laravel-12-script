<?php

namespace App\Http\Controllers;

class FrontendController extends Controller
{
    private $_dir = null;

    public function __construct()
    {
        $this->_dir = "frontend.";
    }

    public function welcome()
    {
        $postRepo = app()->make('App\Interfaces\PostInterface');

        $featured = $postRepo->getByColumn(['is_featured' => true]);
        $posts = $postRepo->getByColumn(['is_featured' => false]);

        return view($this->_dir . 'welcome', compact('posts', 'featured'));
    }
}
