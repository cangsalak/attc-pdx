<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /*| --------------------------------------------------------------------------*/
  /*| dev : cangsalak  */
  /*| version : V.0.0.3 */
  /*| facebook : https://www.facebook.com/maxcangsalak */
  /*| fanspage : https://www.facebook.com/KanticharCangsalak */
  /*| website : https://1.20.167.69/ */
  /*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
  /*| --------------------------------------------------------------------------*/
  /*| Generate By m-code thailand สร้างเมื่อ 24/04/2023 11:04*/
  /*| Please DO NOT modify this information*/

require(APPPATH.'/libraries/REST_Controller.php');

    class Amphures extends REST_Controller{

    private $title = "อำเภอ";


    public function __construct()
    {
      $config = array(
        'title' => $this->title,
      );
      parent::__construct($config);
      $this->load->model("Amphures_model","model");
    }

    function amphures_get()
    {
      $this->is_allowed('amphures_list');
      $r = $this->model->get_datatables();
      $this->response($r); 
    }

    function amphures_put()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('amphures_put')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("code","* Code","trim|xss_clean");
                    $this->form_validation->set_rules("name_th_A","* ชื่อภาษาไทย","trim|xss_clean");
                    $this->form_validation->set_rules("name_en_A","* ชื่อภาษาอังกฤษ","trim|xss_clean");
                    $this->form_validation->set_rules("province_id","* จังหวัด","trim|xss_clean");
                $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['code'] = $this->input->post('code',true);
                      $save_data['name_th_A'] = $this->input->post('name_th_A',true);
                      $save_data['name_en_A'] = $this->input->post('name_en_A',true);
                      $save_data['province_id'] = $this->input->post('province_id',true);
        
          $save = $this->model->change(dec_url($this->uri->segment(3)), $save_data);

          set_message("success",cclang("notif_update"));

          $json['redirect'] = url("amphures");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
    }

    function amphures_post()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('amphures_post')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("code","* Code","trim|xss_clean");
                    $this->form_validation->set_rules("name_th_A","* ชื่อภาษาไทย","trim|xss_clean");
                    $this->form_validation->set_rules("name_en_A","* ชื่อภาษาอังกฤษ","trim|xss_clean");
                    $this->form_validation->set_rules("province_id","* จังหวัด","trim|xss_clean");
                $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['code'] = $this->input->post('code',true);
                      $save_data['name_th_A'] = $this->input->post('name_th_A',true);
                      $save_data['name_en_A'] = $this->input->post('name_en_A',true);
                      $save_data['province_id'] = $this->input->post('province_id',true);
        
          $this->model->insert($save_data);

          set_message("success",cclang("notif_save"));
          $json['redirect'] = url("amphures");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
      }
    }

    function amphures_delete()
    {
      if ($this->input->is_ajax_request()) {
        if (!is_allowed('amphures_delete')) {
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

/* End of file Amphures.php */
/* Location: ./application/modules/amphures/controllers/api/Amphures.php */
