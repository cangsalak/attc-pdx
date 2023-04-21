<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card-header bg-primary text-white">
      <?=ucwords($title_module)?>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
        <tr>
          <td>เลข ชกท</td>
          <td><?=$po_num?></td>
        </tr>
        <tr>
          <td>ชื่อ ชกท.</td>
          <td><?=$po_name?></td>
        </tr>
        <tr>
          <td>หน้าที่</td>
          <td><?=$po_details?></td>
        </tr>
        <tr>
          <td>สร้างเมื่อ</td>
          <td><?=$po_created_at != "" ? date('d-m-Y H:i',strtotime($po_created_at)):""?></td>
        </tr>
        <tr>
          <td>แก้ไขเมื่อ</td>
          <td><?=$po_update_at != "" ? date('d-m-Y H:i',strtotime($po_update_at)):""?></td>
        </tr>
        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3"><?=cclang("back")?></a>
      </div>
    </div>
  </div>
</div>
