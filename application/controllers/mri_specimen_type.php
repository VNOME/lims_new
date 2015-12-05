<?php

class Mri_specimen_type extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->_init();
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
       
        
        $data['SpecimensType'] = $this->getAllSpecimenTypeDetails();
        
        $this->load->view('mri_specimen_type',$data);        
    }
    
    public function getAllSpecimenTypeDetails()
    {
        $this->load->model('mri_specimen_type_model','mriSpecimenType');
        $specimenType = $this->mriSpecimenType->getAlltSpecimenTypeDetails();
        return($specimenType);
    }
     
     
    public function insertSpecimenType()
    {
//        if (isset($_POST['mri_specimen'])) {
            $Data = $_POST['specimenType'];

            $data_string = json_encode($Data);
            
            $this->load->model('mri_specimen_type_model', 'specimenTypeModel');            
            $ss = $this->specimenTypeModel->InsertNewSpecimenType($data_string);
            
            echo json_encode($ss);
 //       }

    }


     

}
