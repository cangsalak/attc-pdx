<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /*| --------------------------------------------------------------------------*/
  /*| dev : cangsalak  */
  /*| version : V.0.0.3 */
  /*| facebook : https://www.facebook.com/maxcangsalak */
  /*| fanspage : https://www.facebook.com/KanticharCangsalak */
  /*| website : https://1.20.167.69/ */
  /*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
  /*| --------------------------------------------------------------------------*/
  /*| Generate By m-code thailand สร้างเมื่อ 20/04/2023 16:11*/
  /*| Please DO NOT modify this information*/

require(APPPATH.'/libraries/REST_Controller.php');

    class Affiliation extends REST_Controller{

    private $title = "สังกัด";


    public function __construct()
    {
      $config = array(
        'title' => $this->title,
      );
      parent::__construct($config);
      $this->load->model("Affiliation_model","model");
    }

    function affiliation_get()
    {
      $this->is_allowed('affiliation_list');
      $r = $this->model->get_datatables();
      $this->response($r); 
    }

    function affiliation_put()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('affiliation_put')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("af_sname","* ์คำย่อ","trim|xss_clean");
                    $this->form_validation->set_rules("af_fname","* คำเต็ม","trim|xss_clean");
                    $this->form_validation->set_rules("af_address","* ที่อยู่","trim|xss_clean");
                    $this->form_validation->set_rules("af_web","* เว็บไซต์","trim|xss_clean");
                    $this->form_validation->set_rules("af_social","* social","trim|xss_clean");
                    $this->form_validation->set_rules("af_tel","* tel","trim|xss_clean");
                        $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['af_sname'] = $this->input->post('af_sname',true);
                      $save_data['af_fname'] = $this->input->post('af_fname',true);
                      $save_data['af_address'] = $this->input->post('af_address',true);
                      $save_data['af_web'] = $this->input->post('af_web',true);
                      $save_data['af_social'] = $this->input->post('af_social',true);
                      $save_data['af_tel'] = $this->input->post('af_tel',true);
                      $save_data['af_update_at'] = date("Y-m-d H:i");
        
          $save = $this->model->change(dec_url($this->uri->segment(3)), $save_data);

          set_message("success",cclang("notif_update"));

          $json['redirect'] = url("affiliation");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
    }

    function affiliation_post()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('affiliation_post')) {
          show_error("Access Permission", 403,'403::Access Not Permission');
          exit();
        }

        $json = array('success' => false);
                $this->form_validation->set_rules("af_sname","* ์คำย่อ","trim|xss_clean");
                    $this->form_validation->set_rules("af_fname","* คำเต็ม","trim|xss_clean");
                    $this->form_validation->set_rules("af_address","* ที่อยู่","trim|xss_clean");
                    $this->form_validation->set_rules("af_web","* เว็บไซต์","trim|xss_clean");
                    $this->form_validation->set_rules("af_social","* social","trim|xss_clean");
                    $this->form_validation->set_rules("af_tel","* tel","trim|xss_clean");
                        $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

        if ($this->form_validation->run()) {
                  $save_data['af_sname'] = $this->input->post('af_sname',true);
                      $save_data['af_fname'] = $this->input->post('af_fname',true);
                      $save_data['af_address'] = $this->input->post('af_address',true);
                      $save_data['af_web'] = $this->input->post('af_web',true);
                      $save_data['af_social'] = $this->input->post('af_social',true);
                      $save_data['af_tel'] = $this->input->post('af_tel',true);
                      $save_data['af_created_at'] = date("Y-m-d H:i");
        
          $this->model->insert($save_data);

          set_message("success",cclang("notif_save"));
          $json['redirect'] = url("affiliation");
          $json['success'] = true;
        }else {
          foreach ($_POST as $key => $value) {
            $json['alert'][$key] = form_error($key);
          }
        }

        $this->response($json);
      }
    }

    function affiliation_delete()
    {
      if ($this->input->is_ajax_request()) {
        if (!is_allowed('affiliation_delete')) {
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

/* End of file Affiliation.php */
/* Location: ./application/modules/affiliation/controllers/api/Affiliation.php */
