<?php
class Product_categories_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'product_categories';
    }
}
