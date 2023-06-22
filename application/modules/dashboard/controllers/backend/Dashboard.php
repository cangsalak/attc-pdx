<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* dev : mpampam*/
/* fb : https://facebook.com/mpampam*/
/* fanspage : https://web.facebook.com/programmerjalanan*/
/* web : www.mpampam.com*/
/* Generate By M-CRUD Generator 10/11/2020 14:51*/
/* Please DO NOT modify this information */


class Dashboard extends Backend{

  private $title = "Dashboard";

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Core_model","model");
  }

  function index()
  {
      $this->template->set_title("Dashboard");
      $this->template->view("index");
  }

  function test()
  {
    $get_controller = $this->userize->combo_controllerlist();
    echo json_encode($get_controller);
  }

  function folderSize ($dir = null)
  {
    $dir = "./_temp/uploads/img/";
      $size = 0;

      foreach (glob(rtrim($dir, '/').'/*', GLOB_NOSORT) as $each) {
          $size += is_file($each) ? filesize($each) : folderSize($each);
      }

      echo $size. "Kb";
  }

  function about()
  {
    $this->template->view("about",[],false);
  }

  function update()
  {
    $this->template->view("update",array(),false);
  }


  function update_action()
  {
    if ($this->input->is_ajax_request()) {
          $json = array('success'=>false, 'alert'=>array());
          $this->form_validation->set_rules("army_id","เลขประจำตัวทหาร","trim|xss_clean|required");
          $this->form_validation->set_error_delimiters('<span class="error text-danger" style="font-size:11px">','</span>');
          if ($this->form_validation->run()) {
            $update = array(
              'army_id' => $this->input->post('army_id'),
              'modified' => date("Y-m-d H:i")
            );

            $this->model->get_update("auth_user", $update, ["id_user" => sess("id_user")]);

            $json['alert'] = "คุณได้ทำการเพิ่มเลขประจำตัวทหารเรียบร้อย";
            $json['success'] =  true;
            
            
          }else {
            foreach ($_POST as $key => $value)
              {
                $json['alert'][$key] = form_error($key);
              }
          }
          return $this->response($json);
      }
  }

}