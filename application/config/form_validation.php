<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config = [
    'auth/login' => [
        ['field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'],
        ['field' => 'password', 'label' => 'Password', 'rules' => 'required',]
    ],
    'auth/register' => [
        ['field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'],
        ['field' => 'password', 'label' => 'Password', 'rules' => 'required',]
    ],
];
