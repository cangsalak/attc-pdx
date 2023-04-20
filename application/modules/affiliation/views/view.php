<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card-header bg-primary text-white">
      <?=ucwords($title_module)?>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
        <tr>
          <td>์คำย่อ</td>
          <td><?=$af_sname?></td>
        </tr>
        <tr>
          <td>คำเต็ม</td>
          <td><?=$af_fname?></td>
        </tr>
        <tr>
          <td>ที่อยู่</td>
          <td><?=$af_address?></td>
        </tr>
        <tr>
          <td>เว็บไซต์</td>
          <td><?=$af_web?></td>
        </tr>
        <tr>
          <td>social</td>
          <td><?=$af_social?></td>
        </tr>
        <tr>
          <td>tel</td>
          <td><?=$af_tel?></td>
        </tr>
        <tr>
          <td>created at</td>
          <td><?=$af_created_at != "" ? date('d-m-Y H:i',strtotime($af_created_at)):""?></td>
        </tr>
        <tr>
          <td>update at</td>
          <td><?=$af_update_at != "" ? date('d-m-Y H:i',strtotime($af_update_at)):""?></td>
        </tr>
        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3"><?=cclang("back")?></a>
      </div>
    </div>
  </div>
</div>
