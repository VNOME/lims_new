<?php

class Mri_specimen_Info_search extends CI_Controller {

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

    public function index(){
        $this->_init();
        $data = array();
        if(isset($_POST['ReqID'])){
            //print "<script type=\"text/javascript\">alert('Some text');</script>";
            
            $data['RequestDetails'] = $this->GetMriTestsReqDetailsByRequestIDs($_POST['ReqID']);
            
        }       
        
        $this->load->view('mri_specimen_info_search',$data);    
        
    }   
    
    public function GetMriTestsReqDetailsByRequestIDs($sReqID){ 
        $data = array();
        $data['RequestDetail'] = $this->GetMriTestsReqDetailsByRequestID($sReqID);

 //   print_r ($data['RequestDetail']);

        return $data['RequestDetail'];          
    }

     
      public function GetMriTestsReqDetailsByRequestID($request_id) {
        
        $this->load->model('Mri_specimen_model', 'testRequests');
        return $this->testRequests->GetMriTestReqDetailsByRequestID($request_id);        
         
    }

}

/*
public function searchPatientAndTestDetails($ReqID){ 
        $data = array();
        $data['specimen'] = $this->getSpecimenRequestID($ReqID);
        
        return $data['specimen'];
        //print_r($_POST['TestID']);
        //echo ($data['specimen']);
    }

    public function searchSpecimenDetails($ReqID){ 
        $data = array();
        
        $data['specimenDetail'] = $this->getSpecimenInDetailsRequestID($ReqID); 

        return $data['specimenDetail'];
        //print_r($_POST['TestID']);
        echo ($data['specimenDetail']);
    }

     public function getSpecimenRequestID($request_id) {
        $this->load->model('test_request_model', 'requests');
        return $this->requests->getTestRequestByRequestID($request_id);
    }

     public function getSpecimenInDetailsRequestID($request_id) {
        $this->load->model('test_request_model', 'requests');
        return $this->requests->getSpecimenInDetails($request_id);
    }
     
    public function getSpecimenInforamtionDetailsSearch() {
       
        $data  = array(
            'ReqID' => $_POST['ReqID'] );
         $ReqID = $_POST['ReqID']  ;

         $this->load->view('mri_specimen_info_search',$data );

         $parameters = $this->uri->uri_to_assoc();
    }*/