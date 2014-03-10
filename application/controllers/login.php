<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login controller class
 */

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($msg = NULL) {
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
        $this->load->view('v_login', $data);
    }

    public function process() {
        // Load the model
        $this->load->model('m_login');
        // Validate the user can login
        $result = $this->m_login->validate();
        // Now we verify the result
        if (!$result) {
            // If user did not validate, then show them login page again
            $msg = '<font color=white>*)&nbsp Salah NIP dan atau Password. Mohon cek kembali</font><br />';
            $this->index($msg);
        } else {
            // If user did validate, 
            // Send them to members area
            redirect('grafik');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}

?>