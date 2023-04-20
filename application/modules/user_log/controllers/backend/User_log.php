<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| website : https://1.20.167.69/ */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By cangsalak Generator 20/04/2023 11:24*/
/*| Please DO NOT modify this information*/


class User_log extends Backend{

private $title = "User Log";


public function __construct()
{
  $config = array(
    'title' => $this->title,
   );
  parent::__construct($config);
  $this->load->model("User_log_model","model");
}

function index()
{
  $this->is_allowed('user_log_list');
  $this->template->set_title($this->title);
  $this->template->view("index");
}

function json()
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('user_log_list')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $list = $this->model->get_datatables();
    $data = array();
    foreach ($list as $row) {
        $rows = array();
                $rows[] = $row->id;
                $rows[] = $row->name;
                $rows[] = $row->ip_address;
                $rows[] = $row->controller;
        
        $rows[] = '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="'.url("user_log/detail/".enc_url($row->id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="'.url("user_log/delete/".enc_url($row->id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
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
  if(!is_allowed('user_log_filter'))
  {
    echo "access not permission";
  }else{
    $this->template->view("filter",[],false);
  }
}

function detail($id)
{
  $this->is_allowed('user_log_detail');
    if ($row = $this->model->get_detail(dec_url($id))) {
    $this->template->set_title("Detail ".$this->title);
    $data = array(
          "user" => $row->name,
          "ip_address" => $row->ip_address,
          "controller" => $row->controller,
          "url" => $row->url,
          "data" => $row->data,
          "created_at" => $row->created_at,
    );
    $this->template->view("view",$data);
  }else{
    $this->error404();
  }
}



function delete($id)
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('user_log_delete')) {
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

/* End of file User_log.php */
/* Location: ./application/modules/user_log/controllers/backend/User_log.php */
