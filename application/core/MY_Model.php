<?php
class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_row($table, $where)
    {
        return $this->db->where($where)->get($table)->row();
    }

    public function get_where($table, $where)
    {
        return $this->db->where($where)->get($table)->result();
    }

    public function get_where_select($table, $where, $select)
    {
        return $this->db->select($select)->where($where)->get($table)->result();
    }

    public function get_all($table)
    {
        return $this->db->get($table)->result();
    }

    public function get_all_select($table, $select)
    {
        return $this->db->select($select)->get($table)->result();
    }
}
