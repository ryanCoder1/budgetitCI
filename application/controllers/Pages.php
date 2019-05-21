
<?php

class Pages extends CI_Controller {

 public function __construct(){
   parent::__construct();
   $this->load->helper('url');
 }

 public function view($page = 'home'){

    if(!file_exists(APPPATH.'/views/pages/'.$page.'.php')){
        show_404();

    }
    $data = [
      'logged_in' => $this->session->userdata('logged_in')
    ];

    $this->load->view('templates/header');
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');
 }









}

 ?>
