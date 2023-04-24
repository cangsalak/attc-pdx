<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| website : https://1.20.167.69/ */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By cangsalak Generator 24/04/2023 10:13*/
/*| Please DO NOT modify this information*/


class Districts extends Backend{

private $title = "ตำบล";


public function __construct()
{
  $config = array(
    'title' => $this->title,
   );
  parent::__construct($config);
  $this->load->model("Districts_model","model");
}

function index()
{
  $this->is_allowed('districts_list');
  $this->template->set_title($this->title);
  $this->template->view("index");
}

function json()
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('districts_list')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $list = $this->model->get_datatables();
    $data = array();
    foreach ($list as $row) {
        $rows = array();
                $rows[] = $row->id;
                $rows[] = $row->zip_code;
                $rows[] = $row->name_th;
                $rows[] = $row->name_en;
                $rows[] = $row->name_th;
        
        $rows[] = '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="'.url("districts/detail/".enc_url($row->id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="'.url("districts/update/".enc_url($row->id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="'.url("districts/delete/".enc_url($row->id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
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
  if(!is_allowed('districts_filter'))
  {
    echo "access not permission";
  }else{
    $this->template->view("filter",[],false);
  }
}

function detail($id)
{
  $this->is_allowed('districts_detail');
    if ($row = $this->model->get_detail(dec_url($id))) {
    $this->template->set_title("Detail ".$this->title);
    $data = array(
          "zip_code" => $row->zip_code,
          "name_th" => $row->name_th,
          "name_en" => $row->name_en,
          "amphure_id" => $row->name_th,
    );
    $this->template->view("view",$data);
  }else{
    $this->error404();
  }
}

function add()
{
  $this->is_allowed('districts_add');
  $this->template->set_title(cclang("add")." ".$this->title);
  $data = array('action' => url("districts/add_action"),
                  'zip_code' => set_value("zip_code"),
                  'name_th' => set_value("name_th"),
                  'name_en' => set_value("name_en"),
                  'amphure_id' => set_value("amphure_id"),
                  );
  $this->template->view("add",$data);
}

function add_action()
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('districts_add')) {
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

function update($id)
{
  $this->is_allowed('districts_update');
  if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title(cclang("update")." ".$this->title);
    $data = array('action' => url("districts/update_action/$id"),
                  'zip_code' => set_value("zip_code", $row->zip_code),
                  'name_th' => set_value("name_th", $row->name_th),
                  'name_en' => set_value("name_en", $row->name_en),
                  'amphure_id' => set_value("amphure_id", $row->amphure_id),
                  );
    $this->template->view("update",$data);
  }else {
    $this->error404();
  }
}

function update_action($id)
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('districts_update')) {
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

      $save = $this->model->change(dec_url($id), $save_data);

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
}

function delete($id)
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('districts_delete')) {
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

/* End of file Districts.php */
/* Location: ./application/modules/districts/controllers/backend/Districts.php */
