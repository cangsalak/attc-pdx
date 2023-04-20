<div class="row">
  <div class="col-md-12 col-xl-10 mx-auto animated fadeIn delay-2s">
    <div class="card-header bg-primary text-white">
      <?=ucwords($title_module)?>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
        <tr>
          <td>User</td>
          <td><?=$user?></td>
        </tr>
        <tr>
          <td>Ip address</td>
          <td><?=$ip_address?></td>
        </tr>
        <tr>
          <td>Controller</td>
          <td><?=$controller?></td>
        </tr>
        <tr>
          <td>Url</td>
          <td><?=$url?></td>
        </tr>
        <tr>
          <td>Data</td>
          <td><?=$data?></td>
        </tr>
        <tr>
          <td>Created at</td>
          <td><?=$created_at != "" ? date('d-m-Y H:i',strtotime($created_at)):""?></td>
        </tr>
        </table>

        <a href="<?=url($this->uri->segment(2))?>" class="btn btn-sm btn-danger mt-3"><?=cclang("back")?></a>
      </div>
    </div>
  </div>
</div>
