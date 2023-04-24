<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /*| --------------------------------------------------------------------------*/
  /*| dev : cangsalak  */
  /*| version : V.0.0.3 */
  /*| facebook : https://www.facebook.com/maxcangsalak */
  /*| fanspage : https://www.facebook.com/KanticharCangsalak */
  /*| website : https://1.20.167.69/ */
  /*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
  /*| --------------------------------------------------------------------------*/
  /*| Generate By m-code thailand สร้างเมื่อ 20/04/2023 16:03*/
  /*| Please DO NOT modify this information*/

require(APPPATH.'/libraries/REST_Controller.php');

    class Rank extends REST_Controller{

    private $title = "ยศ";


    public function __construct()
    {
      $config = array(
        'title' => $this->title,
      );
      parent::__construct($config);
      $this->load->model("Rank_model","model");
    }

    function rank_get()
    {
      $this->is_allowed('rank_list');
      $r = $this->model->get_datatables();
      $this->response($r); 
    }

    function rank_put()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('rank_put')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("r_sname","* คำย่อ","trim|xss_clean");
                    $this->form_validation->set_rules("r_fname","* คำเต็ม","trim|xss_clean");
                $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['r_sname'] = $this->input->post('r_sname',true);
                      $save_data['r_fname'] = $this->input->post('r_fname',true);
        
          $save = $this->model->change(dec_url($this->uri->segment(3)), $save_data);

          set_message("success",cclang("notif_update"));

          $json['redirect'] = url("rank");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
    }

    function rank_post()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('rank_post')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("r_sname","* คำย่อ","trim|xss_clean");
                    $this->form_validation->set_rules("r_fname","* คำเต็ม","trim|xss_clean");
                $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['r_sname'] = $this->input->post('r_sname',true);
                      $save_data['r_fname'] = $this->input->post('r_fname',true);
        
          $this->model->insert($save_data);

          set_message("success",cclang("notif_save"));
          $json['redirect'] = url("rank");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
      }
    }

    function rank_delete()
    {
      if ($this->input->is_ajax_request()) {
        if (!is_allowed('rank_delete')) {
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

/* End of file Rank.php */
/* Location: ./application/modules/rank/controllers/api/Rank.php */
