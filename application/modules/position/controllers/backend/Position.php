<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| website : https://1.20.167.69/ */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By cangsalak Generator 21/04/2023 14:52*/
/*| Please DO NOT modify this information*/


class Position extends Backend{

private $title = "ตำแหน่ง";


public function __construct()
{
  $config = array(
    'title' => $this->title,
   );
  parent::__construct($config);
  $this->load->model("Position_model","model");
}

function index()
{
  $this->is_allowed('position_list');
  $this->template->set_title($this->title);
  $this->template->view("index");
}

function json()
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('position_list')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $list = $this->model->get_datatables();
    $data = array();
    foreach ($list as $row) {
        $rows = array();
                $rows[] = $row->po_id;
                $rows[] = $row->po_name;
        
        $rows[] = '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="'.url("position/detail/".enc_url($row->po_id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="'.url("position/update/".enc_url($row->po_id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="'.url("position/delete/".enc_url($row->po_id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
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
  if(!is_allowed('position_filter'))
  {
    echo "access not permission";
  }else{
    $this->template->view("filter",[],false);
  }
}

function detail($id)
{
  $this->is_allowed('position_detail');
    if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title("Detail ".$this->title);
    $data = array(
          "po_num" => $row->po_num,
          "po_name" => $row->po_name,
          "po_details" => $row->po_details,
          "po_created_at" => $row->po_created_at,
          "po_update_at" => $row->po_update_at,
    );
    $this->template->view("view",$data);
  }else{
    $this->error404();
  }
}

function add()
{
  $this->is_allowed('position_add');
  $this->template->set_title(cclang("add")." ".$this->title);
  $data = array('action' => url("position/add_action"),
                  'po_num' => set_value("po_num"),
                  'po_name' => set_value("po_name"),
                  'po_details' => set_value("po_details"),
                  'po_created_at' => set_value("po_created_at"),
                  );
  $this->template->view("add",$data);
}

function add_action()
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('position_add')) {
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

function update($id)
{
  $this->is_allowed('position_update');
  if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title(cclang("update")." ".$this->title);
    $data = array('action' => url("position/update_action/$id"),
                  'po_num' => set_value("po_num", $row->po_num),
                  'po_name' => set_value("po_name", $row->po_name),
                  'po_details' => set_value("po_details", $row->po_details),
                  'po_update_at' => set_value("po_update_at", $row->po_update_at),
                  );
    $this->template->view("update",$data);
  }else {
    $this->error404();
  }
}

function update_action($id)
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('position_update')) {
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

      $save = $this->model->change(dec_url($id), $save_data);

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
}

function delete($id)
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('position_delete')) {
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

/* End of file Position.php */
/* Location: ./application/modules/position/controllers/backend/Position.php */
