<?php

class Controller extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function get($order_by) {
        $this->load->model('mdl_controller');
        $query = $this->mdl_controller->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_controller');
        $query = $this->mdl_controller->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_controller');
        $query = $this->mdl_controller->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_controller');
        $query = $this->mdl_controller->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_controller');
        $this->mdl_controller->_insert($data);
    }

    function _update($id, $data) {
        $this->load->model('mdl_controller');
        $this->mdl_controller->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_controller');
        $this->mdl_controller->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_controller');
        $count = $this->mdl_controller->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_controller');
        $max_id = $this->mdl_controller->get_max();
        return $max_id;
        
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_controller');
        $query = $this->mdl_controller->_custom_query($mysql_query);
        return $query;
    }

}
