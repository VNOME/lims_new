<?php

session_start();

class Login_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
      //  $this->load->model('login_model', '', TRUE);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
    }

    function index() {      
        
//        print_r("akaskadskl");
//        exit();
        $data['in'] = FALSE;
        $this->load->view('login_view',$data);
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        
        $data['in'] = TRUE;
        $this->load->view('login_view',$data);
    }

    function login_validate() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_password_check');

        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view');
        } else {
            redirect('dashboard_controller');
        }
    }

    function password_check($password) {
        print_r("test4"); 
        //Field validation succeeded.&nbsp; Validate against database
        $username = $this->input->post('username');

        $this->load->model('login_model');
        //query the database
        $row = $this->login_model->login($username, $password);
	$this->load->library('session');
        $newdata = array("isLogin"=>false);
        if($row!='false') {
            $row = json_decode($row);
            $this->load->library('session');
            $newdata = array(
                   "isLogin"=>true,
                   'username'  => $row[0]->userName,
                   'role'     => $row[0]->mriUserRoles->roleName,
                   'name' => $row[0]->mriEmployee->name
               );  
            $this->session->set_userdata($newdata);
            return true;            
        } else {
            $this->form_validation->set_message('password_check', 'Invalid username or password');
            return false;
        }
        $data =$this->session->set_userdata($newdata);
        
        return $data;
    }

}

?>
