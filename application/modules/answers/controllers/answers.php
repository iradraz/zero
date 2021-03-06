<?php

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        die;
class Answers extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function sequence_answers($data) {
        
    }

    function get($order_by) {
        $this->load->model('mdl_answers');
        $query = $this->mdl_answers->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_answers');
        $query = $this->mdl_answers->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_answers');
        $query = $this->mdl_answers->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_answers');
        $query = $this->mdl_answers->get_where_custom($col, $value);
        return $query;
    }

    function get_where_custom_rand($col, $value) {
        $this->load->model('mdl_answers');
        $query = $this->mdl_answers->get_where_custom_rand($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_answers');
        $this->mdl_answers->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_answers');
        $this->mdl_answers->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_answers');
        $this->mdl_answers->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_answers');
        $count = $this->mdl_answers->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_answers');
        $max_id = $this->mdl_answers->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_answers');
        $query = $this->mdl_answers->_custom_query($mysql_query);
        return $query;
    }

}
