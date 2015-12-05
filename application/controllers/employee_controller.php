<?php

class Employee_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->_init();
        
    }

    private function _init()
    {
        $this->output->set_template('default');
       $this->load->library('session');
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
        
        $this->load->model('Employee_Model');
        $data['all_employee_result'] = $this->Employee_Model->GetAllEmployees();
        $data['userRoles'] = json_decode($this->Employee_Model->GetAllUserRoles());
       // $data['pw'] = $this->Employee_View->generate_password();
        
        $this->load->view('employee_view', $data);        
    }
    
     public function InsertNewEmployee(){
        if (isset($_POST['employee'])) {
            $Data = $_POST['employee'];

            $data_string = json_encode($Data);
            
            $this->load->model('Employee_Model');
            $ss = $this->Employee_Model->InsertNewEmployee($data_string);
            
            //echo json_encode($ss);
        }

    }
    
    public function GetAllUserRoles() {

        $this->load->model('Employee_model', 'requests');
        $ss = $this->requests->GetAllUserRoles();
        print_r($ss);
        exit;
        return $ss;
    }
    
     public function registerUser(){
        if (isset($_POST['user'])) {
            $Data = $_POST['user'];

            $data_string = json_encode($Data);
            
            $this->load->model('Employee_Model');
            $ss = $this->Employee_Model->registerUser($data_string);
            
           // echo json_encode($ss);
        }

    }
    
    public function UpdateEmployee()
    {
        if (isset($_POST['employee'])) {
            $Data = $_POST['employee'];

            $data_string = json_encode($Data);
            
            $this->load->model('Employee_Model');
            $this->Employee_Model->UpdateEmployee($data_string);
            //$ss = $this->Employee_Model->UpdateEmployee($data_string);
            print("<br/><br/><br/><br/><br/><br/><br/>");
            print_r($ss);           
           // echo json_encode($ss);
            
        }

    }
    
    public function generate_password( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
        
       // $this->load->view('employee_view', $data);
    }
    
    
}