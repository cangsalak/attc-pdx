<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card-header bg-primary text-white">
      <?=ucwords($title_module)?>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
        <tr>
          <td>Code</td>
          <td><?=$code?></td>
        </tr>
        <tr>
          <td>ชื่อภาษาไทย</td>
          <td><?=$name_th_p?></td>
        </tr>
        <tr>
          <td>ชื่อภาษาอังกฤษ</td>
          <td><?=$name_en_p?></td>
        </tr>
        <tr>
          <td>ภูมิภาค</td>
          <td><?=$geography_id?></td>
        </tr>
        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3"><?=cclang("back")?></a>
      </div>
    </div>
  </div>
</div>
