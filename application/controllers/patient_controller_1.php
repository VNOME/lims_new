<?php

class Patient_Controller_1 extends CI_Controller {

    function __construct() {
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

        $this->load->model('Patient_Model');
        $data['all_patient_result'] = $this->Patient_Model->GetAllPatients();

        $this->load->view('patient_view', $data);
    }

    public function GetAllExternalPatients() {



        $this->load->model('Patient_Model');
        $result = $this->Patient_Model->GetAllExternalPatients();

        echo json_encode($result);
    }

    public function GetExternalPatientById($data) {


        $this->load->model('Patient_Model');
        $result = $this->Patient_Model->GetExternalPatientById($data);



        echo json_encode($result);
    }

    public function GetAllHospitalpatients() {


        $this->load->model('Patient_Model');
        $result = $this->Patient_Model->GetAllHospitalpatients();

        echo json_encode($result);
    }

    public function GetHospitalpatientsByHID($data) {


        $this->load->model('Patient_Model');
        $result = $this->Patient_Model->GetHospitalpatientsByHID($data);

        echo json_encode($result);
    }

    public function InsertNewPatient() {
        if (isset($_POST['patient'])) {
            $Data = $_POST['patient'];

            $data_string = json_encode($Data);

            $this->load->model('Patient_Model');
            $ss = $this->Patient_Model->InsertNewPatient($data_string);

            echo json_encode($ss);
        }
    }

    public function GetPatientCount() {
        $this->load->model('Patient_Model');
        $result = $this->Patient_Model->GetPatientCount();

        echo json_encode($result);
        exit;
    }

}
