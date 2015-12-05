<?php

class New_test_request_controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
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

    public function index() {
        
        $data = array();
        
        /*mafais*/
        $this->load->model('mri_specimen_type_model', 'specimenTypes');
        $specimen_types = $this->specimenTypes->getAlltSpecimenTypeDetails();
        $data['specimen_types'] = $specimen_types;
        
        //print_r($data['specimen_types']);
         $data['specimen_maxID'] = $this->getMaxSpecimenID();
         
        $this->load->view('new_test_request',$data);
    }
    
    public function GetAllTestRequestTypes() {
        
        
        $this->load->model('Laboratory_Test');
        $result = $this->Laboratory_Test->GetAllTestRequestTypes();

        echo json_encode($result);
    }
    
    public function InsertNewInternalRequests()
    {
        if (isset($_POST['requests'])) {
            $Data = $_POST['requests'];

            $data_string = json_encode($Data);
            
            $this->load->model('laboratory_test_request_model');
            $ss = $this->laboratory_test_request_model->InsertNewInternalRequests($data_string);
            
            echo json_encode($ss);
            exit;
        }
        
        
    }
    
    public function InsertNewHospitalRequests()
    {
        if (isset($_POST['requests'])) {
            $Data = $_POST['requests'];

            $data_string = json_encode($Data);
            
            $this->load->model('laboratory_test_request_model');
            $ss = $this->laboratory_test_request_model->InsertNewHospitalRequests($data_string);
            
            
            echo json_encode($ss);
   
        }

    }
    
     public function GetLastRequestID() {

        $this->load->model('laboratory_test_request_model');
        $result = $this->laboratory_test_request_model->GetLastRequestID();
       
        echo json_encode($result);
        exit;
    }
    
    public function LoadPdf() {

         $this->load->view('mri_spcl_barcode');
    }
    
   // Mafais
    function  getMaxSpecimenID()
    {
        $this->load->model('mri_specimen_model', 'specimenModel');
        $sss = $this->specimenModel->GetMaxSpecimenID();
        
        return $sss;
    }
            function  barcode($code)
    {
        // We load her library's reading Zend.php file that contains the loader
        // For existing files in the folder Zend
        $this->load->library( 'zend' );
         
        // Load that is in a folder Zend
        $this->zend->load('Zend/Barcode' );
         
        // Generate barcodenya
        // $ Code = 12345abc;
        Zend_Barcode::render( 'code128' , 'image' , array( 'text' => $code ), array());
    }
    
}