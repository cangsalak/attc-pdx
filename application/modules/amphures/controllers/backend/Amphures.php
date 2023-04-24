<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| website : https://1.20.167.69/ */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By cangsalak Generator 24/04/2023 11:04*/
/*| Please DO NOT modify this information*/


class Amphures extends Backend{

private $title = "อำเภอ";


public function __construct()
{
  $config = array(
    'title' => $this->title,
   );
  parent::__construct($config);
  $this->load->model("Amphures_model","model");
}

function index()
{
  $this->is_allowed('amphures_list');
  $this->template->set_title($this->title);
  $this->template->view("index");
}

function json()
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('amphures_list')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $list = $this->model->get_datatables();
    $data = array();
    foreach ($list as $row) {
        $rows = array();
                $rows[] = $row->id;
                $rows[] = $row->name_th_d;
                $rows[] = $row->name_th_A;
                $rows[] = $row->name_en_A;
                $rows[] = $row->name_th_p;
        
        $rows[] = '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="'.url("amphures/detail/".enc_url($row->id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="'.url("amphures/update/".enc_url($row->id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="'.url("amphures/delete/".enc_url($row->id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
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
  if(!is_allowed('amphures_filter'))
  {
    echo "access not permission";
  }else{
    $this->template->view("filter",[],false);
  }
}

function detail($id)
{
  $this->is_allowed('amphures_detail');
    if ($row = $this->model->get_detail(dec_url($id))) {
    $this->template->set_title("Detail ".$this->title);
    $data = array(
          "code" => $row->name_th_d,
          "name_th_A" => $row->name_th_A,
          "name_en_A" => $row->name_en_A,
          "province_id" => $row->name_th_p,
    );
    $this->template->view("view",$data);
  }else{
    $this->error404();
  }
}

function add()
{
  $this->is_allowed('amphures_add');
  $this->template->set_title(cclang("add")." ".$this->title);
  $data = array('action' => url("amphures/add_action"),
                  'code' => set_value("code"),
                  'name_th_A' => set_value("name_th_A"),
                  'name_en_A' => set_value("name_en_A"),
                  'province_id' => set_value("province_id"),
                  );
  $this->template->view("add",$data);
}

function add_action()
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('amphures_add')) {
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

function update($id)
{
  $this->is_allowed('amphures_update');
  if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title(cclang("update")." ".$this->title);
    $data = array('action' => url("amphures/update_action/$id"),
                  'code' => set_value("code", $row->code),
                  'name_th_A' => set_value("name_th_A", $row->name_th_A),
                  'name_en_A' => set_value("name_en_A", $row->name_en_A),
                  'province_id' => set_value("province_id", $row->province_id),
                  );
    $this->template->view("update",$data);
  }else {
    $this->error404();
  }
}

function update_action($id)
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('amphures_update')) {
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

      $save = $this->model->change(dec_url($id), $save_data);

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
}

function delete($id)
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('amphures_delete')) {
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

/* End of file Amphures.php */
/* Location: ./application/modules/amphures/controllers/backend/Amphures.php */
