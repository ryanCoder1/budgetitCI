<?php

class User_model extends CI_Model {

  function __construct()
  {
      parent::__construct();
      $this->load->library('encryption');
      $this->load->library('session');
  }

  public function userExists($email){
    $this->db->select('*');
    $this->db->where('email', $email);
    $query = $this->db->get('users');

    if($query->num_rows() > 0){
      return false;
    }else{
      return true;
    }

  }
  // insert user data into db creating Account
  // @return = boolean true if insert successful
  public function createUser($_post){
      $data = array(
            'email' => $_post['email'],
            'fname' => $_post['fname'],
            'lname' => $_post['lname'],
            'password' => $this->encryption->encrypt($_post['password'])

      );
      $this->db->insert('users', $data);
      return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function loginUser($_post){

      $this->db->select("*");
      $this->db->where('email', $_post['email']);
      $query = $this->db->get('users');
     foreach($query->result() as $row){
       if(!empty($row)){
        if($this->encryption->decrypt($row->password) == $_post['password']){
          $this->session->set_userdata('user_id', $row->id);
          return true;
        }
     }else{
       return false;
     }
   }
  }
}






?>
