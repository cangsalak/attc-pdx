<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card-header bg-primary text-white">
      <?=ucwords($title_module)?>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
        <tr>
          <td>ยศ</td>
          <td><?=$rank_r_id?></td>
        </tr>
        <tr>
          <td>ประเภท</td>
          <td><?=$army_type?></td>
        </tr>
        <tr>
          <td>ภาพถ่าย</td>
          <td><?=is_image($image)?></td>
        </tr>
        <tr>
          <td>ชื่อ</td>
          <td><?=$a_fname?></td>
        </tr>
        <tr>
          <td>นามสกุล</td>
          <td><?=$a_lname?></td>
        </tr>
        <tr>
          <td>ชื่อเล่น</td>
          <td><?=$a_nickname?></td>
        </tr>
        <tr>
          <td>เลขประจำตัวประชาชน</td>
          <td><?=$a_pid?></td>
        </tr>
      <tr>
        <td>วันเกิด</td>
        <td><?=$birthday != "" ? date('d-m-Y',strtotime($birthday)):""?></td>
      </tr>
        <tr>
          <td>เลขประจำตัวทหาร</td>
          <td><?=$a_armyid?></td>
        </tr>
      <tr>
        <td>ประจำการเมื่อ</td>
        <td><?=$stationed != "" ? date('d-m-Y',strtotime($stationed)):""?></td>
      </tr>
        <tr>
          <td>รุ่นปี</td>
          <td><?=$model_year?></td>
        </tr>
        <tr>
          <td>ผลัด</td>
          <td><?=$turns?></td>
        </tr>
        <tr>
          <td>ตำแหน่ง</td>
          <td><?=$position_po_id?></td>
        </tr>
        <tr>
          <td>สังกัด</td>
          <td><?=$affiliation_af_id?></td>
        </tr>
        <tr>
          <td>ระดับการศึกษา</td>
          <td><?=$educational?></td>
        </tr>
        <tr>
          <td>น้ำหนัก</td>
          <td><?=$weight?></td>
        </tr>
        <tr>
          <td>ส่วนสูง</td>
          <td><?=$height?></td>
        </tr>
        <tr>
          <td>กลุ่มเลือด</td>
          <td><?=$blood_group?></td>
        </tr>
        <tr>
          <td>เพศ</td>
          <td><?=$gender?></td>
        </tr>
        <tr>
          <td>ผิว</td>
          <td><?=$skin?></td>
        </tr>
        <tr>
          <td>รูปร่าง</td>
          <td><?=$shape?></td>
        </tr>
        <tr>
          <td>ตำหนิ</td>
          <td><?=$defect?></td>
        </tr>
        <tr>
          <td>โรคประจำตัว</td>
          <td><?=$congenital_disease?></td>
        </tr>
        <tr>
          <td>ชื่อภาษาอังกฤษ</td>
          <td><?=$e_name?></td>
        </tr>
        <tr>
          <td>นามสกุลภาษาอังกฤษ</td>
          <td><?=$e_surname?></td>
        </tr>
        <tr>
          <td>เหล่า</td>
          <td><?=$these?></td>
        </tr>
      <tr>
        <td>ขึ้นทะเบียน</td>
        <td><?=$registration_date != "" ? date('d-m-Y',strtotime($registration_date)):""?></td>
      </tr>
        <tr>
          <td>เชื่อชาติ</td>
          <td><?=$ethnicity?></td>
        </tr>
        <tr>
          <td>สัญชาติ</td>
          <td><?=$nationality?></td>
        </tr>
        <tr>
          <td>ศาสนา</td>
          <td><?=$religion?></td>
        </tr>
        <tr>
          <td>ที่อยู่</td>
          <td><?=$address?></td>
        </tr>
        <tr>
          <td>ตำบล</td>
          <td><?=$district?></td>
        </tr>
        <tr>
          <td>อำเภอ</td>
          <td><?=$districts?></td>
        </tr>
        <tr>
          <td>จังหวัด</td>
          <td><?=$province?></td>
        </tr>
        <tr>
          <td>อีเมล์</td>
          <td><?=$email?></td>
        </tr>
        <tr>
          <td>สถานะ</td>
          <td><?=$status?></td>
        </tr>
        <tr>
          <td>รายละเอียดอื่นๆ </td>
          <td><?=$detail?></td>
        </tr>
        <tr>
          <td>ชื่อ บิดา</td>
          <td><?=$father_name?></td>
        </tr>
        <tr>
          <td>นามสกุล บิดา</td>
          <td><?=$father_surname?></td>
        </tr>
        <tr>
          <td>อายุ บิดา</td>
          <td><?=$father_age?></td>
        </tr>
        <tr>
          <td>อาชีพ บิดา</td>
          <td><?=$father_occupation?></td>
        </tr>
        <tr>
          <td>สถานะ บิดา</td>
          <td><?=$father_status?></td>
        </tr>
        <tr>
          <td>ชื่อ มารดา</td>
          <td><?=$mother_name?></td>
        </tr>
        <tr>
          <td>นามสกุล มารดา</td>
          <td><?=$mother_surname?></td>
        </tr>
        <tr>
          <td>อายุ มารดา</td>
          <td><?=$mother_age?></td>
        </tr>
        <tr>
          <td>อาชีพ มารดา</td>
          <td><?=$mother_occupation?></td>
        </tr>
        <tr>
          <td>สถานะมารดา</td>
          <td><?=$mother_status?></td>
        </tr>
        <tr>
          <td>ชื่อ ภรรยา</td>
          <td><?=$wife_name?></td>
        </tr>
        <tr>
          <td>นามสกุล ภรรยา</td>
          <td><?=$wife_surname?></td>
        </tr>
        <tr>
          <td>อาชีพภรรยา</td>
          <td><?=$wife_occupation?></td>
        </tr>
        <tr>
          <td>อายุ ภรรยา</td>
          <td><?=$wife_age?></td>
        </tr>
        <tr>
          <td>สร้างเมื่อ</td>
          <td><?=$a_created_at != "" ? date('d-m-Y H:i',strtotime($a_created_at)):""?></td>
        </tr>
        <tr>
          <td>แก้ไขเมื่อ</td>
          <td><?=$a_updated_at != "" ? date('d-m-Y H:i',strtotime($a_updated_at)):""?></td>
        </tr>
        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3"><?=cclang("back")?></a>
      </div>
    </div>
  </div>
</div>
