<?php
class Users_model extends CI_Model {

  public function __construct(){
    $this->load->database();
  }
  public function check_user(){
    $logn = $this->input->post('login_name');
    $pasw = $this->input->post('password');
    $pasw = hash('ripemd160', $pasw);
    $query = $this->db->query("SELECT * FROM users WHERE login_name='$logn' AND password='$pasw'");
    if($query->num_rows() == 1){
      foreach ($query->result() as $row){
        $this->session->set_userdata('email', $row->login_name);
        $lfname = explode(" ",$row->full_name);
        $this->session->set_userdata('fname', $lfname[0]);
        $this->session->set_userdata('lname', $lfname[1]);
      }
      $this->session->set_userdata('logged', 'y');
      redirect('users/logout', 'refresh');
    }
    else{
      echo('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Neprisijungete</div>');
      $this->load->view('users/index');
    }
  }

  public function redirect(){
    if($this->session->userdata('logged')=='y') {
      return TRUE;
    }
    else{
      return FALSE;
    }
  }

  public function register(){
    $fname = $this->input->post('fname');
    $lname = $this->input->post('lname');
    $full_name = $fname.' '.$lname;
    $logn = $this->input->post('login_name');
    $pasw = $this->input->post('password1');
    $pasw = hash('ripemd160', $pasw);
    $data = array(
        'full_name' => $full_name,
        'login_name' => $logn,
        'password' => $pasw
      );
    $this->db->insert('users', $data);
    redirect('users/index', 'refresh');
  }

  public function change(){
    $data = array();
    $fname = $this->input->post('fname');
    $lname = $this->input->post('lname');
    $email = $this->input->post('email');
    $pasw = $this->input->post('pword');

    if(!$fname=="" && $fname!=$this->session->userdata('fname') || !$lname=="" && $lname!=$this->session->userdata('lname')){
      if($fname==""){
        $fname = $this->session->userdata('fname');
      }
      if($lname==""){
        $lname = $this->session->userdata('lname');
      }
      $full_name = $fname.' '.$lname;
      $data["full_name"] = $full_name;
      $lfname = explode(" ",$full_name);
      $this->session->set_userdata('fname', $lfname[0]);
      $this->session->set_userdata('lname', $lfname[1]);
    }
    if(!$email=="" && $email!=$this->session->userdata('email')){
      $data["login_name"] = $email;
    }
    if(!$pasw==""){
      $pasw = hash('ripemd160', $pasw);
      $data["password"] = $pasw;
    }
    if (empty($data)){
     redirect('users/profile', 'refresh');
    }
    else{
      if(!array_key_exists("login_name", $data)){
        $this->db->where('login_name', $this->session->userdata('email'));
        $this->db->update('users', $data);
        redirect('users/profile', 'refresh');
      }
      else{
        $query = $this->db->query("SELECT * FROM users WHERE login_name='$email'");
        if($query->num_rows() == 0){
          $this->db->where('login_name', $this->session->userdata('email'));
          $this->db->update('users', $data);
          $this->session->set_userdata('email', $email);
          redirect('users/profile', 'refresh');
        }
        else{
          echo"erroriukas";
        }
      }
    }
  }
}
