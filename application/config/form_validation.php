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
    'employees/add|update' => [
        ['field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'],
        ['field' => 'last_name', 'label' => 'Last Name', 'rules' => 'required'],
    ],
    'branches/add|update' => [
        ['field' => 'name', 'label' => 'Branch Name', 'rules' => 'required'],
        ['field' => 'phone', 'label' => 'Branch Phone', 'rules' => 'required|numeric'],
        ['field' => 'email', 'label' => 'Branch Email', 'rules' => 'required|valid_email'],
        ['field' => 'landline_1', 'label' => 'land Line', 'rules' => 'required|numeric'],
        ['field' => 'address', 'label' => 'Branch Address', 'rules' => 'required|trim'],
        ['field' => 'desc', 'label' => 'Branch Description', 'rules' => 'trim'],
    ],
];
