<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('isAuthenticated')) {
    /**
     * Check if the user is logged in.
     *
     * @return bool
     */
    function isAuthenticated()
    {
        $CI = &get_instance();
        return $CI->session->userdata('logged_in');
    }
}

if (!function_exists('getUserId')) {
    /**
     * Get the user ID of the logged-in user.
     *
     * @return int|null
     */
    function getUserId()
    {
        $CI = &get_instance();
        return $CI->session->userdata('user_id');
    }
}

if (!function_exists('login')) {
    /**
     * Log in the user.
     *
     * @param int $user_id User ID
     */
    function login($user)
    {
        $CI = &get_instance();
        $CI->session->set_userdata('logged_in', TRUE);
        $CI->session->set_userdata('user', $user);
        return true;
    }
}

if (!function_exists('logout')) {
    /**
     * Log out the user.
     */
    function logout()
    {
        $CI = &get_instance();
        $CI->session->unset_userdata('logged_in');
        $CI->session->unset_userdata('user_id');
        $CI->session->sess_destroy();
    }
}

// Add more functions as needed, such as checking user roles, etc.
