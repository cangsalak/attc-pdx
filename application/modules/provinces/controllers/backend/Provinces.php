<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| website : https://1.20.167.69/ */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By cangsalak Generator 24/04/2023 11:10*/
/*| Please DO NOT modify this information*/


class Provinces extends Backend{

private $title = "จังหวัด";


public function __construct()
{
  $config = array(
    'title' => $this->title,
   );
  parent::__construct($config);
  $this->load->model("Provinces_model","model");
}

function index()
{
  $this->is_allowed('provinces_list');
  $this->template->set_title($this->title);
  $this->template->view("index");
}

function json()
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('provinces_list')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $list = $this->model->get_datatables();
    $data = array();
    foreach ($list as $row) {
        $rows = array();
                $rows[] = $row->id;
                $rows[] = $row->code;
                $rows[] = $row->name_th_p;
                $rows[] = $row->name_en_p;
                $rows[] = $row->name;
        
        $rows[] = '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="'.url("provinces/detail/".enc_url($row->id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="'.url("provinces/update/".enc_url($row->id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="'.url("provinces/delete/".enc_url($row->id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
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
  if(!is_allowed('provinces_filter'))
  {
    echo "access not permission";
  }else{
    $this->template->view("filter",[],false);
  }
}

function detail($id)
{
  $this->is_allowed('provinces_detail');
    if ($row = $this->model->get_detail(dec_url($id))) {
    $this->template->set_title("Detail ".$this->title);
    $data = array(
          "code" => $row->code,
          "name_th_p" => $row->name_th_p,
          "name_en_p" => $row->name_en_p,
          "geography_id" => $row->name,
    );
    $this->template->view("view",$data);
  }else{
    $this->error404();
  }
}

function add()
{
  $this->is_allowed('provinces_add');
  $this->template->set_title(cclang("add")." ".$this->title);
  $data = array('action' => url("provinces/add_action"),
                  'code' => set_value("code"),
                  'name_th_p' => set_value("name_th_p"),
                  'name_en_p' => set_value("name_en_p"),
                  'geography_id' => set_value("geography_id"),
                  );
  $this->template->view("add",$data);
}

function add_action()
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('provinces_add')) {
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

function update($id)
{
  $this->is_allowed('provinces_update');
  if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title(cclang("update")." ".$this->title);
    $data = array('action' => url("provinces/update_action/$id"),
                  'code' => set_value("code", $row->code),
                  'name_th_p' => set_value("name_th_p", $row->name_th_p),
                  'name_en_p' => set_value("name_en_p", $row->name_en_p),
                  'geography_id' => set_value("geography_id", $row->geography_id),
                  );
    $this->template->view("update",$data);
  }else {
    $this->error404();
  }
}

function update_action($id)
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('provinces_update')) {
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

      $save = $this->model->change(dec_url($id), $save_data);

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
}

function delete($id)
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('provinces_delete')) {
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

/* End of file Provinces.php */
/* Location: ./application/modules/provinces/controllers/backend/Provinces.php */
