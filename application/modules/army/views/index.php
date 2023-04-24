<div class="row">
  <div class="col-md-12 col-xl-12 mx-auto animated fadeIn delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
        <div class="mb-2">
                <a href="<?=url("army/add")?>" class="btn btn-sm btn-success btn-icon-text"><i class="fa fa-file btn-icon-prepend"></i><?=cclang("add_new")?></a>
                <button type="button" id="reload" class="btn btn-sm btn-info-2 btn-icon-text"><i class="mdi mdi-backup-restore btn-icon-prepend"></i><?=cclang("reload")?></button>
                <a href="<?=url("army/filter/")?>" id="filter-show" class="btn btn-sm btn-primary btn-icon-text"><i class="mdi mdi-magnify btn-icon-prepend"></i><?=cclang("Filter")?></a>
              </div>

        <form autocomplete="off" class="content-filter">
          <div class="row">
            <div class="form-group col-md-6">
                        <!--
                          app_helper.php - methode is_select
                          is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
                        --->
                <?=is_select_filter("rank","rank_r_id","r_id","r_fname","ยศ");?>
            </div>

            <div class="form-group col-md-6">
              <select class="form-control form-control-sm select2" data-placeholder=" -- Select ประเภท -- " name="army_type" id="army_type">
                <option value=""></option>
                <option value="5">นายทหารสัญญาบัตร</option>
                <option value="4">นายทหารประทวน</option>
                <option value="3">พนักงานราชการ</option>
                <option value="2">ทหารกองประจำการ</option>
                <option value="1">พลฯ อาสา</option>
                <option value="0">ไม่ระบุ</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="image" class="form-control form-control-sm" placeholder="ภาพถ่าย" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="a_fname" class="form-control form-control-sm" placeholder="ชื่อ" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="a_lname" class="form-control form-control-sm" placeholder="นามสกุล" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="a_nickname" class="form-control form-control-sm" placeholder="ชื่อเล่น" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="a_pid" class="form-control form-control-sm" placeholder="เลขประจำตัวประชาชน" />
            </div>

            <div class="form-group col-md-6">
              <input type="date" id="birthday" class="form-control form-control-sm" placeholder="วันเกิด" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="a_armyid" class="form-control form-control-sm" placeholder="เลขประจำตัวทหาร" />
            </div>

            <div class="form-group col-md-6">
              <input type="date" id="stationed" class="form-control form-control-sm" placeholder="ประจำการเมื่อ" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="model_year" class="form-control form-control-sm" placeholder="รุ่นปี" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="turns" class="form-control form-control-sm" placeholder="ผลัด" />
            </div>

            <div class="form-group col-md-6">
                        <!--
                          app_helper.php - methode is_select
                          is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
                        --->
                <?=is_select_filter("position","position_po_id","po_id","po_name","ตำแหน่ง");?>
            </div>

            <div class="form-group col-md-6">
                        <!--
                          app_helper.php - methode is_select
                          is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
                        --->
                <?=is_select_filter("affiliation","affiliation_af_id","af_id","af_sname","สังกัด");?>
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="educational" class="form-control form-control-sm" placeholder="ระดับการศึกษา" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="weight" class="form-control form-control-sm" placeholder="น้ำหนัก" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="height" class="form-control form-control-sm" placeholder="ส่วนสูง" />
            </div>

            <div class="form-group col-md-6">
              <select class="form-control form-control-sm select2" data-placeholder=" -- Select กลุ่มเลือด -- " name="blood_group" id="blood_group">
                <option value=""></option>
                <option value="ab">เอบี</option>
                <option value="a">เอ</option>
                <option value="b">บี</option>
                <option value="o">โอ</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <select class="form-control form-control-sm select2" data-placeholder=" -- Select เพศ -- " name="gender" id="gender">
                <option value=""></option>
                <option value="0">ไม่ระบุ</option>
                <option value="1">ชาย</option>
                <option value="2">หญิง</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="skin" class="form-control form-control-sm" placeholder="ผิว" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="shape" class="form-control form-control-sm" placeholder="รูปร่าง" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="defect" class="form-control form-control-sm" placeholder="ตำหนิ" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="congenital_disease" class="form-control form-control-sm" placeholder="โรคประจำตัว" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="e_name" class="form-control form-control-sm" placeholder="ชื่อภาษาอังกฤษ" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="e_surname" class="form-control form-control-sm" placeholder="นามสกุลภาษาอังกฤษ" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="these" class="form-control form-control-sm" placeholder="เหล่า" />
            </div>

            <div class="form-group col-md-6">
              <input type="date" id="registration_date" class="form-control form-control-sm" placeholder="ขึ้นทะเบียน" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="ethnicity" class="form-control form-control-sm" placeholder="เชื่อชาติ" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="nationality" class="form-control form-control-sm" placeholder="สัญชาติ" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="religion" class="form-control form-control-sm" placeholder="ศาสนา" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="address" class="form-control form-control-sm" placeholder="ที่อยู่" />
            </div>

            <div class="form-group col-md-6">
                        <!--
                          app_helper.php - methode is_select
                          is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
                        --->
                <?=is_select_filter("districts","district","id","name_th_d","ตำบล");?>
            </div>

            <div class="form-group col-md-6">
                        <!--
                          app_helper.php - methode is_select
                          is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
                        --->
                <?=is_select_filter("amphures","districts","id","name_th_A","อำเภอ");?>
            </div>

            <div class="form-group col-md-6">
                        <!--
                          app_helper.php - methode is_select
                          is_select("table", "attribute`id & name`", "value", "label", "entry_value`optional`");
                        --->
                <?=is_select_filter("provinces","province","id","name_th_p","จังหวัด");?>
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="email" class="form-control form-control-sm" placeholder="อีเมล์" />
            </div>

            <div class="form-group col-md-6">
              <select class="form-control form-control-sm select2" data-placeholder=" -- Select สถานะ -- " name="status" id="status">
                <option value=""></option>
                <option value="0">โสด</option>
                <option value="1">สมรส</option>
                <option value="2">หย่า</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="detail" class="form-control form-control-sm" placeholder="รายละเอียดอื่นๆ " />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="father_name" class="form-control form-control-sm" placeholder="ชื่อ บิดา" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="father_surname" class="form-control form-control-sm" placeholder="นามสกุล บิดา" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="father_age" class="form-control form-control-sm" placeholder="อายุ บิดา" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="father_occupation" class="form-control form-control-sm" placeholder="อาชีพ บิดา" />
            </div>

            <div class="form-group col-md-6">
              <select class="form-control form-control-sm select2" data-placeholder=" -- Select สถานะ บิดา -- " name="father_status" id="father_status">
                <option value=""></option>
                <option value="0">เสียชีวิต</option>
                <option value="1">หย่า</option>
                <option value="2">มีชีวิต</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="mother_name" class="form-control form-control-sm" placeholder="ชื่อ มารดา" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="mother_surname" class="form-control form-control-sm" placeholder="นามสกุล มารดา" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="mother_age" class="form-control form-control-sm" placeholder="อายุ มารดา" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="mother_occupation" class="form-control form-control-sm" placeholder="อาชีพ มารดา" />
            </div>

            <div class="form-group col-md-6">
                <label class="mb-0">สถานะมารดา</label>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="mother_status" name="mother_status" value="0">
                    เสียชีวิต                    <i class="input-helper"></i>
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="mother_status" name="mother_status" value="1">
                    หย่า                    <i class="input-helper"></i>
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="mother_status" name="mother_status" value="2">
                    มีชีวิต                    <i class="input-helper"></i>
                  </label>
                </div>
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="wife_name" class="form-control form-control-sm" placeholder="ชื่อ ภรรยา" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="wife_surname" class="form-control form-control-sm" placeholder="นามสกุล ภรรยา" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="wife_occupation" class="form-control form-control-sm" placeholder="อาชีพภรรยา" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="wife_age" class="form-control form-control-sm" placeholder="อายุ ภรรยา" />
            </div>

            <div class="form-group col-md-6">
              <input type="datetime-local" id="a_created_at" class="form-control form-control-sm" placeholder="สร้างเมื่อ" />
            </div>

            <div class="form-group col-md-6">
              <input type="datetime-local" id="a_updated_at" class="form-control form-control-sm" placeholder="แก้ไขเมื่อ" />
            </div>

            <div class="col-md-12">
              <button type='button' class='btn btn-default btn-sm' id="filter-cancel"><?=cclang("cancel")?></button>
              <button type="button" class="btn btn-primary btn-sm" id="filter"><?=cclang("Filter")?></button>
            </div>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
              <tr class="text-center">
                                    <th><?=cclang("ลำดับ")?></th>
                                      <th><?=cclang("ยศ")?></th>
                                      <th><?=cclang("ภาพถ่าย")?></th>
                                      <th><?=cclang("ชื่อ")?></th>
                                      <th><?=cclang("นามสกุล")?></th>
                                      <th><?=cclang("เลขประจำตัวทหาร")?></th>
                                      <th><?=cclang("สังกัด")?></th>
                                      <th><?=cclang("อีเมล์")?></th>
                  
                <th>#</th>
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript">
$(document).ready(function(){
var table;
//datatables
  table = $('#table').DataTable({

      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.
      "ordering": true,
      "searching": false,
      "info": true,
      "bLengthChange": false,
      oLanguage: {
          sProcessing: '<i class="fa fa-spinner fa-spin fa-fw"></i> Loading...'
      },

      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?= url("army/json")?>",
          "type": "POST",
          "data":function(data){
              data.rank_r_id = $("#rank_r_id").val();
              data.army_type = $("#army_type").val();
              data.image = $("#image").val();
              data.a_fname = $("#a_fname").val();
              data.a_lname = $("#a_lname").val();
              data.a_nickname = $("#a_nickname").val();
              data.a_pid = $("#a_pid").val();
              data.birthday = $("#birthday").val();
              data.a_armyid = $("#a_armyid").val();
              data.stationed = $("#stationed").val();
              data.model_year = $("#model_year").val();
              data.turns = $("#turns").val();
              data.position_po_id = $("#position_po_id").val();
              data.affiliation_af_id = $("#affiliation_af_id").val();
              data.educational = $("#educational").val();
              data.weight = $("#weight").val();
              data.height = $("#height").val();
              data.blood_group = $("#blood_group").val();
              data.gender = $("#gender").val();
              data.skin = $("#skin").val();
              data.shape = $("#shape").val();
              data.defect = $("#defect").val();
              data.congenital_disease = $("#congenital_disease").val();
              data.e_name = $("#e_name").val();
              data.e_surname = $("#e_surname").val();
              data.these = $("#these").val();
              data.registration_date = $("#registration_date").val();
              data.ethnicity = $("#ethnicity").val();
              data.nationality = $("#nationality").val();
              data.religion = $("#religion").val();
              data.address = $("#address").val();
              data.district = $("#district").val();
              data.districts = $("#districts").val();
              data.province = $("#province").val();
              data.email = $("#email").val();
              data.status = $("#status").val();
              data.detail = $("#detail").val();
              data.father_name = $("#father_name").val();
              data.father_surname = $("#father_surname").val();
              data.father_age = $("#father_age").val();
              data.father_occupation = $("#father_occupation").val();
              data.father_status = $("#father_status").val();
              data.mother_name = $("#mother_name").val();
              data.mother_surname = $("#mother_surname").val();
              data.mother_age = $("#mother_age").val();
              data.mother_occupation = $("#mother_occupation").val();
              data.mother_status = $("#mother_status:checked").val();
              data.wife_name = $("#wife_name").val();
              data.wife_surname = $("#wife_surname").val();
              data.wife_occupation = $("#wife_occupation").val();
              data.wife_age = $("#wife_age").val();
              data.a_created_at = $("#a_created_at").val();
              data.a_updated_at = $("#a_updated_at").val();
              }
            },

      //Set column definition initialisation properties.
        "columnDefs": [

					{
            "targets": 0,
            "orderable": false
          },

					{
            "targets": 1,
            "orderable": false
          },

					{
            "targets": 2,
            "orderable": false
          },

					{
            "targets": 3,
            "orderable": false
          },

					{
            "targets": 4,
            "orderable": false
          },

					{
            "targets": 5,
            "orderable": false
          },

					{
            "targets": 6,
            "orderable": false
          },

					{
            "targets": 7,
            "orderable": false
          },

        {
            "className": "text-center",
            "orderable": false,
            "targets": 8
        },
      ],
    });

  $("#reload").click(function(){
  $("#rank_r_id").val("");
  $("#army_type").val("");
  $("#image").val("");
  $("#a_fname").val("");
  $("#a_lname").val("");
  $("#a_nickname").val("");
  $("#a_pid").val("");
  $("#birthday").val("");
  $("#a_armyid").val("");
  $("#stationed").val("");
  $("#model_year").val("");
  $("#turns").val("");
  $("#position_po_id").val("");
  $("#affiliation_af_id").val("");
  $("#educational").val("");
  $("#weight").val("");
  $("#height").val("");
  $("#blood_group").val("");
  $("#gender").val("");
  $("#skin").val("");
  $("#shape").val("");
  $("#defect").val("");
  $("#congenital_disease").val("");
  $("#e_name").val("");
  $("#e_surname").val("");
  $("#these").val("");
  $("#registration_date").val("");
  $("#ethnicity").val("");
  $("#nationality").val("");
  $("#religion").val("");
  $("#address").val("");
  $("#district").val("");
  $("#districts").val("");
  $("#province").val("");
  $("#email").val("");
  $("#status").val("");
  $("#detail").val("");
  $("#father_name").val("");
  $("#father_surname").val("");
  $("#father_age").val("");
  $("#father_occupation").val("");
  $("#father_status").val("");
  $("#mother_name").val("");
  $("#mother_surname").val("");
  $("#mother_age").val("");
  $("#mother_occupation").val("");
  $("#mother_status").val("");
  $("#wife_name").val("");
  $("#wife_surname").val("");
  $("#wife_occupation").val("");
  $("#wife_age").val("");
  $("#a_created_at").val("");
  $("#a_updated_at").val("");
  table.ajax.reload();
  });

  $(document).on("click","#filter-show",function(e){
    e.preventDefault();
    $(".content-filter").slideDown();
  });

  $(document).on("click","#filter",function(e){
    e.preventDefault();
    $("#table").DataTable().ajax.reload();
  })

  $(document).on("click","#filter-cancel",function(e){
    e.preventDefault();
    $(".content-filter").slideUp();
  });

  $(document).on("click","#delete",function(e){
    e.preventDefault();
    $('.modal-dialog').addClass('modal-sm');
    $("#modalTitle").text('<?=cclang("confirm")?>');
    $('#modalContent').html(`<p class="mb-4"><?=cclang("delete_description")?></p>
  														<button type='button' class='btn btn-default btn-sm' data-dismiss='modal'><?=cclang("cancel")?></button>
  	                          <button type='button' class='btn btn-primary btn-sm' id='ya-hapus' data-id=`+$(this).attr('alt')+`  data-url=`+$(this).attr('href')+`><?=cclang("delete_action")?></button>
  														`);
    $("#modalGue").modal('show');
  });


  $(document).on('click','#ya-hapus',function(e){
    $(this).prop('disabled',true)
            .text('Processing...');
    $.ajax({
            url:$(this).data('url'),
            type:'POST',
            cache:false,
            dataType:'json',
            success:function(json){
              $('#modalGue').modal('hide');
              swal(json.msg, {
                icon:json.type_msg
              });
              $('#table').DataTable().ajax.reload();
            }
          });
  });
});
</script>
