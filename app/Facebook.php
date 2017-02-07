<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    public static $permission_array = [
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

    public static $user_fields_array = [
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
        ,'website'];

    public static $page_fields_array = [
        'about',
        'attire',
        'bio',
        'location',
        'parking',
        'hours',
        'emails',
        'likes',
        'website'];
}
