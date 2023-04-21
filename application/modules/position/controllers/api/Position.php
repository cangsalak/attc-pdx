<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /*| --------------------------------------------------------------------------*/
  /*| dev : cangsalak  */
  /*| version : V.0.0.3 */
  /*| facebook : https://www.facebook.com/maxcangsalak */
  /*| fanspage : https://www.facebook.com/KanticharCangsalak */
  /*| website : https://1.20.167.69/ */
  /*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
  /*| --------------------------------------------------------------------------*/
  /*| Generate By m-code thailand สร้างเมื่อ 21/04/2023 14:52*/
  /*| Please DO NOT modify this information*/

require(APPPATH.'/libraries/REST_Controller.php');

    class Position extends REST_Controller{

    private $title = "ตำแหน่ง";


    public function __construct()
    {
      $config = array(
        'title' => $this->title,
      );
      parent::__construct($config);
      $this->load->model("Position_model","model");
    }

    function position_get()
    {
      $this->is_allowed('position_list');
      $r = $this->model->get_datatables();
      $this->response($r); 
    }

    function position_put()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('position_put')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("po_num","* เลข ชกท","trim|xss_clean");
                    $this->form_validation->set_rules("po_name","* ชื่อ ชกท.","trim|xss_clean");
                    $this->form_validation->set_rules("po_details","* หน้าที่","trim|xss_clean");
                        $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['po_num'] = $this->input->post('po_num',true);
                      $save_data['po_name'] = $this->input->post('po_name',true);
                      $save_data['po_details'] = $this->input->post('po_details',true);
                      $save_data['po_update_at'] = date("Y-m-d H:i");
        
          $save = $this->model->change(dec_url($this->uri->segment(3)), $save_data);

          set_message("success",cclang("notif_update"));

          $json['redirect'] = url("position");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
    }

    function position_post()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('position_post')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("po_num","* เลข ชกท","trim|xss_clean");
                    $this->form_validation->set_rules("po_name","* ชื่อ ชกท.","trim|xss_clean");
                    $this->form_validation->set_rules("po_details","* หน้าที่","trim|xss_clean");
                        $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['po_num'] = $this->input->post('po_num',true);
                      $save_data['po_name'] = $this->input->post('po_name',true);
                      $save_data['po_details'] = $this->input->post('po_details',true);
                      $save_data['po_created_at'] = date("Y-m-d H:i");
        
          $this->model->insert($save_data);

          set_message("success",cclang("notif_save"));
          $json['redirect'] = url("position");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
      }
    }

    function position_delete()
    {
      if ($this->input->is_ajax_request()) {
        if (!is_allowed('position_delete')) {
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

/* End of file Position.php */
/* Location: ./application/modules/position/controllers/api/Position.php */
