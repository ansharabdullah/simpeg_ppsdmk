<?php

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function home() {
        $this->load->view('laman/v_header');
    }
    

}
