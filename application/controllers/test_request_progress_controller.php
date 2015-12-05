<?php

class test_request_progress_controller extends CI_Controller {

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
        
        $this->load->model('laboratory_test_request_model');
        $data['internal_test_request'] = $this->laboratory_test_request_model->GetInternalRequests();
        
        /*mafais*/
        $this->load->model('mri_specimen_type_model', 'specimenTypes');
        $specimen_types = $this->specimenTypes->getAlltSpecimenTypeDetails();
        $data['specimen_types'] = $specimen_types;
        
         $data['specimen_maxID'] = $this->getMaxSpecimenID();
    //     print_r($data['specimen_maxID']);
        $this->load->view('test_request_progress',$data);
    }
    
    public function GetInternalRequests() {
        
        
        $this->load->model('laboratory_test_request_model');
        $result = $this->laboratory_test_request_model->GetInternalRequests();

        echo json_encode($result);
    }
    
        /*_______________________ Code By MSM Mafais __________________________________*/

    public function insertSpecimen()
    {
//        if (isset($_POST['mri_specimen'])) {
            $Data = $_POST['mri_specimen'];

            $data_string = json_encode($Data);
            
            $this->load->model('mri_specimen_model', 'specimenModel');            
            $ss = $this->specimenModel->InsertNewSpecimen($data_string);
            
            echo json_encode($ss);
            
            exit;
 //       }

    }
    
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
    
     
    
    public function special_barcode() {
        if(isset($_GET['req_id'])){
            $this->load->library('pdf');
            $data = array();
            $data['results'] = $this->results->getSingleTestRequestData($_GET['req_id']);
            $this->pdf->load_view("mri_spcl_report",$data);
            $this->pdf->render();
            $this->pdf->stream("report.pdf");
        }
    }
    
    
    function pdf()
    {
     $this->load->helper(array('dompdf', 'file'));
     // page info here, db calls, etc.     
     $html = $this->load->view('controller/viewfile', $data, true);
     pdf_create($html, 'filename');
     //or
     //$data = pdf_create($html, '', false);
     //write_file('name', $data);
     //if you want to write it to disk and/or send it as an attachment    
    }
}

