<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
          <form action="<?=$action?>" id="form" autocomplete="off">

          <div class="form-group">
            <label>ยศ</label>
            <!--
              app_helper.php - methode is_select
              is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
            --->
            <?=is_select("rank","rank_r_id","r_id","r_fname");?>
          </div>

          <div class="form-group">
            <label>ประเภท</label>
            <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- " name="army_type" id="army_type">
              <option value=""></option>
              <option value="5">นายทหารสัญญาบัตร</option>
              <option value="4">นายทหารประทวน</option>
              <option value="3">พนักงานราชการ</option>
              <option value="2">ทหารกองประจำการ</option>
              <option value="1">พลฯ อาสา</option>
              <option value="0">ไม่ระบุ</option>
            </select>
          </div>

          <div class="form-group">
            <label>ภาพถ่าย</label>
            <input type="file" name="img" class="file-upload-default" data-id="image"/>
            <div class="input-group col-xs-12">
              <input type="hidden" class="file-dir" name="file-dir-image" data-id="image"/>
              <input type="text" class="form-control form-control-sm file-upload-info file-name" data-id="image" placeholder="ภาพถ่าย" readonly name="image" />
            <span class="input-group-append">
              <button class="btn-remove-image btn btn-danger btn-sm" type="button" data-id="image" style="display:<?=$image!=''?'block':'none'?>;"><i class="ti-trash"></i></button>
              <button class="file-upload-browse btn btn-primary btn-sm" data-id="image" type="button"><?=cclang("Select File")?></button>
            </span>
            </div>
            <div id="image"></div>
          </div>

          <div class="form-group">
            <label>ชื่อ</label>
            <input type="text" class="form-control form-control-sm" placeholder="ชื่อ" name="a_fname" id="a_fname">
          </div>

          <div class="form-group">
            <label>นามสกุล</label>
            <input type="text" class="form-control form-control-sm" placeholder="นามสกุล" name="a_lname" id="a_lname">
          </div>

          <div class="form-group">
            <label>ชื่อเล่น</label>
            <input type="text" class="form-control form-control-sm" placeholder="ชื่อเล่น" name="a_nickname" id="a_nickname">
          </div>

          <div class="form-group">
            <label>เลขประจำตัวประชาชน</label>
            <input type="number" class="form-control form-control-sm" placeholder="เลขประจำตัวประชาชน" name="a_pid" id="a_pid">
          </div>

          <div class="form-group">
            <label>วันเกิด</label>
            <input type="date" class="form-control form-control-sm" placeholder="วันเกิด" name="birthday" id="birthday">
          </div>

          <div class="form-group">
            <label>เลขประจำตัวทหาร</label>
            <input type="number" class="form-control form-control-sm" placeholder="เลขประจำตัวทหาร" name="a_armyid" id="a_armyid">
          </div>

          <div class="form-group">
            <label>ประจำการเมื่อ</label>
            <input type="date" class="form-control form-control-sm" placeholder="ประจำการเมื่อ" name="stationed" id="stationed">
          </div>

          <div class="form-group">
            <label>รุ่นปี</label>
            <input type="text" class="form-control form-control-sm" placeholder="รุ่นปี" name="model_year" id="model_year">
          </div>

          <div class="form-group">
            <label>ผลัด</label>
            <input type="text" class="form-control form-control-sm" placeholder="ผลัด" name="turns" id="turns">
          </div>

          <div class="form-group">
            <label>ตำแหน่ง</label>
            <!--
              app_helper.php - methode is_select
              is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
            --->
            <?=is_select("position","position_po_id","po_id","po_name");?>
          </div>

          <div class="form-group">
            <label>สังกัด</label>
            <!--
              app_helper.php - methode is_select
              is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
            --->
            <?=is_select("affiliation","affiliation_af_id","af_id","af_sname");?>
          </div>

          <div class="form-group">
            <label>ระดับการศึกษา</label>
            <input type="text" class="form-control form-control-sm" placeholder="ระดับการศึกษา" name="educational" id="educational">
          </div>

          <div class="form-group">
            <label>น้ำหนัก</label>
            <input type="number" class="form-control form-control-sm" placeholder="น้ำหนัก" name="weight" id="weight">
          </div>

          <div class="form-group">
            <label>ส่วนสูง</label>
            <input type="number" class="form-control form-control-sm" placeholder="ส่วนสูง" name="height" id="height">
          </div>

          <div class="form-group">
            <label>กลุ่มเลือด</label>
            <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- " name="blood_group" id="blood_group">
              <option value=""></option>
              <option value="ab">เอบี</option>
              <option value="a">เอ</option>
              <option value="b">บี</option>
              <option value="o">โอ</option>
            </select>
          </div>

          <div class="form-group">
            <label>เพศ</label>
            <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- " name="gender" id="gender">
              <option value=""></option>
              <option value="0">ไม่ระบุ</option>
              <option value="1">ชาย</option>
              <option value="2">หญิง</option>
            </select>
          </div>

          <div class="form-group">
            <label>ผิว</label>
            <input type="text" class="form-control form-control-sm" placeholder="ผิว" name="skin" id="skin">
          </div>

          <div class="form-group">
            <label>รูปร่าง</label>
            <input type="text" class="form-control form-control-sm" placeholder="รูปร่าง" name="shape" id="shape">
          </div>

          <div class="form-group">
            <label>ตำหนิ</label>
            <input type="text" class="form-control form-control-sm" placeholder="ตำหนิ" name="defect" id="defect">
          </div>

          <div class="form-group">
            <label>โรคประจำตัว</label>
            <input type="text" class="form-control form-control-sm" placeholder="โรคประจำตัว" name="congenital_disease" id="congenital_disease">
          </div>

          <div class="form-group">
            <label>ชื่อภาษาอังกฤษ</label>
            <input type="text" class="form-control form-control-sm" placeholder="ชื่อภาษาอังกฤษ" name="e_name" id="e_name">
          </div>

          <div class="form-group">
            <label>นามสกุลภาษาอังกฤษ</label>
            <input type="text" class="form-control form-control-sm" placeholder="นามสกุลภาษาอังกฤษ" name="e_surname" id="e_surname">
          </div>

          <div class="form-group">
            <label>เหล่า</label>
            <input type="text" class="form-control form-control-sm" placeholder="เหล่า" name="these" id="these">
          </div>

          <div class="form-group">
            <label>ขึ้นทะเบียน</label>
            <input type="date" class="form-control form-control-sm" placeholder="ขึ้นทะเบียน" name="registration_date" id="registration_date">
          </div>

          <div class="form-group">
            <label>เชื่อชาติ</label>
            <input type="text" class="form-control form-control-sm" placeholder="เชื่อชาติ" name="ethnicity" id="ethnicity">
          </div>

          <div class="form-group">
            <label>สัญชาติ</label>
            <input type="text" class="form-control form-control-sm" placeholder="สัญชาติ" name="nationality" id="nationality">
          </div>

          <div class="form-group">
            <label>ศาสนา</label>
            <input type="text" class="form-control form-control-sm" placeholder="ศาสนา" name="religion" id="religion">
          </div>

          <div class="form-group">
            <label>ที่อยู่</label>
            <input type="text" class="form-control form-control-sm" placeholder="ที่อยู่" name="address" id="address">
          </div>

          <div class="form-group">
            <label>ตำบล</label>
            <!--
              app_helper.php - methode is_select
              is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
            --->
            <?=is_select("districts","district","id","name_th_d");?>
          </div>

          <div class="form-group">
            <label>อำเภอ</label>
            <!--
              app_helper.php - methode is_select
              is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
            --->
            <?=is_select("amphures","districts","id","name_th_A");?>
          </div>

          <div class="form-group">
            <label>จังหวัด</label>
            <!--
              app_helper.php - methode is_select
              is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
            --->
            <?=is_select("provinces","province","id","name_th_p");?>
          </div>

          <div class="form-group">
            <label>อีเมล์</label>
            <input type="text" class="form-control form-control-sm" placeholder="อีเมล์" name="email" id="email">
          </div>

          <div class="form-group">
            <label>สถานะ</label>
            <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- " name="status" id="status">
              <option value=""></option>
              <option value="0">โสด</option>
              <option value="1">สมรส</option>
              <option value="2">หย่า</option>
            </select>
          </div>

          <div class="form-group">
            <label>รายละเอียดอื่นๆ </label>
            <textarea class="form-control form-control-sm" placeholder="รายละเอียดอื่นๆ " name="detail" id="detail" rows="3" cols="80"></textarea>
          </div>

          <div class="form-group">
            <label>ชื่อ บิดา</label>
            <input type="text" class="form-control form-control-sm" placeholder="ชื่อ บิดา" name="father_name" id="father_name">
          </div>

          <div class="form-group">
            <label>นามสกุล บิดา</label>
            <input type="text" class="form-control form-control-sm" placeholder="นามสกุล บิดา" name="father_surname" id="father_surname">
          </div>

          <div class="form-group">
            <label>อายุ บิดา</label>
            <input type="number" class="form-control form-control-sm" placeholder="อายุ บิดา" name="father_age" id="father_age">
          </div>

          <div class="form-group">
            <label>อาชีพ บิดา</label>
            <input type="text" class="form-control form-control-sm" placeholder="อาชีพ บิดา" name="father_occupation" id="father_occupation">
          </div>

          <div class="form-group">
            <label>สถานะ บิดา</label>
            <select class="form-control form-control-sm select2" data-placeholder=" -- Select -- " name="father_status" id="father_status">
              <option value=""></option>
              <option value="0">เสียชีวิต</option>
              <option value="1">หย่า</option>
              <option value="2">มีชีวิต</option>
            </select>
          </div>

          <div class="form-group">
            <label>ชื่อ มารดา</label>
            <input type="text" class="form-control form-control-sm" placeholder="ชื่อ มารดา" name="mother_name" id="mother_name">
          </div>

          <div class="form-group">
            <label>นามสกุล มารดา</label>
            <input type="text" class="form-control form-control-sm" placeholder="นามสกุล มารดา" name="mother_surname" id="mother_surname">
          </div>

          <div class="form-group">
            <label>อายุ มารดา</label>
            <input type="number" class="form-control form-control-sm" placeholder="อายุ มารดา" name="mother_age" id="mother_age">
          </div>

          <div class="form-group">
            <label>อาชีพ มารดา</label>
            <input type="text" class="form-control form-control-sm" placeholder="อาชีพ มารดา" name="mother_occupation" id="mother_occupation">
          </div>

          <div class="form-group">
            <label>สถานะมารดา</label>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="mother_status" value="0">
                เสียชีวิต
                <i class="input-helper"></i>
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="mother_status" value="1">
                หย่า
                <i class="input-helper"></i>
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="mother_status" value="2">
                มีชีวิต
                <i class="input-helper"></i>
              </label>
            </div>
            <div id="mother_status"></div>
          </div>

          <div class="form-group">
            <label>ชื่อ ภรรยา</label>
            <input type="text" class="form-control form-control-sm" placeholder="ชื่อ ภรรยา" name="wife_name" id="wife_name">
          </div>

          <div class="form-group">
            <label>นามสกุล ภรรยา</label>
            <input type="text" class="form-control form-control-sm" placeholder="นามสกุล ภรรยา" name="wife_surname" id="wife_surname">
          </div>

          <div class="form-group">
            <label>อาชีพภรรยา</label>
            <input type="text" class="form-control form-control-sm" placeholder="อาชีพภรรยา" name="wife_occupation" id="wife_occupation">
          </div>

          <div class="form-group">
            <label>อายุ ภรรยา</label>
            <input type="number" class="form-control form-control-sm" placeholder="อายุ ภรรยา" name="wife_age" id="wife_age">
          </div>


          <input type="hidden" name="submit" value="add">

          <div class="text-right">
            <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger"><?=cclang("cancel")?></a>
            <button type="submit" id="submit"  class="btn btn-sm btn-primary"><?=cclang("save")?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$("#form").submit(function(e){
e.preventDefault();
var me = $(this);
$("#submit").prop('disabled',true).html('Loading...');
$(".form-group").find('.text-danger').remove();
$.ajax({
      url             : me.attr('action'),
      type            : 'post',
      data            :  new FormData(this),
      contentType     : false,
      cache           : false,
      dataType        : 'JSON',
      processData     :false,
      success:function(json){
        if (json.success==true) {
          location.href = json.redirect;
          return;
        }else {
          $("#submit").prop('disabled',false)
                      .html('<?=cclang("save")?>');
          $.each(json.alert, function(key, value) {
            var element = $('#' + key);
            $(element)
            .closest('.form-group')
            .find('.text-danger').remove();
            $(element).after(value);
          });
        }
      }
    });
});
</script>
