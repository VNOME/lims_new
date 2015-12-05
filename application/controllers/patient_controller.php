<?php

class Patient_Controller extends CI_Controller {

    
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
}