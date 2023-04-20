<div class="row">
  <div class="col-md-12 col-xl-12 mx-auto animated fadeIn delay-2s grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <?=$this->load->view("menu")?>
        <h4 class="card-title"><?=ucfirst($title_module)?> / System Info</h4>
        <div class="pt-5 pb-5 col-md-12 mx-auto">
          <div class="row">
            <?php if (is_allowed('config_system_info')): ?>
              <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <?=system_info();?>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

