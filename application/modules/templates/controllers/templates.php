<?php

class Templates extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function show_user() {
        $data = "";
        $this->user($data);
    }

    function user($data) {
        $this->load->view('user', $data);
    }
    
    function show_admin() {
        $data = "";
        $this->admin($data);
    }

    function admin($data) {
        $this->load->view('admin', $data);
    }

}
