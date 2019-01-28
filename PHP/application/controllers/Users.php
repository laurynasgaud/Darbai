<?php
class Users extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('users_model');
    $this->load->helper('url_helper');
    if($this->session->userdata('site_lang')=='en') {
      $this->lang->load('form', 'english');
    }
    elseif($this->session->userdata('site_lang')=='lt'){
      $this->lang->load('form', 'lithuanian');
    }
    else{
      $this->lang->load('form', 'english');
    }

    $this->load->view('users/header');
  }

  public function switchlang($language){
    $this->session->set_userdata('site_lang', $language);
    redirect('users/index', 'refresh');
  }

  public function index(){
    if($this->users_model->redirect()){
      redirect('/users/logout', 'refresh');
    }
    else{
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      $this->form_validation->set_rules('login_name', lang('login_name'), 'trim|required|min_length[5]');
      $this->form_validation->set_rules('password', lang('password'), 'trim|required|min_length[5]');

      if ($this->form_validation->run() === FALSE){
        $this->load->view('users/login_top');
        $this->load->view('users/index');
      }
      else{
        $this->users_model->check_user();
      }
    }
  }

  public function logout(){
    if(!$this->users_model->redirect()){
      redirect('/users/index', 'refresh');
    }
    else{
      $this->load->view('users/top');
      $this->load->view('users/logout');
    }
  }

  public function end(){
    $this->session->sess_destroy();
    redirect('/users/index', 'refresh');
  }

  public function register(){
    if($this->users_model->redirect()){
      redirect('/users/logout', 'refresh');
    }
    else{
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      $this->form_validation->set_rules('login_name', 'lang:login_name', 'trim|required|min_length[5]|callback_check_email');
      $this->form_validation->set_rules('password1', 'lang:password', 'trim|required|min_length[5]');
      $this->form_validation->set_rules('password2', 'lang:password', 'trim|required|min_length[5]|matches[password1]');
      $this->form_validation->set_rules('fname', 'lang:fname', 'trim|required|min_length[3]');
      $this->form_validation->set_rules('lname', 'lang:lname', 'trim|required|min_length[3]');

      if ($this->form_validation->run() === FALSE){
        $this->load->view('users/register');
      }
      else{
        $this->users_model->register();
      }
    }
  }

  public function check_email($str){
    $this->load->database();
    $query = $this->db->query("SELECT * FROM users WHERE login_name='$str'");
    if($query->num_rows() == 1){
      $this->form_validation->set_message('check_email', lang('email_exists'));
      return FALSE;
    }
    else{
      return TRUE;
    }
  }

  public function profile(){
    if(!$this->users_model->redirect()){
      redirect('/users/index', 'refresh');
    }
    else{
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_error_delimiters('<div class="alert alert-warning alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      $this->form_validation->set_rules('pword', 'lang:password', 'trim');
      $this->form_validation->set_rules('fname', 'lang:fname', 'trim');
      $this->form_validation->set_rules('lname', 'lang:lname', 'trim');
      $this->form_validation->set_rules('email', 'lang:email', 'trim');

      if ($this->form_validation->run() === FALSE){
        $this->load->view('users/top');
        $this->load->view('users/profile');
      }
      else{
        $this->users_model->change();
      }
    }
  }
}
