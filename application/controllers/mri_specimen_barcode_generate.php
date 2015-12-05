<?php

class Mri_specimen_barcode_generate extends CI_Controller {

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

                           
        if(isset($_POST['reqIDStart']) && isset($_POST['reqIDEnd'])){
            
            $data['specimens'] = $this->getSpecimenIDByRequestIDRange($_POST['reqIDStart'],$_POST['reqIDEnd']);
        }
        $this->load->view('mri_specimen_barcode_generate',$data);    
    }   
    
    public function getSpecimenIDByRequestIDRange($sReqID,$eReqID){ 
        $data = array();
        $data['specimen'] = $this->getSpecimenRequestID($sReqID,$eReqID);        

//    print_r ($data['specimen']);

        return $data['specimen'];          
    }

    public function getSpecimenRequestID($sRequest_id,$eRequest_id) {
        $this->load->model('mri_specimen_model', 'requests');
        return $this->requests->getSpecimen_ids_by_requestID($sRequest_id, $eRequest_id);

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
