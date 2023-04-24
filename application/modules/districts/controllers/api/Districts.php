<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /*| --------------------------------------------------------------------------*/
  /*| dev : cangsalak  */
  /*| version : V.0.0.3 */
  /*| facebook : https://www.facebook.com/maxcangsalak */
  /*| fanspage : https://www.facebook.com/KanticharCangsalak */
  /*| website : https://1.20.167.69/ */
  /*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
  /*| --------------------------------------------------------------------------*/
  /*| Generate By m-code thailand สร้างเมื่อ 24/04/2023 10:13*/
  /*| Please DO NOT modify this information*/

require(APPPATH.'/libraries/REST_Controller.php');

    class Districts extends REST_Controller{

    private $title = "ตำบล";


    public function __construct()
    {
      $config = array(
        'title' => $this->title,
      );
      parent::__construct($config);
      $this->load->model("Districts_model","model");
    }

    function districts_get()
    {
      $this->is_allowed('districts_list');
      $r = $this->model->get_datatables();
      $this->response($r); 
    }

    function districts_put()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('districts_put')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("zip_code","* รหัสไปรษณีย์","trim|xss_clean");
                    $this->form_validation->set_rules("name_th","* ชื่อภาษาไทย","trim|xss_clean");
                    $this->form_validation->set_rules("name_en","* ชื่อภาษาอังกฤษ","trim|xss_clean");
                    $this->form_validation->set_rules("amphure_id","* อำเภอ","trim|xss_clean");
                $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['zip_code'] = $this->input->post('zip_code',true);
                      $save_data['name_th'] = $this->input->post('name_th',true);
                      $save_data['name_en'] = $this->input->post('name_en',true);
                      $save_data['amphure_id'] = $this->input->post('amphure_id',true);
        
          $save = $this->model->change(dec_url($this->uri->segment(3)), $save_data);

          set_message("success",cclang("notif_update"));

          $json['redirect'] = url("districts");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
    }

    function districts_post()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('districts_post')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("zip_code","* รหัสไปรษณีย์","trim|xss_clean");
                    $this->form_validation->set_rules("name_th","* ชื่อภาษาไทย","trim|xss_clean");
                    $this->form_validation->set_rules("name_en","* ชื่อภาษาอังกฤษ","trim|xss_clean");
                    $this->form_validation->set_rules("amphure_id","* อำเภอ","trim|xss_clean");
                $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['zip_code'] = $this->input->post('zip_code',true);
                      $save_data['name_th'] = $this->input->post('name_th',true);
                      $save_data['name_en'] = $this->input->post('name_en',true);
                      $save_data['amphure_id'] = $this->input->post('amphure_id',true);
        
          $this->model->insert($save_data);

          set_message("success",cclang("notif_save"));
          $json['redirect'] = url("districts");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
      }
    }

    function districts_delete()
    {
      if ($this->input->is_ajax_request()) {
        if (!is_allowed('districts_delete')) {
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

/* End of file Districts.php */
/* Location: ./application/modules/districts/controllers/api/Districts.php */
