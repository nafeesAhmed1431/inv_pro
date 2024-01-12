<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Stripe
{
    private $ci;
    private $setting;
    private $error;
    private $stripe;


    function __construct()
    {
        $this->ci = &get_instance();
        $this->setting = $this->ci->config->item('stripe');
        require APPPATH . 'third_party/stripe-php/init.php';
        \Stripe\Stripe::setApiKey($this->setting['sk']);
    }

    public function add_customer($email, $token)
    {
        try {
            return \Stripe\Customer::create([
                'email' => $email,
                'token' => $token
            ]);
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }
}
