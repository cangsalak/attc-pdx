<form id="form" action="<?=url("dashboard/update_action")?>">

    <div class="form-group row">
        <label class="col-sm-4 col-form-label"><?=cclang("เลขประจำตัวทหาร")?></label>
        <div class="col-sm-8">
            <input class="form-control" placeholder="******" type="number" name="army_id" id="army_id" maxlength="10">
        </div>
    </div>

    <div class="text-right">
        <button type="button" data-dismiss="modal" aria-label="Close"
            class="btn btn-sm btn-danger"><?=cclang("Cancel")?></button>
        <button type="submit" id="submit" name="submit" class="btn btn-sm btn-primary"><?=cclang("ตกลง")?> </button>
    </div>
</form>



<script type="text/javascript">
$("#form").submit(function(e) {
    e.preventDefault();
    var me = $(this);
    $("#submit").prop('disabled', true).html('Loading...');
    $(".form-group").find('.text-danger').remove();
    $.ajax({
        url: me.attr('action'),
        type: 'post',
        data: new FormData(this),
        contentType: false,
        cache: false,
        dataType: 'JSON',
        processData: false,
        success: function(json) {
            if (json.success == true) {
                $("#modalUser").modal("hide");
                swal(json.alert, {
                    icon: 'success'
                })
                setTimeout(function() {
                    location.reload();
                }, 5000); // 5000 milliseconds = 5 วินาที
            } else {
                $("#submit").prop('disabled', false)
                    .html('เพิ่มเลขประจำตัวทหาร');
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