<?php
/**
 * Created by PhpStorm.
 * User: Dushyantha
 * Date: 11/7/15
 * Time: 7:06 AM
 */
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mri_binary_results extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mri_binary_results_model','results');
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
        $this->load->view('mri_binary_results');
    }

    public function report()
    {
        $this->_init();
        $this->load->view('mri_binary_report');
    }

    public function getTestReqests() {
        echo $this->results->getTestRequests($_POST);
    }

    public function addSingleResult() {
        $res = $this->results->addSingleResult($_POST);
        if($res=='true') {
            echo json_encode(array("success"=>true));
        } else {
            echo json_encode(array("success"=>false));
        }

    }

    public function getCompletedTestReqests() {
        echo $this->results->getCompletedTestReqests($_POST);
    }

    public function special_report() {
        if(isset($_GET['req_id'])){
            $this->load->library('pdf');
            $data = array();
            $data['results'] = $this->results->getSingleTestRequestData($_GET['req_id']);
            $this->pdf->load_view("mri_spcl_report",$data);
            $this->pdf->render();
            $this->pdf->stream("report.pdf");
        }
    }

    public function special_report_all() {
        if(isset($_POST['ids'])){
            $this->load->library('pdf');
            $data = array();
            for($i=0;$i<count($_POST['ids']);$i++){
                $data['results'][] = $this->results->getSingleTestRequestData($_POST['ids'][$i]);
            }
            $this->pdf->load_view("mri_spcl_report_all",$data);
            $this->pdf->render();
            //$this->pdf->stream("report.pdf");
            if (!file_exists('./reports/')) {
                mkdir('./reports/', 0777, true);
            }
            $filename = 'report'.uniqid().'.pdf';
            file_put_contents('./reports/'.$filename,$this->pdf->output());
            echo json_encode(array("filename"=>$filename,"success"=>true));
        } else {
            echo json_encode(array("success"=>false));
        }
    }
}