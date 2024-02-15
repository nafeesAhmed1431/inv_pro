<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_categories_model', 'category');
        $this->load->model('Brand_model', 'brand');
        $this->load->model('Ctegory_model', 'category');
        $this->load->model('Unit_model', 'unit');
        $this->load->model('Product_model', 'product');
    }

    public function index()
    {
        $this->load_view('products/index');
    }

    public function index_content()
    {
        $data['data'] = $this->product->all();
        $data['total'] = $this->product->count();
        $data['active'] = $this->product->count(['is_active' => true]);
        $data['inActive'] = $this->product->count(['is_active' => false]);
        echo json_encode(['status' => true, 'html' => $this->load->view('products/index_content', $data, true)]);
    }

    public function get_product()
    {
        $row = $this->product->get($this->input->get('id'));
        echo json_encode(['status' => !empty($row), 'data' => $row]);
    }

    public function get_payload()
    {
        echo json_encode([
            'status' => true,
            "categories" => $this->category->select(['id','name']),
            "brands" => $this->brand->select(['id','name']),
            "unit" => $this->unit->select(['id','symbol']),
        ]);
    }

    public function add_product()
    {
        if ($this->form_validation->run('product/add|update')) {
            echo json_encode([
                'status' => $this->product->insert([
                    'name' => $this->input->post('name'),
                    'code' => $this->input->post('code'),
                    'cost' => $this->input->post('cost'),
                    'price' => $this->input->post('price'),
                    'details' => $this->input->post('details'),
                    'is_active' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ], true)
            ]);
        } else {
            echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
        }
    }

    public function update_product()
    {
        if ($this->form_validation->run('product/add|update')) {
            echo json_encode([
                'status' => $this->product->update([
                    'name' => $this->input->post('name'),
                    'code' => $this->input->post('code'),
                    'cost' => $this->input->post('cost'),
                    'price' => $this->input->post('price'),
                    'details' => $this->input->post('details'),
                    'is_active' => $this->input->post('status'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ], ['id' => $this->input->post('id')])
            ]);
        } else {
            echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
        }
    }

    public function delete_product()
    {
        echo json_encode(['status' => $this->product->delete($this->input->post('id'))]);
    }

    // Categories----------------------------------------------------------------------------------------------------------------------------------------------------------------
    public function categories()
    {
        $this->load_view('products/category');
    }

    public function category_content()
    {
        $data['data'] = $this->category->all();
        $data['active'] = $this->category->count(['is_active' => 1]);
        $data['inActive'] = $this->category->count(['is_active' => 0]);
        $data['total'] = $this->category->count();
        echo json_encode(['status' => !empty($data['data']), 'html' => $this->load->view('products/category_content', $data, true)]);
    }

    public function get_category()
    {
        $row = $this->category->get($this->input->get('id'));
        echo json_encode(['status' => !empty($row), 'data' => $row]);
    }

    public function add_category()
    {
        if ($this->form_validation->run('product_categories/add|update')) {
            echo json_encode([
                'status' => $this->category->insert([
                    'name' => $this->input->post('name'),
                    'is_active' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ], true)
            ]);
        } else {
            echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
        }
    }

    public function update_category()
    {
        if ($this->form_validation->run('product_categories/add|update')) {
            echo json_encode([
                'status' => $this->category->update([
                    'name' => $this->input->post('name'),
                    'is_active' => $this->input->post('status'),
                ], ['id' => $this->input->post('id')])
            ]);
        } else {
            echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
        }
    }

    public function delete_category()
    {
        echo json_encode(['status' => $this->category->delete($this->input->post('id'))]);
    }

    // Brands----------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function brands()
    {
        $this->load_view('products/brands');
    }

    public function brand_content()
    {
        $data['data'] = $this->brand->all();
        $data['active'] = $this->brand->count(['is_active' => 1]);
        $data['inActive'] = $this->brand->count(['is_active' => 0]);
        $data['total'] = $this->brand->count();
        echo json_encode(['status' => true, 'html' => $this->load->view('products/brand_content', $data, true)]);
    }

    public function get_brand()
    {
        $row = $this->brand->get($this->input->get('id'));
        echo json_encode(['status' => !empty($row), 'data' => $row]);
    }

    public function add_brand()
    {
        if ($this->form_validation->run('product_brand/add|update')) {
            echo json_encode([
                'status' => $this->brand->insert([
                    'name' => $this->input->post('name'),
                    'mobile' => $this->input->post('mobile'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'landline_1' => $this->input->post('landline_1'),
                    'landline_2' => $this->input->post('landline_2'),
                    'landline_3' => $this->input->post('landline_3'),
                    'address' => $this->input->post('address'),
                    'is_active' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ], true)
            ]);
        } else {
            echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
        }
    }

    public function update_brand()
    {
        if ($this->form_validation->run('product_brand/add|update')) {
            echo json_encode([
                'status' => $this->brand->update([
                    'name' => $this->input->post('name'),
                    'mobile' => $this->input->post('mobile'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'landline_1' => $this->input->post('landline_1'),
                    'landline_2' => $this->input->post('landline_2'),
                    'landline_3' => $this->input->post('landline_3'),
                    'address' => $this->input->post('address'),
                    'is_active' => $this->input->post('status'),
                ], ['id' => $this->input->post('id')])
            ]);
        } else {
            echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
        }
    }

    public function delete_brand()
    {
        echo json_encode(['status' => $this->brand->delete($this->input->post('id'))]);
    }
    // Units----------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function units()
    {
        $this->load_view('products/units');
    }

    public function unit_content()
    {
        $data['data'] = $this->unit->all();
        $data['active'] = $this->unit->count(['is_active' => 1]);
        $data['inActive'] = $this->unit->count(['is_active' => 0]);
        $data['total'] = $this->unit->count();
        echo json_encode(['status' => true, 'html' => $this->load->view('products/unit_content', $data, true)]);
    }

    public function get_unit()
    {
        $row = $this->unit->get($this->input->get('id'));
        echo json_encode(['status' => !empty($row), 'data' => $row]);
    }

    public function add_unit()
    {
        if ($this->form_validation->run('product_unit/add|update')) {
            echo json_encode([
                'status' => $this->unit->insert([
                    'name' => $this->input->post('name'),
                    'symbol' => $this->input->post('symbol'),
                    'is_active' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ], true)
            ]);
        } else {
            echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
        }
    }

    public function update_unit()
    {
        if ($this->form_validation->run('product_unit/add|update')) {
            echo json_encode([
                'status' => $this->unit->update([
                    'name' => $this->input->post('name'),
                    'symbol' => $this->input->post('symbol'),
                    'is_active' => $this->input->post('status'),
                ], ['id' => $this->input->post('id')])
            ]);
        } else {
            echo json_encode(['status' => false, 'errors' => $this->form_validation->error_array()]);
        }
    }

    public function delete_unit()
    {
        echo json_encode(['status' => $this->unit->delete($this->input->post('id'))]);
    }
}
