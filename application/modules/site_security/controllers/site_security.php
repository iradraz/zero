<?php

class Site_security extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function _make_sure_is_admin() {
        $is_admin = TRUE; // security check goes here
        if ($is_admin != TRUE)
            redirect('site_security/not_allowed');
    }

    function not_allowed() {
        echo "you are not allowed to be here";
    }

}
