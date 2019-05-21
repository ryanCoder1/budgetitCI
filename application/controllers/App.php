<?php

class App extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('session');
    $this->load->library('form_validation');

  }

  public function index($page = 'index'){
    if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)){
      if(!file_exists(APPPATH.'/views/app/'.$page.'.php')){
        show_404();
      }
      $this->load->view('templates/header');
      $this->load->view('app/options');
      $this->load->view('app/'.$page);
      $this->load->view('templates/footer');
  }else{
      redirect('');
  }
}
public function test_date($date){
    if($date != '0000-00-00'){
      if(strpos($date, '-') == 4 && strripos($date, '-') == 7){
        return true;
      }else{
        return false;
      }
    }
}

  public function addRecord(){
    if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)){


      $this->form_validation->set_rules('record_date', $this->input->post('record_date') , 'required|callback_test_date');
      $this->form_validation->set_message('required', 'Date field must be valid e.g. 2019-10-23');
      $this->form_validation->set_rules('amount', $this->input->post('amount'), 'required|numeric');
      $this->form_validation->set_rules('test', 'category');
      $this->form_validation->set_rules('category', $this->input->post('category'), 'required|differs[test]');

      if($this->form_validation->run() === false){
        $this->load->view('templates/header');
        $this->load->view('app/options');
        $this->load->view('app/index');
        $this->load->view('templates/footer');
      }else{
        if($this->App_model->addRecord($_POST)){
          // if record is added successfully in db
          $data = [
            'record_success' => 'Record was added successfully!'
          ];
          $this->load->view('templates/header');
          $this->load->view('app/options', $data);
          $this->load->view('app/index');
          $this->load->view('templates/footer');
        }
      }
    }
  }
public function showViewer(){
  if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)){

      $this->form_validation->set_rules('past_date', $this->input->post('past_date') , 'required|callback_test_date');
      $this->form_validation->set_message('required', 'Date field must be valid e.g. 2019-10-23');
      $this->form_validation->set_rules('recent_date', $this->input->post('recent_date') , 'required|callback_test_date');
      $this->form_validation->set_message('required', 'Date field must be valid e.g. 2019-10-23');
      $this->form_validation->set_rules('budget_amount', $this->input->post('budget_amount'), 'required|numeric');

      $this->form_validation->set_rules('category', $this->input->post('category'), 'required');
        if($this->form_validation->run() === false){
            $this->load->view('templates/header');
            $this->load->view('app/options');
            $this->load->view('app/index');
            $this->load->view('templates/footer');
          }else{
            $data['result'] = $this->App_model->showViewer($_POST);
            $data['past_date'] = $this->input->post('past_date');
            $data['recent_date'] = $this->input->post('recent_date');
            $data['budget_amount'] = $this->input->post('budget_amount');

              $this->load->view('templates/header');
              $this->load->view('app/viewer', $data);
              $this->load->view('templates/footer');
              }
          }
      }


}



?>
