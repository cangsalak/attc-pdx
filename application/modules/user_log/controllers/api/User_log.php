<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /*| --------------------------------------------------------------------------*/
  /*| dev : cangsalak  */
  /*| version : V.0.0.3 */
  /*| facebook : https://www.facebook.com/maxcangsalak */
  /*| fanspage : https://www.facebook.com/KanticharCangsalak */
  /*| website : https://1.20.167.69/ */
  /*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
  /*| --------------------------------------------------------------------------*/
  /*| Generate By m-code thailand สร้างเมื่อ 20/04/2023 11:24*/
  /*| Please DO NOT modify this information*/

require(APPPATH.'/libraries/REST_Controller.php');

    class User_log extends REST_Controller{

    private $title = "User Log";


    public function __construct()
    {
      $config = array(
        'title' => $this->title,
      );
      parent::__construct($config);
      $this->load->model("User_log_model","model");
    }

    function user_log_get()
    {
      $this->is_allowed('user_log_list');
      $r = $this->model->get_datatables();
      $this->response($r); 
    }

    function user_log_put()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('user_log_put')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
            $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
    
          $save = $this->model->change(dec_url($this->uri->segment(3)), $save_data);

          set_message("success",cclang("notif_update"));

          $json['redirect'] = url("user_log");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
    }

    function user_log_post()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('user_log_post')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
            $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
    
          $this->model->insert($save_data);

          set_message("success",cclang("notif_save"));
          $json['redirect'] = url("user_log");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
      }
    }

    function user_log_delete()
    {
      if ($this->input->is_ajax_request()) {
        if (!is_allowed('user_log_delete')) {
          return $this->response([
            'type_msg' => "error",
            'msg' => "do not have permission to access"
          ]);
        }

          $this->model->remove(dec_url($this->uri->segment(3)));
          $json['type_msg'] = "success";
          $json['msg'] = cclang("notif_delete");


        return $this->response($json);
      }
    }

  }
}

/* End of file User_log.php */
/* Location: ./application/modules/user_log/controllers/api/User_log.php */
