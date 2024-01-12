<?php
class MY_Model extends CI_Model
{
    protected $table;

    public function __construct()
    {
        parent::__construct();
    }

    public function row($where)
    {
        return $this->db->where($where)->get($this->table)->row();
    }

    public function where($where)
    {
        return $this->db->where($where)->get($this->table)->result();
    }

    public function where_select($where, $select = "*")
    {
        return $this->db->select($select)->where($where)->get($this->table)->result();
    }

    public function all()
    {
        return $this->db->get($this->table)->result();
    }

    public function select($select = "*")
    {
        return $this->db->select($select)->get($this->table)->result();
    }

    public function get($data)
    {
        return $this->db->where(gettype($data) == "string" ? ['id' => $data] : $data)
            ->get($this->table)
            ->{gettype($data) == "int" ? 'result' : 'row'}();
    }


    public function get_options($select = '*', $where = null, $limit = null, $offset = null, $order_by = null)
    {
        $this->db->select($select);
        if ($where !== null) {
            $this->db->where($where);
        }
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        if ($order_by !== null) {
            $this->db->order_by($order_by);
        }
        return $this->db->get($this->table)->result();
    }

    public function insert($data, $id = false)
    {
        $st = $this->db->insert($this->table, $data);
        return $id ? $this->db->insert_id() : $st;
    }

    public function update($data, $where)
    {
        return $this->db->update($this->table, $data, $where);
    }

    public function delete($data)
    {
        return $this->db->delete($this->table, is_string($data) ? ['id' => $data] : $data);
        // return $this->db->delete($this->table, gettype($data) == "string" ? ['id' => $data] : $data);
    }


    public function count($where = null)
    {
        if ($where !== null) {
            $this->db->where($where);
        }
        return $this->db->count_all_results($this->table);
    }

    public function like($field, $value, $position = 'both')
    {
        $this->db->like($field, $value, $position);
        return $this->db->get($this->table)->result();
    }

    public function not_like($field, $value, $position = 'both')
    {
        $this->db->not_like($field, $value, $position);
        return $this->db->get($this->table)->result();
    }

    public function or_like($field, $value, $position = 'both')
    {
        $this->db->or_like($field, $value, $position);
        return $this->db->get($this->table)->result();
    }

    public function or_not_like($field, $value, $position = 'both')
    {
        $this->db->or_not_like($field, $value, $position);
        return $this->db->get($this->table)->result();
    }

    public function group_by($field)
    {
        $this->db->group_by($field);
        return $this->db->get($this->table)->result();
    }

    public function having($having)
    {
        $this->db->having($having);
        return $this->db->get($this->table)->result();
    }

    public function distinct($field)
    {
        $this->db->distinct();
        $this->db->select($field);
        return $this->db->get($this->table)->result();
    }
}
