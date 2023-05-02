<div class="row">
  <div class="col-md-12 col-xl-12 mx-auto animated fadeIn delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
        <div class="mb-2">
                <a href="<?=url("affiliation/add")?>" class="btn btn-sm btn-success btn-icon-text"><i class="fa fa-file btn-icon-prepend"></i><?=cclang("add_new")?></a>
                <button type="button" id="reload" class="btn btn-sm btn-info-2 btn-icon-text"><i class="mdi mdi-backup-restore btn-icon-prepend"></i><?=cclang("reload")?></button>
                <a href="<?=url("affiliation/filter/")?>" id="filter-show" class="btn btn-sm btn-primary btn-icon-text"><i class="mdi mdi-magnify btn-icon-prepend"></i><?=cclang("Filter")?></a>
              </div>

        <form autocomplete="off" class="content-filter">
          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" id="af_sname" class="form-control form-control-sm" placeholder="์คำย่อ" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="af_fname" class="form-control form-control-sm" placeholder="คำเต็ม" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="af_address" class="form-control form-control-sm" placeholder="ที่อยู่" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="af_web" class="form-control form-control-sm" placeholder="เว็บไซต์" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="af_social" class="form-control form-control-sm" placeholder="social" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="af_tel" class="form-control form-control-sm" placeholder="tel" />
            </div>

            <div class="form-group col-md-6">
              <input type="datetime-local" id="af_created_at" class="form-control form-control-sm" placeholder="created at" />
            </div>

            <div class="form-group col-md-6">
              <input type="datetime-local" id="af_update_at" class="form-control form-control-sm" placeholder="update at" />
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
                                    <th><?=cclang("Id")?></th>
                                      <th><?=cclang("คำเต็ม")?></th>
                                      <th><?=cclang("ที่อยู่")?></th>
                                      <th><?=cclang("เว็บไซต์")?></th>
                  
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
          "url": "<?= url("affiliation/json")?>",
          "type": "POST",
          "data":function(data){
              data.af_sname = $("#af_sname").val();
              data.af_fname = $("#af_fname").val();
              data.af_address = $("#af_address").val();
              data.af_web = $("#af_web").val();
              data.af_social = $("#af_social").val();
              data.af_tel = $("#af_tel").val();
              data.af_created_at = $("#af_created_at").val();
              data.af_update_at = $("#af_update_at").val();
              }
            },

      //Set column definition initialisation properties.
        "columnDefs": [

					{
            "className": "text-center",
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
            "className": "text-center",
            "orderable": false,
            "targets": 4
        },
      ],
    });

  $("#reload").click(function(){
  $("#af_sname").val("");
  $("#af_fname").val("");
  $("#af_address").val("");
  $("#af_web").val("");
  $("#af_social").val("");
  $("#af_tel").val("");
  $("#af_created_at").val("");
  $("#af_update_at").val("");
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
