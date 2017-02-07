<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use App\Facebook;

class MainController extends Controller
{
    public $fbs;

    public function __construct(LaravelFacebookSdk $fbs)
    {
        $this->fbs =$fbs;
    }

    public function index()
    {
        $fb_url = $this->fbs->getLoginUrl(Facebook::$permission_array);

        return view('home', compact('fb_url'));
    }
}
