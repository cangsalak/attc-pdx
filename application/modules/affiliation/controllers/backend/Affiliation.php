<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| website : https://1.20.167.69/ */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By cangsalak Generator 20/04/2023 16:11*/
/*| Please DO NOT modify this information*/


class Affiliation extends Backend{

private $title = "สังกัด";


public function __construct()
{
  $config = array(
    'title' => $this->title,
   );
  parent::__construct($config);
  $this->load->model("Affiliation_model","model");
}

function index()
{
  $this->is_allowed('affiliation_list');
  $this->template->set_title($this->title);
  $this->template->view("index");
}

function json()
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('affiliation_list')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $list = $this->model->get_datatables();
    $data = array();
    foreach ($list as $row) {
        $rows = array();
                $rows[] = $row->af_id;
                $rows[] = $row->af_fname;
                $rows[] = $row->af_address;
                $rows[] = $row->af_web;
        
        $rows[] = '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="'.url("affiliation/detail/".enc_url($row->af_id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="'.url("affiliation/update/".enc_url($row->af_id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="'.url("affiliation/delete/".enc_url($row->af_id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
                        <i class="ti-trash"></i>
                      </a>
                    </div>
                 ';

        $data[] = $rows;
    }

    $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $this->model->count_all(),
                    "recordsFiltered" => $this->model->count_filtered(),
                    "data" => $data,
            );
    //output to json format
    return $this->response($output);
  }
}

function filter()
{
  if(!is_allowed('affiliation_filter'))
  {
    echo "access not permission";
  }else{
    $this->template->view("filter",[],false);
  }
}

function detail($id)
{
  $this->is_allowed('affiliation_detail');
    if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title("Detail ".$this->title);
    $data = array(
          "af_sname" => $row->af_sname,
          "af_fname" => $row->af_fname,
          "af_address" => $row->af_address,
          "af_web" => $row->af_web,
          "af_social" => $row->af_social,
          "af_tel" => $row->af_tel,
          "af_created_at" => $row->af_created_at,
          "af_update_at" => $row->af_update_at,
    );
    $this->template->view("view",$data);
  }else{
    $this->error404();
  }
}

function add()
{
  $this->is_allowed('affiliation_add');
  $this->template->set_title(cclang("add")." ".$this->title);
  $data = array('action' => url("affiliation/add_action"),
                  'af_sname' => set_value("af_sname"),
                  'af_fname' => set_value("af_fname"),
                  'af_address' => set_value("af_address"),
                  'af_web' => set_value("af_web"),
                  'af_social' => set_value("af_social"),
                  'af_tel' => set_value("af_tel"),
                  'af_created_at' => set_value("af_created_at"),
                  );
  $this->template->view("add",$data);
}

function add_action()
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('affiliation_add')) {
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

function update($id)
{
  $this->is_allowed('affiliation_update');
  if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title(cclang("update")." ".$this->title);
    $data = array('action' => url("affiliation/update_action/$id"),
                  'af_sname' => set_value("af_sname", $row->af_sname),
                  'af_fname' => set_value("af_fname", $row->af_fname),
                  'af_address' => set_value("af_address", $row->af_address),
                  'af_web' => set_value("af_web", $row->af_web),
                  'af_social' => set_value("af_social", $row->af_social),
                  'af_tel' => set_value("af_tel", $row->af_tel),
                  'af_update_at' => set_value("af_update_at", $row->af_update_at),
                  );
    $this->template->view("update",$data);
  }else {
    $this->error404();
  }
}

function update_action($id)
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('affiliation_update')) {
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

      $save = $this->model->change(dec_url($id), $save_data);

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
}

function delete($id)
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('affiliation_delete')) {
      return $this->response([
        'type_msg' => "error",
        'msg' => "do not have permission to access"
      ]);
    }

      $this->model->remove(dec_url($id));
      $json['type_msg'] = "success";
      $json['msg'] = cclang("notif_delete");


    return $this->response($json);
  }
}


}

/* End of file Affiliation.php */
/* Location: ./application/modules/affiliation/controllers/backend/Affiliation.php */
