<?php

class App_model extends CI_Model {

  function __construct()
  {
      parent::__construct();
      $this->load->library('encryption');
      $this->load->library('session');
  }

  public function addRecord($_post){
    $data = [
        'user_id' => $this->session->userdata('user_id'),
        'note' => $_post['note'],
        'record_date' => $_post['record_date'],
        'amount' => $_post['amount'],
        'category' => $_post['category']
    ];
    $this->db->insert('records', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function showViewer($_post){
    $data = [
        'user_id' => $this->session->userdata('user_id'),
        'past_date' => $_post['past_date'],
        'recent_date' => $_post['recent_date'],
        'category' => $_post['category']
    ];
    if($_post['category'] == 'all'){
        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('record_date >=', $_post['past_date']);
        $this->db->where('record_date <=', $_post['recent_date']);
        $this->db->group_by('category');
        $query = $this->db->get('records');
        $result = $query->result_array();
        foreach($result as $key => $value){
          $this->db->select('*');
          $this->db->where('user_id', $this->session->userdata('user_id'));
          $this->db->where('record_date >=', $_post['past_date']);
          $this->db->where('record_date <=', $_post['recent_date']);
          $this->db->where('category', $value['category']);
          $query = $this->db->get('records');
          $results = $query->result_array();
          $query_result[$value['category']]['subInfo'] = $results;
        }
        return $query_result;
    }else{
          $this->db->select('*');
          $this->db->where('record_date >=', $_post['past_date']);
          $this->db->where('record_date <=', $_post['recent_date']);
          $this->db->where('category', $_post['category']);
          $query = $this->db->get('records');
          $result = $query->result_array();
          foreach($result as $key => $value){
            echo $value['category'];
            $this->db->select('*');
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('record_date >=', $_post['past_date']);
            $this->db->where('record_date <=', $_post['recent_date']);
            $this->db->where('category', $value['category']);
            $query = $this->db->get('records');
            $results = $query->result_array();
            $query_result[$value['category']]['subInfo'] = $results;
          }
          return $query_result;
    }
  }

}


?>
