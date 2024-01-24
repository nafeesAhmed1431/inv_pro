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
    'product_categories/add|update' => [
        ['field' => 'name', 'label' => 'Category Name', 'rules' => 'required|alpha']
    ],
    'product_brand/add|update' => [
        ['field' => 'name', 'label' => 'Name', 'rules' => 'required|alpha'],
        ['field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'],
        ['field' => 'mobile', 'label' => 'Mobile', 'rules' => 'required|numeric'],
        ['field' => 'phone', 'label' => 'Phone', 'rules' => 'numeric'],
        ['field' => 'landline_1', 'label' => 'Landline 1', 'rules' => 'numeric'],
        ['field' => 'landline_2', 'label' => 'Landline 2', 'rules' => 'numeric'],
        ['field' => 'landline_3', 'label' => 'Landline 3', 'rules' => 'numeric'],
        ['field' => 'address', 'label' => 'Address', 'rules' => 'required'],
    ],
    'product_unit/add|update' => [
        ['field' => 'name', 'label' => 'Name', 'rules' => 'required|alpha'],
        ['field' => 'symbol', 'label' => 'Symbol', 'rules' => 'required|alpha'],
    ],
    'suppliers/add|update' => [
        ['field' => 'name', 'label' => 'Name', 'rules' => 'required|alpha'],
        ['field' => 'phone', 'label' => 'Phone Number', 'rules' => 'required|numeric'],
        ['field' => 'address', 'label' => 'Address', 'rules' => 'required|trim'],
        ['field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email'],
        ['field' => 'city', 'label' => 'City', 'rules' => 'alpha'],
        ['field' => 'state', 'label' => 'State', 'rules' => 'alpha'],
        ['field' => 'country', 'label' => 'Country', 'rules' => 'alpha'],
        ['field' => 'opening_balance', 'label' => 'Opening Balance', 'rules' => 'numeric'],
    ]
];
