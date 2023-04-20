<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card m-b-30">
      <div class="card-header bg-primary text-white">
        <?=ucwords($title_module)?>
      </div>
      <div class="card-body">
          <form action="<?=$action?>" id="form" autocomplete="off">
          
          <div class="form-group">
            <label>์คำย่อ</label>
            <input type="text" class="form-control form-control-sm" placeholder="์คำย่อ" name="af_sname" id="af_sname" value="<?=$af_sname?>">
          </div>
        
          <div class="form-group">
            <label>คำเต็ม</label>
            <input type="text" class="form-control form-control-sm" placeholder="คำเต็ม" name="af_fname" id="af_fname" value="<?=$af_fname?>">
          </div>
        
          <div class="form-group">
            <label>ที่อยู่</label>
            <textarea class="form-control form-control-sm" placeholder="ที่อยู่" name="af_address" id="af_address" rows="3" cols="80"><?=$af_address?></textarea>
          </div>
        
          <div class="form-group">
            <label>เว็บไซต์</label>
            <input type="text" class="form-control form-control-sm" placeholder="เว็บไซต์" name="af_web" id="af_web" value="<?=$af_web?>">
          </div>
        
          <div class="form-group">
            <label>social</label>
            <textarea class="form-control form-control-sm" placeholder="social" name="af_social" id="af_social" rows="3" cols="80"><?=$af_social?></textarea>
          </div>
        
          <div class="form-group">
            <label>tel</label>
            <input type="number" class="form-control form-control-sm" placeholder="tel" name="af_tel" id="af_tel" value="<?=$af_tel?>">
          </div>
        
        
          <input type="hidden" name="submit" value="update">

          <div class="text-right">
            <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger"><?=cclang("cancel")?></a>
            <button type="submit" id="submit"  class="btn btn-sm btn-primary"><?=cclang("update")?></button>
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
