<div class="row">
  <div class="col-md-12 col-xl-12 mx-auto animated fadeIn delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
        <div class="mb-2">
                <a href="<?=url("position/add")?>" class="btn btn-sm btn-success btn-icon-text"><i class="fa fa-file btn-icon-prepend"></i><?=cclang("add_new")?></a>
                <button type="button" id="reload" class="btn btn-sm btn-info-2 btn-icon-text"><i class="mdi mdi-backup-restore btn-icon-prepend"></i><?=cclang("reload")?></button>
                <a href="<?=url("position/filter/")?>" id="filter-show" class="btn btn-sm btn-primary btn-icon-text"><i class="mdi mdi-magnify btn-icon-prepend"></i><?=cclang("Filter")?></a>
              </div>

        <form autocomplete="off" class="content-filter">
          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" id="po_num" class="form-control form-control-sm" placeholder="เลข ชกท" />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="po_name" class="form-control form-control-sm" placeholder="ชื่อ ชกท." />
            </div>

            <div class="form-group col-md-6">
              <input type="text" id="po_details" class="form-control form-control-sm" placeholder="หน้าที่" />
            </div>

            <div class="form-group col-md-6">
              <input type="datetime-local" id="po_created_at" class="form-control form-control-sm" placeholder="สร้างเมื่อ" />
            </div>

            <div class="form-group col-md-6">
              <input type="datetime-local" id="po_update_at" class="form-control form-control-sm" placeholder="แก้ไขเมื่อ" />
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
                                      <th><?=cclang("ชื่อ ชกท.")?></th>
                  
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
          "url": "<?= url("position/json")?>",
          "type": "POST",
          "data":function(data){
              data.po_num = $("#po_num").val();
              data.po_name = $("#po_name").val();
              data.po_details = $("#po_details").val();
              data.po_created_at = $("#po_created_at").val();
              data.po_update_at = $("#po_update_at").val();
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
            "className": "text-center",
            "orderable": false,
            "targets": 2
        },
      ],
    });

  $("#reload").click(function(){
  $("#po_num").val("");
  $("#po_name").val("");
  $("#po_details").val("");
  $("#po_created_at").val("");
  $("#po_update_at").val("");
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
