<?php

class dashboard_controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->_init();
    }

    private function _init()
    {   $this->load->library('session');
        $this->output->set_template('default');
        
         
        $role = $this->session->userdata('role');
        
        if($role == "MLT")
        {
            $this->load->section('sidebar', 'includes/sidebarMLT');
        }
        else 
        {
            $this->load->section('sidebar', 'includes/sidebar');
        }
         
    }

    public function index() {
        //$this->load->model('laboratory_test_request_model');
        //$data['internal_test_request'] = $this->laboratory_test_request_model->GetInternalRequests();
        
        $role = $this->session->userdata('role');
        if($role == "")
        {
            $this->load->view('login_view');
        }
        else 
        {
            $this->load->view('dashboard');
        }
        
    }
    
    
}

