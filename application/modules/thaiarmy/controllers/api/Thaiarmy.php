<?php defined('BASEPATH') OR exit('No direct script access allowed');
    /*| --------------------------------------------------------------------------*/
  /*| dev : cangsalak  */
  /*| version : V.0.0.3 */
  /*| facebook : https://www.facebook.com/maxcangsalak */
  /*| fanspage : https://www.facebook.com/KanticharCangsalak */
  /*| website : https://1.20.167.69/ */
  /*| youtube : https://www.youtube.com/channel/UCQMpYmqbXlUBEJ_z3XPupdA */
  /*| --------------------------------------------------------------------------*/
  /*| Generate By m-code thailand สร้างเมื่อ 24/04/2023 11:37*/
  /*| Please DO NOT modify this information*/

require(APPPATH.'/libraries/REST_Controller.php');

    class Thaiarmy extends REST_Controller{

    private $title = "กำลังพลภายในหน่วย";


    public function __construct()
    {
      $config = array(
        'title' => $this->title,
      );
      parent::__construct($config);
      $this->load->model("Army_model","model");
    }

    function army_get()
    {
      $this->is_allowed('army_list');
      $r = $this->model->get_datatables();
      $this->response($r); 
    }

    function army_put()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('army_put')) {
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
        
          $save = $this->model->change(dec_url($this->uri->segment(3)), $save_data);

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

    function army_post()
    {
      if($this->input->is_ajax_request()){
        if (!is_allowed('army_post')) {
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

    function army_delete()
    {
      if ($this->input->is_ajax_request()) {
        if (!is_allowed('army_delete')) {
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

/* End of file Army.php */
/* Location: ./application/modules/army/controllers/api/Army.php */
