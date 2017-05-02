
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

      <div class="x_content">


        <div class="" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Belum Didisposisi</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Telah Didisposisi</a>
            </li>

          </ul>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
              <?php echo $this->load->view('vw_lihat_belum_disposisi');?>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="tab_content2" aria-labelledby="profile-tab">

              <?php echo $this->load->view('vw_lihat_telah_disposisi');?>

            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
