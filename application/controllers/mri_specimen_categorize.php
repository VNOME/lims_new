<?php

class Mri_specimen_categorize extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); 
         $this->load->library('session');
    }

    private function _init()
    {
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

    public function index()
    {
        $this->_init();
        $data = array();
              
        $data['Specimens'] = $this->getAllSpecimenDetails();
        $this->load->view('mri_specimen_categorize',$data);    
        
    }   
    
    public function getAllSpecimenDetails()
    {
        $this->load->model('Mri_specimen_model','mriSpecimen');
        $specimen = $this->mriSpecimen->getAlltSpecimenDetails();
        return($specimen);
    }
     
    

   

     

}
