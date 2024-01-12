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
    'users/add|update' => [
        ['field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'],
        ['field' => 'last_name', 'label' => 'Last Name', 'rules' => 'required'],
        ['field' => 'username', 'label' => 'Username', 'rules' => 'required'],
        ['field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'],
        ['field' => 'phone', 'label' => 'Phone', 'rules' => 'required|numeric'],
    ],
    'drivers/add|update' => [
        ['field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'],
        ['field' => 'last_name', 'label' => 'Last Name', 'rules' => 'required'],
        ['field' => 'cnic', 'label' => 'Username', 'rules' => 'required|numeric'],
        ['field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'],
        ['field' => 'phone_1', 'label' => 'Phone', 'rules' => 'required|numeric'],
        ['field' => 'vehicle_no', 'label' => 'Vehicle No', 'rules' => 'required'],
    ],
];
