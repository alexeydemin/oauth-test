<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


$permission_array = [
    'public_profile',
    'user_friends',
    'email',
    'user_about_me',
    'user_actions.books',
    'user_actions.fitness',
    'user_actions.music',
    'user_actions.news',
    'user_actions.video',
    'user_birthday',
    'user_education_history',
    'user_events',
    'user_games_activity',
    'user_hometown',
    'user_likes',
    'user_location',
    'user_managed_groups',
    'user_photos',
    'user_posts',
    'user_relationships',
    'user_relationship_details',
    'user_religion_politics',
    'user_tagged_places',
    'user_videos',
    'user_website',
    'user_work_history',
    'read_custom_friendlists',
    'read_insights',
    'read_audience_network_insights',
    'read_page_mailboxes',
    'manage_pages',
    'publish_pages',
    'publish_actions',
    'rsvp_event',
    'pages_show_list',
    'pages_manage_cta',
    'pages_manage_instant_articles',
    'ads_read',
    'ads_management',
    'business_management',
    'pages_messaging',
    'pages_messaging_subscriptions',
    'pages_messaging_phone_number'
];

$fields_array =
    [
        'id'
        ,'about'
        //,'admin_notes'
        ,'age_range'
        ,'birthday'
        ,'context'
        ,'cover'
        ,'currency'
        ,'devices'
        ,'education'
        ,'email'
        //,'employee_number'
        ,'favorite_athletes'
        ,'favorite_teams'
        ,'first_name'
        ,'gender'
        ,'hometown'
        ,'inspirational_people'
        ,'install_type'
        ,'installed'
     //  ,'interested_in'
       ,'is_shared_login'
       ,'is_verified'
     //  ,'labels'
        ,'languages'
        ,'last_name'
        ,'link'
        ,'locale'
        ,'location'
        ,'meeting_for'
        ,'middle_name'
        ,'name'
        ,'name_format'
        ,'payment_pricepoints'
        ,'political'
        ,'public_key'
        ,'quotes'
        ,'relationship_status'
        ,'religion'
        ,'security_settings'
        ,'shared_login_upgrade_required_by'
        ,'significant_other'
        ,'sports'
        ,'test_group'
        ,'third_party_id'
        ,'timezone'
        ,'updated_time'
        ,'verified'
        ,'video_upload_limits'
        ,'viewer_can_send_gift'
        ,'website'
        //,'work'
];
Route::get('/', function () {
    return view('data');
});

Route::get('/facebook/login', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) use ($permission_array)
{
    // Send an array of permissions to request
    $login_url = $fb->getLoginUrl($permission_array);

    // Obviously you'd do this in blade :)
    echo '<a href="' . $login_url . '">Login with Facebook</a>';
});

// Endpoint that is redirected to after an authentication attempt
Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) use($fields_array)
{
    // Obtain an access token.
    try {
        $token = $fb->getAccessTokenFromRedirect();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Access token will be null if the user denied the request
    // or if someone just hit this URL outside of the OAuth flow.
    if (! $token) {
        // Get the redirect helper
        $helper = $fb->getRedirectLoginHelper();

        if (! $helper->getError()) {
            abort(403, 'Unauthorized action.');
        }

        // User denied the request
        dd(
            $helper->getError(),
            $helper->getErrorCode(),
            $helper->getErrorReason(),
            $helper->getErrorDescription()
        );
    }

    if (! $token->isLongLived()) {
        // OAuth 2.0 client handler
        $oauth_client = $fb->getOAuth2Client();

        // Extend the access token.
        try {
            $token = $oauth_client->getLongLivedAccessToken($token);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    $fb->setDefaultAccessToken($token);

    // Save for later
    Session::put('fb_user_access_token', (string) $token);



    $fields_string  = implode(',', $fields_array);

    // Get basic info on the user from Facebook.
    try {
        $response = $fb->get('/me?fields=' . $fields_string, $token);
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    $data = $response->getDecodedBody();

    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
    $facebook_user = $response->getGraphUser();

    // Create the user if it does not exist or update the existing entry.
    // This will only work if you've added the SyncableGraphNodeTrait to your User model.
/*    $user = App\User::updateOrCreate([
        'email' => $facebook_user->getEmail(),
        'name' => $facebook_user->getFirstName() . ' '  . $facebook_user->getLastName(),
        'password' => $facebook_user->getEmail()
    ]);*/

    // Log the user into Laravel
    //Auth::login($user);


return  view('data', compact('data'));
//redirect('/')->with($response);
});