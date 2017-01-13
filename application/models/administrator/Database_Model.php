<?php

/**
 * 这是一个数据库操作的公共model
 * Enter description here ...
 * @author loach
 *
 */
class Database_Model extends CI_Model
{
	   public function __construct() {
        parent::__construct();
    }

    /**
     * 选择数据库组
     * @param type $dbgroup 数据库组
     */
    public function get_db($dbgroup = 'default') {
        $this->db = $this->load->database($dbgroup, TRUE);
    }

    /**
     * 获取表数据
     * @param type $table
     * @param type $where
     * @param type $fields
     * @param type $like
     * @return Array 二维数组
     */
    public function get_table_data($dbgroup, $table, $where = array(), $fields = array(), $like = array(), $limit=array(), $orderby = '') {
        $this->get_db($dbgroup);
        if (!empty($fields)) {
            $fields_string = implode(',', $fields);
            $this->db->select($fields_string);
        }
        $this->db->where($where);
        
        $this->db->like($like);
        if (!empty($limit)) {
            $this->db->limit($limit[0], $limit[1]);
        }
        if (!empty($orderby)) {
            $this->db->order_by($orderby);
        }
        $query = $this->db->get($table);

        return $query->result_array() ? $query->result_array() : array();
    }

    /**
     * 获取表数据
     * @param type $table
     * @param type $where
     * @param type $fields
     * @param type $like
     * @return Array 一维数组
     */
    public function get_table_row($dbgroup, $table, $where = array(), $fields = array(), $like = array(), $limit = array(), $orderby = '') {
        $this->get_db($dbgroup);
        if (!empty($fields)) {
            $fields_string = implode(',', $fields);
            $this->db->select($fields_string);
        }
        $this->db->where($where);
        $this->db->like($like);
        if (!empty($limit)) {
            $this->db->limit($limit['limit'], $limit['offset']);
        }
        if (!empty($orderby)) {
            $this->db->order_by($orderby);
        }
        $query = $this->db->get($table);

        return $query->row_array() ? $query->row_array() : array();
    }

    /**
     * 统计数量
     * @param type $table
     * @param type $where
     * @return type
     */
    public function count_table_num($dbgroup, $table, $where = array()) {
        $this->get_db($dbgroup);
        $this->db->where($where);
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    /**
     * 获取以key为下表的数组
     * @param type $table
     * @param type $where
     * @param type $key
     * @param type $fields
     * @return type
     */
    public function get_key_value($dbgroup, $table, $where = array(), $key = '', $fields = array()) {
        $this->get_db($dbgroup);
        $result = $this->get_table_data($table, $where, $fields);
        $data = array();
        foreach ($result as $value) {
            $data[$value[$key]] = $value;
        }
        return $data;
    }

    /**
     * 插入
     * @param type $table
     * @param type $data
     * @return type
     */
    public function insert($dbgroup, $table, $data) {
        $this->get_db($dbgroup);
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    
    public function insert_table_return_bool($dbgroup, $table, $data){
    	$this->get_db($dbgroup);
        return $this->db->insert($table, $data);
    }

    /**
     * 更新
     * @param type $table
     * @param type $set
     * @param type $where
     * @return type
     */
    public function update($dbgroup, $table, $set, $where) {
        $this->get_db($dbgroup);
        $this->db->update($table, $set, $where);
        return $this->db->affected_rows();
    }

    /**
     * 删除
     * @param type $table
     * @param type $where
     * @param type $limit
     * @return type
     */
    public function del($dbgroup, $table, $where, $limit) {
        $this->get_db($dbgroup);
        $this->db->delete($table, $where, $limit);
        return $this->db->affected_rows();
    }

    //执行sql
    function query($dbgroup, $sql) {
        $this->get_db($dbgroup);
        return $this->db->query($sql);
    }

    //查询1条数据，返回结果
    function query_one($dbgroup, $sql) {
        $this->get_db($dbgroup);
        return $this->db->query($sql)->row_array();
    }

    //查询list data
    function querylist($dbgroup,$sql) {

        $result = array();
        $this->get_db($dbgroup);
        $query = $this->db->query($sql);
        if ($query) {
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
        }
        return $result;
    }
	

}