<?php

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        die;
class Test extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function addtest() {
        $data['view_module'] = "test";
        $data['view_file'] = "addtest";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('test_name', 'Test Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['view_module'] = "test";
            $data['view_file'] = "addtest";
        } else {

            // database manipulation add goes here
            $data = array(
                'test_name' => $this->input->post('test_name')
            );
            $this->load->module('test');
            $data['insert_id'] = $this->test->_insert($data);
            $data['query'] = $this->test->get_where($data['insert_id']);

            $data['view_module'] = "test";
            $data['view_file'] = "test_intro";
        }

        $this->load->module('templates');
        $this->templates->user($data);
    }

    function sequence_test_questions($test_id) {
        $test = $this->get_where_custom('test_id', $test_id);

        $this->load->module('questions');
        $questions = $this->questions->get_where_custom('test_id', $test_id)->result_array();
        $this->load->module('answers');
        foreach ($questions as $key => $value) {
            //      echo $key . ' ' . $value['question_id'] . '<br>';
            $answers = $this->answers->get_where_custom('question_id', $value['question_id'])->result_array();
            foreach ($answers as $answer_key => $answer_value) {
                $questions[$key]['answers'][$answer_key] = $answer_value;
            }
        }
        return $questions; // return test questions with all it's answers
    }

    function mix_test_questions($test_id) {
        $test = $this->get_where_custom('test_id', $test_id);

        $this->load->module('questions');
        $questions = $this->questions->get_where_custom_rand('test_id', $test_id)->result_array();
        $this->load->module('answers');
        foreach ($questions as $key => $value) {
            $answers = $this->answers->get_where_custom_rand('question_id', $value['question_id'])->result_array();
            foreach ($answers as $answer_key => $answer_value) {
                $questions[$key]['answers'][$answer_key] = $answer_value;
            }
        }
        return $questions;
    }

    function tests_list() {
        $this->load->module('test');
        $this->load->module('questions');
        $query = $this->test->get('test_id')->result_array();
        foreach ($query as $key => $value) {
            $query[$key]['count'] = $this->questions->count_where('test_id', $value['test_id']);
        }
        $data['query'] = $query;
        $data['view_module'] = 'test';
        $data['view_file'] = 'tests_list';

        $this->load->module('templates');
        $this->templates->user($data);
    }

    function view_test($test_id) {
        $data['view_module'] = 'test';
        $data['view_file'] = 'view_test';
        $data['test_id'] = $test_id;

        $this->load->module('templates');
        $this->templates->user($data);
    }

    function mix_test($test_id) {
        $data['view_module'] = 'test';
        $data['view_file'] = 'mix_test';
        $data['test_id'] = $test_id;

        $this->load->module('templates');
        $this->templates->user($data);
    }

    function get($order_by) {
        $this->load->model('mdl_test');
        $query = $this->mdl_test->get($order_by);
        return $query;
    }

    function get_rand($order_by) {
        $this->load->model('mdl_test');
        $query = $this->mdl_test->get_rand($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_test');
        $query = $this->mdl_test->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_test');
        $query = $this->mdl_test->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_test');
        $query = $this->mdl_test->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_test');
        $insert_id = $this->mdl_test->_insert($data);

        return $insert_id;
    }

    function _update($id, $data) {
        $this->load->model('mdl_test');
        $this->mdl_test->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_test');
        $this->mdl_test->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_test');
        $count = $this->mdl_test->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_test');
        $max_id = $this->mdl_test->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_test');
        $query = $this->mdl_test->_custom_query($mysql_query);
        return $query;
    }

}
