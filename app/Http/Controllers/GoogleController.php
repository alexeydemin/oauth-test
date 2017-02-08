<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OAuth\OAuth2\Service\Google;

class GoogleController extends Controller
{
    public function loginWithGoogle(Request $request)
    {
        $key = 'AIzaSyCwM8wyAjIFjk9fDfBnq6Q7ChoemqangVw';
        $code = $request->get('code');
        $oauth = new \Artdarek\OAuth\OAuth();
        $googleService =  $oauth->consumer('Google', null, [Google::SCOPE_YOUTUBE]);

        if ( ! is_null($code)) {
            $token = $googleService->requestAccessToken($code);
            $data = json_decode($googleService->request("https://www.googleapis.com/youtube/v3/subscriptions?part=snippet&mine=true" ), true);


            return view('channels', compact('data'));
        } else {
            $url = $googleService->getAuthorizationUri([]);

            return redirect((string)$url);
        }
    }
}
