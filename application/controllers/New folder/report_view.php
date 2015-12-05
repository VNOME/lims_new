<?php

class Report_controller extends CI_Controller{
	function __construct()
	{
		parent::__construct();

		$this->_init();
	}
	
	private function _init()
	{
		$this->output->set_template('default');
		$this->load->section('sidebar', 'includes/sidebar');
	} 
	
    public function index(){
        $this->load->view('report_view');
        //update status
        $this->load->model('testRequestModel', 'requests');
        $this->requests->setStatus(json_encode(array("reqID" => $_GET['ReqID'], "status" => "Report Issued")));
    }

    public function  getAllReport()
    {

        if (isset($_POST['ID'])) {
            $Data = $_POST['ID'];
            $this->load->model('/lab/ReportModel','report');
            $ss=$this->report->getReportData($Data);
            print_r($ss);
            return $ss;
        }

    }

}
