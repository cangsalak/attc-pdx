<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /*| --------------------------------------------------------------------------*/
  /*| dev : cangsalak  */
  /*| version : V.0.0.3 */
  /*| facebook : https://www.facebook.com/maxcangsalak */
  /*| fanspage : https://www.facebook.com/KanticharCangsalak */
  /*| website : https://1.20.167.69/ */
  /*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
  /*| --------------------------------------------------------------------------*/
  /*| Generate By m-code thailand สร้างเมื่อ 24/04/2023 11:10*/
  /*| Please DO NOT modify this information*/

require(APPPATH.'/libraries/REST_Controller.php');

    class Provinces extends REST_Controller{

    private $title = "จังหวัด";


    public function __construct()
    {
      $config = array(
        'title' => $this->title,
      );
      parent::__construct($config);
      $this->load->model("Provinces_model","model");
    }

    function provinces_get()
    {
      $this->is_allowed('provinces_list');
      $r = $this->model->get_datatables();
      $this->response($r); 
    }

    function provinces_put()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('provinces_put')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("code","* Code","trim|xss_clean");
                    $this->form_validation->set_rules("name_th_p","* ชื่อภาษาไทย","trim|xss_clean");
                    $this->form_validation->set_rules("name_en_p","* ชื่อภาษาอังกฤษ","trim|xss_clean");
                    $this->form_validation->set_rules("geography_id","* ภูมิภาค","trim|xss_clean");
                $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['code'] = $this->input->post('code',true);
                      $save_data['name_th_p'] = $this->input->post('name_th_p',true);
                      $save_data['name_en_p'] = $this->input->post('name_en_p',true);
                      $save_data['geography_id'] = $this->input->post('geography_id',true);
        
          $save = $this->model->change(dec_url($this->uri->segment(3)), $save_data);

          set_message("success",cclang("notif_update"));

          $json['redirect'] = url("provinces");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
    }

    function provinces_post()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('provinces_post')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("code","* Code","trim|xss_clean");
                    $this->form_validation->set_rules("name_th_p","* ชื่อภาษาไทย","trim|xss_clean");
                    $this->form_validation->set_rules("name_en_p","* ชื่อภาษาอังกฤษ","trim|xss_clean");
                    $this->form_validation->set_rules("geography_id","* ภูมิภาค","trim|xss_clean");
                $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['code'] = $this->input->post('code',true);
                      $save_data['name_th_p'] = $this->input->post('name_th_p',true);
                      $save_data['name_en_p'] = $this->input->post('name_en_p',true);
                      $save_data['geography_id'] = $this->input->post('geography_id',true);
        
          $this->model->insert($save_data);

          set_message("success",cclang("notif_save"));
          $json['redirect'] = url("provinces");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
      }
    }

    function provinces_delete()
    {
      if ($this->input->is_ajax_request()) {
        if (!is_allowed('provinces_delete')) {
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

/* End of file Provinces.php */
/* Location: ./application/modules/provinces/controllers/api/Provinces.php */
