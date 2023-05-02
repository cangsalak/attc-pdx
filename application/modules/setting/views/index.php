  <link rel="stylesheet" href="<?=base_url()?>_temp/backend/vendors/xeditable/bootstrap-editable.css">
  <script src="<?=base_url()?>_temp/backend/vendors/xeditable/bootstrap-editable.min.js"></script>
  <div class="row">
    <div class="col-md-12 col-xl-12 mx-auto animated fadeIn delay-2s grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <?=$this->load->view("menu")?>
          <h4 class="card-title"><?=ucfirst($title_module)?> / <?=cclang("Default")?></h4>
          <?php if (is_allowed("config_view_default")): ?>
          <table class="table-setting table-striped table-hover">
            <tr>
              <td class="table-title"><?=cclang("title")?> <?=cclang("Web/App")?></td>
              <td>
                <a href="javascript:void(0);" id="web_name" data-url="<?=url("setting/update_action")?>" data-type="text" data-pk="1" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('web_name')?></a>
              </td>
            </tr>

            <tr>
              <td class="table-title"><?=cclang("Url/Domain")?></td>
              <td>
                <a href="javascript:void(0);" id="web_domain" data-url="<?=url("setting/update_action")?>" data-type="text" data-pk="2" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('web_domain')?></a>
              </td>
            </tr>

            <tr>
              <td class="table-title"><?=cclang("owner")?></td>
              <td>
                <a href="javascript:void(0);" id="web_owner" data-url="<?=url("setting/update_action")?>" data-type="text" data-pk="3" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('web_owner')?></a>
              </td>
            </tr>

            <tr>
              <td class="table-title"><?=cclang("Email")?></td>
              <td>
                <a href="javascript:void(0);" id="email" data-url="<?=url("setting/update_action")?>" data-type="text" data-pk="4" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('email')?></a>
              </td>
            </tr>

            <tr>
              <td class="table-title"><?=cclang("phone")?></td>
              <td>
                <a href="javascript:void(0)" id="telepon" data-url="<?=url("setting/update_action")?>" data-type="text" data-pk="5" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('telepon')?></a>
              </td>
            </tr>

            <tr>
              <td class="table-title"><?=cclang("address")?></td>
              <td>
                <a href="javascript:void(0)" id="address" data-url="<?=url("setting/update_action")?>" data-type="textarea" data-rows="4"  data-pk="6" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('address')?></a>
              </td>
            </tr>

            
            <tr>
              <td class="table-title"><?=cclang("show Color")?></td>
              <td>
                <a href="javascript:void(0);" id="theme_show" data-url="<?=url("setting/update_action")?>" data-type="select" data-value="<?=setting('theme_show')?>" data-pk="64" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('theme_show') == 'Y' ? cclang('show'):cclang('not show')?></a>
              </td>
            </tr>
            

            <?php if(setting('theme_show')=='Y'):?>
            <tr>
              <td class="table-title"><?=cclang("Theme Color")?></td>
              <td>
                <a href="javascript:void(0);" id="color_theme" data-url="<?=url("setting/update_action")?>" data-type="select" data-value="<?=setting('color_theme')?>" data-pk="62" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('color_theme');?></a>
              </td>
            </tr>
            <?php endif;?>

            <tr>
              <td class="table-title"><?=cclang("Show Footer")?></td>
              <td>
                <a href="javascript:void(0);" id="show_footer" data-url="<?=url("setting/update_action")?>" data-type="select" data-value="<?=setting('show_footer')?>" data-pk="63" class="editable editable-click" title="<?=cclang("update")?>"><?=setting('show_footer') == 'Y' ? cclang('Yes'):cclang('No')?></a>
              </td>
            </tr>

          </table>
          <?php if(setting('theme_show')=='Y'):?>
              <style>
                .div1 {
                  align-self: center;
                  margin-top:10px;
                  margin-right:50%;
                  width: 100%;
                  height: 70px;    
                  padding: 60px;
                  background:<?=setting("color_theme")?>;
                }
              </style>
                <div class="div1 text-center text-white">
                  <p>ตัวอย่างสี</p>
                </div>
          <?php endif; ?>

        <?php else: ?>
          <?php $this->load->view("core/error403") ?>
        <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

  <?php if (is_allowed("config_view_default")): ?>
  <script type="text/javascript">
  $(document).ready(function(){
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.ajaxOptions = {type: "POST",dataType : 'JSON'};
     $.fn.editableform.buttons ='<button type="submit" class="btn btn-primary btn-sm editable-submit">' +
                                 '<i class="fa fa-fw fa-check"></i>' +
                                 '</button>' +
                                 '<button type="button" class="btn btn-default btn-sm editable-cancel">' +
                                 '<i class="fa fa-fw fa-times"></i>' +
                                 '</button>';

    $('#web_name').editable({
       inputclass: 'form-control-sm',
       success: function(data) {
        if (data.success != true) {
          return data.msg;
        }
      }
    });

    $('#web_domain').editable({
      inputclass: 'form-control-sm',
      success: function(data) {
       if (data.success != true) {
         return data.msg;
       }
     }
    });


    $('#web_owner').editable({
      inputclass: 'form-control-sm',
      success: function(data) {
       if (data.success != true) {
         return data.msg;
       }
     }
    });

    $('#telepon').editable({
      inputclass: 'form-control-sm',
      success: function(data) {
       if (data.success != true) {
         return data.msg;
       }
     }
    });

    $('#email').editable({
      inputclass: 'form-control-sm',
      success: function(data) {
       if (data.success != true) {
         return data.msg;
       }
     }
    });

    $('#address').editable({
      inputclass: 'form-control-sm',
      success: function(data) {
       if (data.success != true) {
         return data.msg;
       }
     }
    });

    $('#color_theme').editable({
      inputclass: 'form-control-sm',
      source: [
  			{value: 'Gold', text: 'Gold'},
  			{value: 'Yellow', text: 'Yellow'},
  			{value: 'Fuchsia', text: 'Fuchsia'},
  			{value: 'MediumOrchid', text: 'MediumOrchid'},
  			{value: 'RebeccaPurple', text: 'RebeccaPurple'},
  			{value: 'BlueViolet', text: 'BlueViolet'},
  			{value: 'Indigo', text: 'Indigo'},
  			{value: 'GreenYellow', text: 'GreenYellow'},
  			{value: 'Lime', text: 'Lime'},
  			{value: 'SpringGreen', text: 'SpringGreen'},
  			{value: 'Green', text: 'Green'},
  			{value: 'DarkCyan', text: 'DarkCyan'},
  			{value: 'Aqua', text: 'Aqua'},
  			{value: 'SteelBlue', text: 'SteelBlue'},
  			{value: 'SkyBlue', text: 'SkyBlue'},
  			{value: 'Red', text: 'Red'},
  			{value: 'FireBrick', text: 'FireBrick'},
  			{value: 'HotPink', text: 'HotPink'},
  			{value: 'OrangeRed', text: 'OrangeRed'},
  			{value: 'Tomato', text: 'Tomato'},
  			{value: 'Magenta', text: 'Magenta'},
  			{value: 'DarkViolet', text: 'DarkViolet'},
  			{value: 'Green', text: 'Green'},
  			{value: 'LightSeaGreen', text: 'LightSeaGreen'},
  			{value: 'LightCyan', text: 'LightCyan'},
  			{value: 'black', text: 'black'}
  		],
      success: function(data) {
       if (data.success != true) {
         return data.msg;
       }
      location.reload(); // แทรกฟังก์ชันเพื่อ refesh หน้าเว็บ
     }
    });

    
    $('#theme_show').editable({
      inputclass: 'form-control-sm',
      source: [
  			{value: 'Y', text: '<?= cclang('show');?>'},
  			{value: 'N', text: '<?= cclang("not show");?>'}
  		],
      success: function(data) {
       if (data.success != true) {
         return data.msg;
       }
      location.reload(); // แทรกฟังก์ชันเพื่อ refesh หน้าเว็บ
     }
    });

    $('#show_footer').editable({
      inputclass: 'form-control-sm',
      source: [
  			{value: 'Y', text: '<?=cclang('Yes')?>'},
  			{value: 'N', text: '<?=cclang('No')?>'}
  		],
      success: function(data) {
       if (data.success != true) {
         return data.msg;
       }
      location.reload(); // แทรกฟังก์ชันเพื่อ refesh หน้าเว็บ
     }
    });

  });
  </script>
  <?php endif; ?>
