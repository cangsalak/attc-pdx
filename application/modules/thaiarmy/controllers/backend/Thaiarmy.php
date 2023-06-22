<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*| --------------------------------------------------------------------------*/
/*| dev : cangsalak  */
/*| version : V.0.0.3 */
/*| facebook : https://www.facebook.com/maxcangsalak */
/*| fanspage : https://www.facebook.com/KanticharCangsalak */
/*| website : https://1.20.167.69/ */
/*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
/*| --------------------------------------------------------------------------*/
/*| Generate By cangsalak Generator 24/04/2023 11:37*/
/*| Please DO NOT modify this information*/


class Thaiarmy extends Backend{

private $title = "กำลังพลภายในหน่วย";


public function __construct()
{
  $config = array(
    'title' => $this->title,
   );
  parent::__construct($config);
  $this->load->model("Army_model","model");
}

function index()
{
  $data['list'] = $this->model->get_datatables();
  $this->is_allowed('army_list');
  $this->template->set_title($this->title);
  $this->template->view("index",$data);
}


function personal($id)
{
  $this->is_allowed_personal('army_personal');
    if ($row = $this->model->get_detail(dec_url($id))) {
    $this->template->set_title("รายละเอียดบุคคล ".$row->a_fname);
    if($row->gender == 1){
      $gender = 'ชาย';
    }else if($row->gender == 2){
      $gender = 'หญิง';
    }else{
      $gender = 'ไม่ระบุ';
    }

    $armytype = [
      '1' => 'นายทหารสัญญาบัตร',
      '2' => 'นายทหารประทวน',
      '3' => 'พนักงานราชการ',
      '4' => 'ทหารกองประจำการ',
      '5' => 'พลฯ อาสา',
      '6' => 'ไม่ระบุ'
    ];
    foreach ($armytype as $key => $value) {
      if($row->army_type == $key){
        $army_type = $value;
      }
    }

    $blood_group = [
      'a' => 'กรุ๊ปเลือด เอ',
      'B' => 'กรุ๊ปเลือด บี',
      'o' => 'กรุ๊ปเลือด โอ',
      'ab' => 'กรุ๊ปเลือด เอ-บี'
    ];
    foreach ($blood_group as $key => $value) {
      if($row->blood_group == $key){
        $blood_group = $value;
      }
    }



    $data['type'] = $this->armytype();
    $data = array(
          "rank_r_id" => $row->r_fname,
          "army_type" => $army_type,
          "image" => $row->image,
          "a_fname" => $row->a_fname,
          "a_lname" => $row->a_lname,
          "a_nickname" => $row->a_nickname,
          "a_pid" => isValidNationalId($row->a_pid),
          "birthday" => $row->birthday,
          "a_armyid" => $row->a_armyid,
          "stationed" => $row->stationed,
          "model_year" => $row->model_year,
          "turns" => $row->turns,
          "position_po_id" => $row->po_name,
          "affiliation_af_id" => $row->af_sname,
          "educational" => $row->educational,
          "weight" => $row->weight,
          "height" => $row->height,
          "blood_group" => $blood_group,
          "gender" => $gender,
          "skin" => $row->skin,
          "shape" => $row->shape,
          "defect" => $row->defect,
          "congenital_disease" => $row->congenital_disease,
          "e_name" => $row->e_name,
          "e_surname" => $row->e_surname,
          "these" => $row->these,
          "registration_date" => $row->registration_date,
          "ethnicity" => $row->ethnicity,
          "nationality" => $row->nationality,
          "religion" => $row->religion,
          "address" => $row->address,
          "district" => $row->name_th_d,
          "districts" => $row->name_th_A,
          "province" => $row->name_th_p,
          "email" => $row->email,
          "status" => $row->status,
          "detail" => $row->detail,
          "father_name" => $row->father_name,
          "father_surname" => $row->father_surname,
          "father_age" => $row->father_age,
          "father_occupation" => $row->father_occupation,
          "father_status" => $row->father_status,
          "mother_name" => $row->mother_name,
          "mother_surname" => $row->mother_surname,
          "mother_age" => $row->mother_age,
          "mother_occupation" => $row->mother_occupation,
          "mother_status" => $row->mother_status,
          "wife_name" => $row->wife_name,
          "wife_surname" => $row->wife_surname,
          "wife_occupation" => $row->wife_occupation,
          "wife_age" => $row->wife_age,
          "a_created_at" => $row->a_created_at,
          "a_updated_at" => $row->a_updated_at,
    );
    $this->template->view("view",$data);
  }else{
    $this->error404();
  }
}


function json()
{
  if ($this->input->is_ajax_request()) {
    if (!is_allowed('army_list')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $list = $this->model->get_datatables();
    $data = array();
    foreach ($list as $row) {
        $rows = array();
                $rows[] = $row->a_id;
                $rows[] = $row->r_fname;
                $rows[] = is_image($row->image);
                $rows[] = $row->a_fname;
                $rows[] = $row->a_lname;
                $rows[] = $row->a_armyid;
                $rows[] = $row->af_sname;
                $rows[] = '<a href="mailto:'.$row->email.'">'.$row->email.'</a>';
        
        $rows[] = '
                  <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="'.url("army/detail/".enc_url($row->a_id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                        <i class="mdi mdi-file"></i>
                      </a>
                      <a href="'.url("army/update/".enc_url($row->a_id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                        <i class="ti-pencil"></i>
                      </a>
                      <a href="'.url("army/delete/".enc_url($row->a_id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
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
  if(!is_allowed('army_filter'))
  {
    echo "access not permission";
  }else{
    $this->template->view("filter",[],false);
  }
}
public function armytype()
{
  
}

function detail($id)
{
  $this->is_allowed('army_detail');
    if ($row = $this->model->get_detail(dec_url($id))) {
    $this->template->set_title("Detail ".$this->title);
    if($row->gender == 1){
      $gender = 'ชาย';
    }else if($row->gender == 2){
      $gender = 'หญิง';
    }else{
      $gender = 'ไม่ระบุ';
    }

    $armytype = [
      '1' => 'นายทหารสัญญาบัตร',
      '2' => 'นายทหารประทวน',
      '3' => 'พนักงานราชการ',
      '4' => 'ทหารกองประจำการ',
      '5' => 'พลฯ อาสา',
      '6' => 'ไม่ระบุ'
    ];
    foreach ($armytype as $key => $value) {
      if($row->army_type == $key){
        $army_type = $value;
      }
    }

    $blood_group = [
      'a' => 'กรุ๊ปเลือด เอ',
      'B' => 'กรุ๊ปเลือด บี',
      'o' => 'กรุ๊ปเลือด โอ',
      'ab' => 'กรุ๊ปเลือด เอ-บี'
    ];
    foreach ($blood_group as $key => $value) {
      if($row->blood_group == $key){
        $blood_group = $value;
      }
    }



    $data['type'] = $this->armytype();
    $data = array(
          "rank_r_id" => $row->r_fname,
          "army_type" => $army_type,
          "image" => $row->image,
          "a_fname" => $row->a_fname,
          "a_lname" => $row->a_lname,
          "a_nickname" => $row->a_nickname,
          "a_pid" => isValidNationalId($row->a_pid),
          "birthday" => $row->birthday,
          "a_armyid" => $row->a_armyid,
          "stationed" => $row->stationed,
          "model_year" => $row->model_year,
          "turns" => $row->turns,
          "position_po_id" => $row->po_name,
          "affiliation_af_id" => $row->af_sname,
          "educational" => $row->educational,
          "weight" => $row->weight,
          "height" => $row->height,
          "blood_group" => $blood_group,
          "gender" => $gender,
          "skin" => $row->skin,
          "shape" => $row->shape,
          "defect" => $row->defect,
          "congenital_disease" => $row->congenital_disease,
          "e_name" => $row->e_name,
          "e_surname" => $row->e_surname,
          "these" => $row->these,
          "registration_date" => $row->registration_date,
          "ethnicity" => $row->ethnicity,
          "nationality" => $row->nationality,
          "religion" => $row->religion,
          "address" => $row->address,
          "district" => $row->name_th_d,
          "districts" => $row->name_th_A,
          "province" => $row->name_th_p,
          "email" => $row->email,
          "status" => $row->status,
          "detail" => $row->detail,
          "father_name" => $row->father_name,
          "father_surname" => $row->father_surname,
          "father_age" => $row->father_age,
          "father_occupation" => $row->father_occupation,
          "father_status" => $row->father_status,
          "mother_name" => $row->mother_name,
          "mother_surname" => $row->mother_surname,
          "mother_age" => $row->mother_age,
          "mother_occupation" => $row->mother_occupation,
          "mother_status" => $row->mother_status,
          "wife_name" => $row->wife_name,
          "wife_surname" => $row->wife_surname,
          "wife_occupation" => $row->wife_occupation,
          "wife_age" => $row->wife_age,
          "a_created_at" => $row->a_created_at,
          "a_updated_at" => $row->a_updated_at,
    );
    $this->template->view("view",$data);
  }else{
    $this->error404();
  }
}

function add()
{
  $this->is_allowed('army_add');
  $this->template->set_title(cclang("add")." ".$this->title);
  $data = array('action' => url("army/add_action"),
                  'rank_r_id' => set_value("rank_r_id"),
                  'army_type' => set_value("army_type"),
                  'image' => set_value("image"),
                  'a_fname' => set_value("a_fname"),
                  'a_lname' => set_value("a_lname"),
                  'a_nickname' => set_value("a_nickname"),
                  'a_pid' => set_value("a_pid"),
                  'birthday' => set_value("birthday"),
                  'a_armyid' => set_value("a_armyid"),
                  'stationed' => set_value("stationed"),
                  'model_year' => set_value("model_year"),
                  'turns' => set_value("turns"),
                  'position_po_id' => set_value("position_po_id"),
                  'affiliation_af_id' => set_value("affiliation_af_id"),
                  'educational' => set_value("educational"),
                  'weight' => set_value("weight"),
                  'height' => set_value("height"),
                  'blood_group' => set_value("blood_group"),
                  'gender' => set_value("gender"),
                  'skin' => set_value("skin"),
                  'shape' => set_value("shape"),
                  'defect' => set_value("defect"),
                  'congenital_disease' => set_value("congenital_disease"),
                  'e_name' => set_value("e_name"),
                  'e_surname' => set_value("e_surname"),
                  'these' => set_value("these"),
                  'registration_date' => set_value("registration_date"),
                  'ethnicity' => set_value("ethnicity"),
                  'nationality' => set_value("nationality"),
                  'religion' => set_value("religion"),
                  'address' => set_value("address"),
                  'district' => set_value("district"),
                  'districts' => set_value("districts"),
                  'province' => set_value("province"),
                  'email' => set_value("email"),
                  'status' => set_value("status"),
                  'detail' => set_value("detail"),
                  'father_name' => set_value("father_name"),
                  'father_surname' => set_value("father_surname"),
                  'father_age' => set_value("father_age"),
                  'father_occupation' => set_value("father_occupation"),
                  'father_status' => set_value("father_status"),
                  'mother_name' => set_value("mother_name"),
                  'mother_surname' => set_value("mother_surname"),
                  'mother_age' => set_value("mother_age"),
                  'mother_occupation' => set_value("mother_occupation"),
                  'mother_status' => set_value("mother_status"),
                  'wife_name' => set_value("wife_name"),
                  'wife_surname' => set_value("wife_surname"),
                  'wife_occupation' => set_value("wife_occupation"),
                  'wife_age' => set_value("wife_age"),
                  'a_created_at' => set_value("a_created_at"),
                  );
  $this->template->view("add",$data);
}

function add_action()
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('army_add')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $json = array('success' => false);
    $this->form_validation->set_rules("rank_r_id","* ยศ","trim|xss_clean");
    $this->form_validation->set_rules("army_type","* ประเภท","trim|xss_clean");
    $this->form_validation->set_rules("image","* ภาพถ่าย","trim|xss_clean");
    $this->form_validation->set_rules("a_fname","* ชื่อ","trim|xss_clean");
    $this->form_validation->set_rules("a_lname","* นามสกุล","trim|xss_clean");
    $this->form_validation->set_rules("a_nickname","* ชื่อเล่น","trim|xss_clean");
    $this->form_validation->set_rules("a_pid","* เลขประจำตัวประชาชน","trim|xss_clean");
    $this->form_validation->set_rules("birthday","* วันเกิด","trim|xss_clean");
    $this->form_validation->set_rules("a_armyid","* เลขประจำตัวทหาร","trim|xss_clean");
    $this->form_validation->set_rules("stationed","* ประจำการเมื่อ","trim|xss_clean");
    $this->form_validation->set_rules("model_year","* รุ่นปี","trim|xss_clean");
    $this->form_validation->set_rules("turns","* ผลัด","trim|xss_clean");
    $this->form_validation->set_rules("position_po_id","* ตำแหน่ง","trim|xss_clean");
    $this->form_validation->set_rules("affiliation_af_id","* สังกัด","trim|xss_clean");
    $this->form_validation->set_rules("educational","* ระดับการศึกษา","trim|xss_clean");
    $this->form_validation->set_rules("weight","* น้ำหนัก","trim|xss_clean|numeric");
    $this->form_validation->set_rules("height","* ส่วนสูง","trim|xss_clean|numeric");
    $this->form_validation->set_rules("blood_group","* กลุ่มเลือด","trim|xss_clean");
    $this->form_validation->set_rules("gender","* เพศ","trim|xss_clean");
    $this->form_validation->set_rules("skin","* ผิว","trim|xss_clean");
    $this->form_validation->set_rules("shape","* รูปร่าง","trim|xss_clean");
    $this->form_validation->set_rules("defect","* ตำหนิ","trim|xss_clean");
    $this->form_validation->set_rules("congenital_disease","* โรคประจำตัว","trim|xss_clean");
    $this->form_validation->set_rules("e_name","* ชื่อภาษาอังกฤษ","trim|xss_clean");
    $this->form_validation->set_rules("e_surname","* นามสกุลภาษาอังกฤษ","trim|xss_clean");
    $this->form_validation->set_rules("these","* เหล่า","trim|xss_clean");
    $this->form_validation->set_rules("registration_date","* ขึ้นทะเบียน","trim|xss_clean");
    $this->form_validation->set_rules("ethnicity","* เชื่อชาติ","trim|xss_clean");
    $this->form_validation->set_rules("nationality","* สัญชาติ","trim|xss_clean");
    $this->form_validation->set_rules("religion","* ศาสนา","trim|xss_clean");
    $this->form_validation->set_rules("address","* ที่อยู่","trim|xss_clean");
    $this->form_validation->set_rules("district","* ตำบล","trim|xss_clean");
    $this->form_validation->set_rules("districts","* อำเภอ","trim|xss_clean");
    $this->form_validation->set_rules("province","* จังหวัด","trim|xss_clean");
    $this->form_validation->set_rules("email","* อีเมล์","trim|xss_clean|valid_email");
    $this->form_validation->set_rules("status","* สถานะ","trim|xss_clean");
    $this->form_validation->set_rules("detail","* รายละเอียดอื่นๆ ","trim|xss_clean");
    $this->form_validation->set_rules("father_name","* ชื่อ บิดา","trim|xss_clean");
    $this->form_validation->set_rules("father_surname","* นามสกุล บิดา","trim|xss_clean");
    $this->form_validation->set_rules("father_age","* อายุ บิดา","trim|xss_clean");
    $this->form_validation->set_rules("father_occupation","* อาชีพ บิดา","trim|xss_clean");
    $this->form_validation->set_rules("father_status","* สถานะ บิดา","trim|xss_clean");
    $this->form_validation->set_rules("mother_name","* ชื่อ มารดา","trim|xss_clean");
    $this->form_validation->set_rules("mother_surname","* นามสกุล มารดา","trim|xss_clean");
    $this->form_validation->set_rules("mother_age","* อายุ มารดา","trim|xss_clean");
    $this->form_validation->set_rules("mother_occupation","* อาชีพ มารดา","trim|xss_clean");
    $this->form_validation->set_rules("mother_status","* สถานะมารดา","trim|xss_clean");
    $this->form_validation->set_rules("wife_name","* ชื่อ ภรรยา","trim|xss_clean");
    $this->form_validation->set_rules("wife_surname","* นามสกุล ภรรยา","trim|xss_clean");
    $this->form_validation->set_rules("wife_occupation","* อาชีพภรรยา","trim|xss_clean");
    $this->form_validation->set_rules("wife_age","* อายุ ภรรยา","trim|xss_clean");
    $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

    if ($this->form_validation->run()) {
      $save_data['rank_r_id'] = $this->input->post('rank_r_id',true);
      $save_data['army_type'] = $this->input->post('army_type',true);
      $save_data['image'] = $this->imageCopy($this->input->post('image',true),$_POST['file-dir-image']);
      $save_data['a_fname'] = $this->input->post('a_fname',true);
      $save_data['a_lname'] = $this->input->post('a_lname',true);
      $save_data['a_nickname'] = $this->input->post('a_nickname',true);
      $save_data['a_pid'] = $this->input->post('a_pid',true);
      $save_data['birthday'] = date("Y-m-d",  strtotime($this->input->post('birthday', true)));
      $save_data['a_armyid'] = $this->input->post('a_armyid',true);
      $save_data['stationed'] = date("Y-m-d",  strtotime($this->input->post('stationed', true)));
      $save_data['model_year'] = $this->input->post('model_year',true);
      $save_data['turns'] = $this->input->post('turns',true);
      $save_data['position_po_id'] = $this->input->post('position_po_id',true);
      $save_data['affiliation_af_id'] = $this->input->post('affiliation_af_id',true);
      $save_data['educational'] = $this->input->post('educational',true);
      $save_data['weight'] = $this->input->post('weight',true);
      $save_data['height'] = $this->input->post('height',true);
      $save_data['blood_group'] = $this->input->post('blood_group',true);
      $save_data['gender'] = $this->input->post('gender',true);
      $save_data['skin'] = $this->input->post('skin',true);
      $save_data['shape'] = $this->input->post('shape',true);
      $save_data['defect'] = $this->input->post('defect',true);
      $save_data['congenital_disease'] = $this->input->post('congenital_disease',true);
      $save_data['e_name'] = $this->input->post('e_name',true);
      $save_data['e_surname'] = $this->input->post('e_surname',true);
      $save_data['these'] = $this->input->post('these',true);
      $save_data['registration_date'] = date("Y-m-d",  strtotime($this->input->post('registration_date', true)));
      $save_data['ethnicity'] = $this->input->post('ethnicity',true);
      $save_data['nationality'] = $this->input->post('nationality',true);
      $save_data['religion'] = $this->input->post('religion',true);
      $save_data['address'] = $this->input->post('address',true);
      $save_data['district'] = $this->input->post('district',true);
      $save_data['districts'] = $this->input->post('districts',true);
      $save_data['province'] = $this->input->post('province',true);
      $save_data['email'] = $this->input->post('email',true);
      $save_data['status'] = $this->input->post('status',true);
      $save_data['detail'] = $this->input->post('detail',true);
      $save_data['father_name'] = $this->input->post('father_name',true);
      $save_data['father_surname'] = $this->input->post('father_surname',true);
      $save_data['father_age'] = $this->input->post('father_age',true);
      $save_data['father_occupation'] = $this->input->post('father_occupation',true);
      $save_data['father_status'] = $this->input->post('father_status',true);
      $save_data['mother_name'] = $this->input->post('mother_name',true);
      $save_data['mother_surname'] = $this->input->post('mother_surname',true);
      $save_data['mother_age'] = $this->input->post('mother_age',true);
      $save_data['mother_occupation'] = $this->input->post('mother_occupation',true);
      $save_data['mother_status'] = $this->input->post('mother_status',true);
      $save_data['wife_name'] = $this->input->post('wife_name',true);
      $save_data['wife_surname'] = $this->input->post('wife_surname',true);
      $save_data['wife_occupation'] = $this->input->post('wife_occupation',true);
      $save_data['wife_age'] = $this->input->post('wife_age',true);
      $save_data['a_created_at'] = date("Y-m-d H:i");

      $this->model->insert($save_data);

      set_message("success",cclang("notif_save"));
      $json['redirect'] = url("army");
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
  $this->is_allowed('army_update');
  if ($row = $this->model->find(dec_url($id))) {
    $this->template->set_title(cclang("update")." ".$this->title);
    $data = array('action' => url("army/update_action/$id"),
                  'rank_r_id' => set_value("rank_r_id", $row->rank_r_id),
                  'army_type' => set_value("army_type", $row->army_type),
                  'image' => set_value("image", $row->image),
                  'a_fname' => set_value("a_fname", $row->a_fname),
                  'a_lname' => set_value("a_lname", $row->a_lname),
                  'a_nickname' => set_value("a_nickname", $row->a_nickname),
                  'a_pid' => set_value("a_pid", $row->a_pid),
                  'birthday' => $row->birthday == "" ? "":date("Y-m-d",  strtotime($row->birthday)),
                  'a_armyid' => set_value("a_armyid", $row->a_armyid),
                  'stationed' => $row->stationed == "" ? "":date("Y-m-d",  strtotime($row->stationed)),
                  'model_year' => set_value("model_year", $row->model_year),
                  'turns' => set_value("turns", $row->turns),
                  'position_po_id' => set_value("position_po_id", $row->position_po_id),
                  'affiliation_af_id' => set_value("affiliation_af_id", $row->affiliation_af_id),
                  'educational' => set_value("educational", $row->educational),
                  'weight' => set_value("weight", $row->weight),
                  'height' => set_value("height", $row->height),
                  'blood_group' => set_value("blood_group", $row->blood_group),
                  'gender' => set_value("gender", $row->gender),
                  'skin' => set_value("skin", $row->skin),
                  'shape' => set_value("shape", $row->shape),
                  'defect' => set_value("defect", $row->defect),
                  'congenital_disease' => set_value("congenital_disease", $row->congenital_disease),
                  'e_name' => set_value("e_name", $row->e_name),
                  'e_surname' => set_value("e_surname", $row->e_surname),
                  'these' => set_value("these", $row->these),
                  'registration_date' => $row->registration_date == "" ? "":date("Y-m-d",  strtotime($row->registration_date)),
                  'ethnicity' => set_value("ethnicity", $row->ethnicity),
                  'nationality' => set_value("nationality", $row->nationality),
                  'religion' => set_value("religion", $row->religion),
                  'address' => set_value("address", $row->address),
                  'district' => set_value("district", $row->district),
                  'districts' => set_value("districts", $row->districts),
                  'province' => set_value("province", $row->province),
                  'email' => set_value("email", $row->email),
                  'status' => set_value("status", $row->status),
                  'detail' => set_value("detail", $row->detail),
                  'father_name' => set_value("father_name", $row->father_name),
                  'father_surname' => set_value("father_surname", $row->father_surname),
                  'father_age' => set_value("father_age", $row->father_age),
                  'father_occupation' => set_value("father_occupation", $row->father_occupation),
                  'father_status' => set_value("father_status", $row->father_status),
                  'mother_name' => set_value("mother_name", $row->mother_name),
                  'mother_surname' => set_value("mother_surname", $row->mother_surname),
                  'mother_age' => set_value("mother_age", $row->mother_age),
                  'mother_occupation' => set_value("mother_occupation", $row->mother_occupation),
                  'mother_status' => set_value("mother_status", $row->mother_status),
                  'wife_name' => set_value("wife_name", $row->wife_name),
                  'wife_surname' => set_value("wife_surname", $row->wife_surname),
                  'wife_occupation' => set_value("wife_occupation", $row->wife_occupation),
                  'wife_age' => set_value("wife_age", $row->wife_age),
                  'a_updated_at' => set_value("a_updated_at", $row->a_updated_at),
                  );
    $this->template->view("update",$data);
  }else {
    $this->error404();
  }
}

function update_action($id)
{
  if($this->input->is_ajax_request()){
    if (!is_allowed('army_update')) {
      show_error("Access Permission", 403,'403::Access Not Permission');
      exit();
    }

    $json = array('success' => false);
    $this->form_validation->set_rules("rank_r_id","* ยศ","trim|xss_clean");
    $this->form_validation->set_rules("army_type","* ประเภท","trim|xss_clean");
    $this->form_validation->set_rules("image","* ภาพถ่าย","trim|xss_clean");
    $this->form_validation->set_rules("a_fname","* ชื่อ","trim|xss_clean");
    $this->form_validation->set_rules("a_lname","* นามสกุล","trim|xss_clean");
    $this->form_validation->set_rules("a_nickname","* ชื่อเล่น","trim|xss_clean");
    $this->form_validation->set_rules("a_pid","* เลขประจำตัวประชาชน","trim|xss_clean");
    $this->form_validation->set_rules("birthday","* วันเกิด","trim|xss_clean");
    $this->form_validation->set_rules("a_armyid","* เลขประจำตัวทหาร","trim|xss_clean");
    $this->form_validation->set_rules("stationed","* ประจำการเมื่อ","trim|xss_clean");
    $this->form_validation->set_rules("model_year","* รุ่นปี","trim|xss_clean");
    $this->form_validation->set_rules("turns","* ผลัด","trim|xss_clean");
    $this->form_validation->set_rules("position_po_id","* ตำแหน่ง","trim|xss_clean");
    $this->form_validation->set_rules("affiliation_af_id","* สังกัด","trim|xss_clean");
    $this->form_validation->set_rules("educational","* ระดับการศึกษา","trim|xss_clean");
    $this->form_validation->set_rules("weight","* น้ำหนัก","trim|xss_clean|numeric");
    $this->form_validation->set_rules("height","* ส่วนสูง","trim|xss_clean|numeric");
    $this->form_validation->set_rules("blood_group","* กลุ่มเลือด","trim|xss_clean");
    $this->form_validation->set_rules("gender","* เพศ","trim|xss_clean");
    $this->form_validation->set_rules("skin","* ผิว","trim|xss_clean");
    $this->form_validation->set_rules("shape","* รูปร่าง","trim|xss_clean");
    $this->form_validation->set_rules("defect","* ตำหนิ","trim|xss_clean");
    $this->form_validation->set_rules("congenital_disease","* โรคประจำตัว","trim|xss_clean");
    $this->form_validation->set_rules("e_name","* ชื่อภาษาอังกฤษ","trim|xss_clean");
    $this->form_validation->set_rules("e_surname","* นามสกุลภาษาอังกฤษ","trim|xss_clean");
    $this->form_validation->set_rules("these","* เหล่า","trim|xss_clean");
    $this->form_validation->set_rules("registration_date","* ขึ้นทะเบียน","trim|xss_clean");
    $this->form_validation->set_rules("ethnicity","* เชื่อชาติ","trim|xss_clean");
    $this->form_validation->set_rules("nationality","* สัญชาติ","trim|xss_clean");
    $this->form_validation->set_rules("religion","* ศาสนา","trim|xss_clean");
    $this->form_validation->set_rules("address","* ที่อยู่","trim|xss_clean");
    $this->form_validation->set_rules("district","* ตำบล","trim|xss_clean");
    $this->form_validation->set_rules("districts","* อำเภอ","trim|xss_clean");
    $this->form_validation->set_rules("province","* จังหวัด","trim|xss_clean");
    $this->form_validation->set_rules("email","* อีเมล์","trim|xss_clean|valid_email");
    $this->form_validation->set_rules("status","* สถานะ","trim|xss_clean");
    $this->form_validation->set_rules("detail","* รายละเอียดอื่นๆ ","trim|xss_clean");
    $this->form_validation->set_rules("father_name","* ชื่อ บิดา","trim|xss_clean");
    $this->form_validation->set_rules("father_surname","* นามสกุล บิดา","trim|xss_clean");
    $this->form_validation->set_rules("father_age","* อายุ บิดา","trim|xss_clean");
    $this->form_validation->set_rules("father_occupation","* อาชีพ บิดา","trim|xss_clean");
    $this->form_validation->set_rules("father_status","* สถานะ บิดา","trim|xss_clean");
    $this->form_validation->set_rules("mother_name","* ชื่อ มารดา","trim|xss_clean");
    $this->form_validation->set_rules("mother_surname","* นามสกุล มารดา","trim|xss_clean");
    $this->form_validation->set_rules("mother_age","* อายุ มารดา","trim|xss_clean");
    $this->form_validation->set_rules("mother_occupation","* อาชีพ มารดา","trim|xss_clean");
    $this->form_validation->set_rules("mother_status","* สถานะมารดา","trim|xss_clean");
    $this->form_validation->set_rules("wife_name","* ชื่อ ภรรยา","trim|xss_clean");
    $this->form_validation->set_rules("wife_surname","* นามสกุล ภรรยา","trim|xss_clean");
    $this->form_validation->set_rules("wife_occupation","* อาชีพภรรยา","trim|xss_clean");
    $this->form_validation->set_rules("wife_age","* อายุ ภรรยา","trim|xss_clean");
    $this->form_validation->set_error_delimiters('<i class="error text-danger" style="font-size:11px">','</i>');

    if ($this->form_validation->run()) {
      $save_data['rank_r_id'] = $this->input->post('rank_r_id',true);
      $save_data['army_type'] = $this->input->post('army_type',true);
      $save_data['image'] = $this->imageCopy($this->input->post('image',true),$_POST['file-dir-image']);
      $save_data['a_fname'] = $this->input->post('a_fname',true);
      $save_data['a_lname'] = $this->input->post('a_lname',true);
      $save_data['a_nickname'] = $this->input->post('a_nickname',true);
      $save_data['a_pid'] = $this->input->post('a_pid',true);
      $save_data['birthday'] = date("Y-m-d",  strtotime($this->input->post('birthday', true)));
      $save_data['a_armyid'] = $this->input->post('a_armyid',true);
      $save_data['stationed'] = date("Y-m-d",  strtotime($this->input->post('stationed', true)));
      $save_data['model_year'] = $this->input->post('model_year',true);
      $save_data['turns'] = $this->input->post('turns',true);
      $save_data['position_po_id'] = $this->input->post('position_po_id',true);
      $save_data['affiliation_af_id'] = $this->input->post('affiliation_af_id',true);
      $save_data['educational'] = $this->input->post('educational',true);
      $save_data['weight'] = $this->input->post('weight',true);
      $save_data['height'] = $this->input->post('height',true);
      $save_data['blood_group'] = $this->input->post('blood_group',true);
      $save_data['gender'] = $this->input->post('gender',true);
      $save_data['skin'] = $this->input->post('skin',true);
      $save_data['shape'] = $this->input->post('shape',true);
      $save_data['defect'] = $this->input->post('defect',true);
      $save_data['congenital_disease'] = $this->input->post('congenital_disease',true);
      $save_data['e_name'] = $this->input->post('e_name',true);
      $save_data['e_surname'] = $this->input->post('e_surname',true);
      $save_data['these'] = $this->input->post('these',true);
      $save_data['registration_date'] = date("Y-m-d",  strtotime($this->input->post('registration_date', true)));
      $save_data['ethnicity'] = $this->input->post('ethnicity',true);
      $save_data['nationality'] = $this->input->post('nationality',true);
      $save_data['religion'] = $this->input->post('religion',true);
      $save_data['address'] = $this->input->post('address',true);
      $save_data['district'] = $this->input->post('district',true);
      $save_data['districts'] = $this->input->post('districts',true);
      $save_data['province'] = $this->input->post('province',true);
      $save_data['email'] = $this->input->post('email',true);
      $save_data['status'] = $this->input->post('status',true);
      $save_data['detail'] = $this->input->post('detail',true);
      $save_data['father_name'] = $this->input->post('father_name',true);
      $save_data['father_surname'] = $this->input->post('father_surname',true);
      $save_data['father_age'] = $this->input->post('father_age',true);
      $save_data['father_occupation'] = $this->input->post('father_occupation',true);
      $save_data['father_status'] = $this->input->post('father_status',true);
      $save_data['mother_name'] = $this->input->post('mother_name',true);
      $save_data['mother_surname'] = $this->input->post('mother_surname',true);
      $save_data['mother_age'] = $this->input->post('mother_age',true);
      $save_data['mother_occupation'] = $this->input->post('mother_occupation',true);
      $save_data['mother_status'] = $this->input->post('mother_status',true);
      $save_data['wife_name'] = $this->input->post('wife_name',true);
      $save_data['wife_surname'] = $this->input->post('wife_surname',true);
      $save_data['wife_occupation'] = $this->input->post('wife_occupation',true);
      $save_data['wife_age'] = $this->input->post('wife_age',true);
      $save_data['a_updated_at'] = date("Y-m-d H:i");

      $save = $this->model->change(dec_url($id), $save_data);

      set_message("success",cclang("notif_update"));

      $json['redirect'] = url("army");
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
    if (!is_allowed('army_delete')) {
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

/* End of file Army.php */
/* Location: ./application/modules/army/controllers/backend/Army.php */