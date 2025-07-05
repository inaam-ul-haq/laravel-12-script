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
        return redirect()->route('login');
        return view($this->_dir . 'welcome', compact('data'));
    }
}
