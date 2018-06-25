<?php

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        die;
class Questions extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function addquestions() {
        $this->load->module('test');
        $number = $this->test->count_where('test_id', $this->uri->segment(3)); // avoid non-available test_id
        if ($number == 1) {
            $data['view_module'] = "questions";
            $data['view_file'] = "addquestions";
            $data['test_id'] = $this->uri->segment(3);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('question_asked', 'Question asked', 'required');
            $this->form_validation->set_rules('answer1', 'Correct answer', 'required');
            $this->form_validation->set_rules('answer2', 'Wrong answer', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data['view_module'] = "questions";
                $data['view_file'] = "addquestions";
            } else { // form_validation sucess:
                $data = $this->input->post(['test_id', 'question_asked'], TRUE);
                $this->load->module('questions');
                $question_id = $this->questions->_insert($data);
                $this->load->module('answers');

                $answer = array_filter($this->input->post(['question_id', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'answer6'], TRUE)); //sequence filtered answers into $answers
                $counter = 1;
                foreach ($answer as $key) {
                    $data_to_insert = array(
                        'question_id' => $question_id,
                        'answer' => $key
                    );
                    if ($counter == 1) {
                        $data_to_insert += array('answer_correct' => 1);
                        $counter = 0; // only 1 correct answer per set
                    } else
                        $data_to_insert += array('answer_correct' => 0);
                    $this->answers->_insert($data_to_insert);
                }

                $data['view_module'] = "questions";
                $data['view_file'] = "addquestions";
            }
        } else {
            redirect(base_url());
        }
        
        $this->load->module('templates');
        $this->templates->user($data);
    }

    function get($order_by) {
        $this->load->model('mdl_questions');
        $query = $this->mdl_questions->get($order_by);
        return $query;
    }

    function get_rand($order_by) {
        $this->load->model('mdl_questions');
        $query = $this->mdl_test->get_rand($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) {
        $this->load->model('mdl_questions');
        $query = $this->mdl_questions->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id) {
        $this->load->model('mdl_questions');
        $query = $this->mdl_questions->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) {
        $this->load->model('mdl_questions');
        $query = $this->mdl_questions->get_where_custom($col, $value);
        return $query;
    }

    function get_where_custom_rand($col, $value) {
        $this->load->model('mdl_questions');
        $query = $this->mdl_questions->get_where_custom_rand($col, $value);
        return $query;
    }

    function _insert($data) {
        $this->load->model('mdl_questions');
        $insert_id = $this->mdl_questions->_insert($data);
        return $insert_id;
    }

    function _update($id, $data) {
        $this->load->model('mdl_questions');
        $this->mdl_questions->_update($id, $data);
    }

    function _delete($id) {
        $this->load->model('mdl_questions');
        $this->mdl_questions->_delete($id);
    }

    function count_where($column, $value) {
        $this->load->model('mdl_questions');
        $count = $this->mdl_questions->count_where($column, $value);
        return $count;
    }

    function get_max() {
        $this->load->model('mdl_questions');
        $max_id = $this->mdl_questions->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) {
        $this->load->model('mdl_questions');
        $query = $this->mdl_questions->_custom_query($mysql_query);
        return $query;
    }

}
