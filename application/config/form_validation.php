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
    'users/add' => [
        ['field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'],
        ['field' => 'last_name', 'label' => 'Last Name', 'rules' => 'required'],
        ['field' => 'username', 'label' => 'Username', 'rules' => 'required'],
        ['field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'],
        ['field' => 'phone', 'label' => 'Phone', 'rules' => 'required|numeric'],
    ],
    'users/update' => [
        ['field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'],
        ['field' => 'last_name', 'label' => 'Last Name', 'rules' => 'required'],
        ['field' => 'username', 'label' => 'Username', 'rules' => 'required'],
        ['field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'],
        ['field' => 'phone', 'label' => 'Phone', 'rules' => 'required|numeric'],
    ],
];
