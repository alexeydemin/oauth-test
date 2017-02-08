<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use App\Facebook;
use Session;
use Facebook\Exceptions\FacebookSDKException;

class FacebookController extends Controller
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

    public function callback()
    {
        try {
            $token = $this->fbs->getAccessTokenFromRedirect();
        } catch (FacebookSDKException $e) {
            dd($e->getMessage());
        }
        if (! $token) {
            $helper = $this->fbs->getRedirectLoginHelper();
            if (! $helper->getError()) {
                abort(403, 'Unauthorized action.');
            }
            dd(
                $helper->getError(),
                $helper->getErrorCode(),
                $helper->getErrorReason(),
                $helper->getErrorDescription()
            );
        }
        if (! $token->isLongLived()) {
            $oauth_client = $this->fbs->getOAuth2Client();

            try {
                $token = $oauth_client->getLongLivedAccessToken($token);
            } catch (FacebookSDKException $e) {
                dd($e->getMessage());
            }
        }
        $this->fbs->setDefaultAccessToken($token);
        Session::put('fb_user_access_token', (string) $token);

        return redirect('user');
    }

    public function user()
    {
        $fields_string  = implode(',', Facebook::$user_fields_array);

        try {
            $response = $this->fbs->get('/me?fields=' . $fields_string, Session::get('fb_user_access_token'));
        } catch (FacebookSDKException $e) {
            dd($e->getMessage());
        }
        $data = $response->getDecodedBody();

        return  view('user', compact('data'));
    }

    public function page($id)
    {
        $fields_string  = implode(',', Facebook::$page_fields_array);
        try {
            $response = $this->fbs->get( $id . '?fields=' . $fields_string, Session::get('fb_user_access_token'));
            //$response1 = $this->fbs->get( $id . '/roles', Session::get('fb_user_access_token'));
            //$response2 = $this->fbs->get( $id . '/rating', Session::get('fb_user_access_token'));
            //$response3 = $this->fbs->get( $id . '/blocked', Session::get('fb_user_access_token'));
            //feed?fields=id,message,from,to
        } catch (FacebookSDKException $e) {
            dd($e->getMessage());
        }

        $data = $response->getDecodedBody();

        return  view('page', compact('data'));
    }

    public function group($id)
    {
        $fields_string  = implode(',', Facebook::$group_fields_array);
        try {
            $response = $this->fbs->get( $id . '?fields=' . $fields_string, Session::get('fb_user_access_token'));
            //$response = $this->fbs->get( $id . '/members' , Session::get('fb_user_access_token'));
        } catch (FacebookSDKException $e) {
            dd($e->getMessage());
        }
        $data = $response->getDecodedBody();

        return  view('group', compact('data'));
    }
}
