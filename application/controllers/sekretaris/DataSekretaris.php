<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataSekretaris extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_m');
    if ($this->session->userdata('is_login') !== TRUE || $this->session->userdata('tipe') != 77) {
      $this->session->set_flashdata('failed', '<div class="alert alert-danger" role="alert">
                                       Maaf, Anda harus login!
                                       </div>');
      redirect('login');
    }
    //Do your magic here
  }

  public function index()
  {
    $id = $this->session->userdata('id_user');

    $this->load->view('backend/layouts/wrapper', [
      'content' => 'backend/sekretaris/dataSekretaris',
      'title'   => 'Data Sekretaris',
      'profile' => $this->user_m->profile($id),
      'userdata' => $id
    ], FALSE);
  }
}

/* End of file DataSekretaris.php */
