<?php

class Users extends CI_Controller{

  public function __construct(){
     parent::__construct();
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->library('session');
  }

  public function registerIndex($page = ''){
    if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false) || !isset($_SESSION['logged_in'])){
      if(!file_exists(APPPATH.'/views/auth/'.$page.'.php')){
        show_404();

    }
        $this->load->view('templates/header');
        $this->load->view('auth/'.$page);
        $this->load->view('templates/footer');
    }else{
      redirect('');
    }
  }

// Validate $_POST, test if user exists and register account.
// send to routes during each task
// var = $_POST array from view
  public function register(){
    // on registeruser page refresh. if $_post is empty
      if(empty($this->input->post())){
        $this->load->view('templates/header');
        $this->load->view('auth/register');
        $this->load->view('templates/footer');
      }else{
    // Validate form fields
    $this->form_validation->set_rules('email', $this->input->post('email') , 'required|valid_email');
    $this->form_validation->set_rules('fname', $this->input->post('fname'), 'required');
    $this->form_validation->set_rules('lname', $this->input->post('lname'), 'required');
    $this->form_validation->set_rules('password', $this->input->post('password'), 'required');
    $this->form_validation->set_rules('re-enter-password', $this->input->post('re-enter-password'), 'required|matches[password]');
    $this->form_validation->set_message('matches','Both password fields must match');
    // send back to register if validation return errors
      if($this->form_validation->run() === false){

        $this->load->view('templates/header');
        $this->load->view('auth/register');
        $this->load->view('templates/footer');
      }

      if($this->User_model->userExists($this->input->post('email'))){
        if($this->User_model->createUser($_POST)){
          // if Email is already used in db
          $data = [
            'login' => 'Account created successfully! Now you can log in'
          ];
          $this->load->view('templates/header');
          $this->load->view('auth/login', $data);
          $this->load->view('templates/footer');
        }
      }else{
        // if Email is already used in db
        $data = [
          'emailTaken' => 'Email is already in records. Try '
        ];
        $this->load->view('templates/header');
        $this->load->view('auth/register', $data);
        $this->load->view('templates/footer');
      }
    }

  }

 // load login page
  public function loginIndex($page = 'home'){
    if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false) || !isset($_SESSION['logged_in'])){
      if(!file_exists(APPPATH.'/views/auth/'.$page.'.php')){
        show_404();

    }
        $this->load->view('templates/header');
        $this->load->view('auth/'.$page);
        $this->load->view('templates/footer');
    }else{
      redirect('');
    }
  }

  // validate and test user Email/Password to db data
  public function loginUser(){
    // on loginuser page refresh. if $_post is empty
      if(empty($this->input->post('email'))){
        $this->load->view('templates/header');
        $this->load->view('auth/login');
        $this->load->view('templates/footer');
      }else{
        // Validate form fields
        $this->form_validation->set_rules('email', $this->input->post('email') , 'required|valid_email');
        $this->form_validation->set_rules('password', $this->input->post('password'), 'required');
        // send back to register if validation return errors
          if($this->form_validation->run() === false){
            $this->load->view('templates/header');
            $this->load->view('auth/login');
            $this->load->view('templates/footer');

        }
        if($this->User_model->loginUser($_POST)){
            $this->session->set_userdata('logged_in','true');
            redirect('app/index');
        }else{
          $data = [
              'notInDb' => 'Either email or password not in our records.'
          ];
          $this->load->view('templates/header');
          $this->load->view('auth/login', $data);
          $this->load->view('templates/footer');
        }
      }
}
public function logoutIndex($page = ''){

    if(!file_exists(APPPATH.'/views/auth/'.$page.'.php')){
      show_404();
  }
      $this->load->view('templates/header');
      $this->load->view('auth/'.$page);
      $this->load->view('templates/footer');

}
public function logout(){
      $this->session->set_userdata('logged_in', false);
      $this->session->unset_userdata('user_id');
      redirect('');
}
}
 ?>
