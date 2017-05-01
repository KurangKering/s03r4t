<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-bars"></i> Tabs <small>Float left</small></h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">


      <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Home</a>
          </li>
          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
          </li>
          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
          </li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
              synth. Cosby sweater eu banh mi, qui irure terr.</p>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
              <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                booth letterpress, commodo enim craft beer mlkshk aliquip</p>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                  booth letterpress, commodo enim craft beer mlkshk </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Daftar Disposisi </h2>
              <ul class="nav navbar-right panel_toolbox">
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="tbl_list_disposisi" class="table table-striped">
                <thead>
                  <tr>
                   <th>#</th>
                   <th>No Disposisi</th>
                   <th>Tanggal Masuk</th>
                   <th>Pengirim</th>
                   <th>Perihal</th>
                   <th>Tujuan</th>
                   <th>Status</th>
                   <th>Action</th>

                 </tr>
               </thead>
             </table>
           </div>
         </div>
       </div>
     </div>

     <!-- Modal details surat masuk -->
     <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_detail">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          </div>

        </div>
      </div>
    </div>



    <!-- Modal untuk delete -->


    <div class="modal fade bs-example-modal-sm"  id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h5 class="modal-title" id="myModalLabel2">Yakin Ingin Menghapus Data  Ini ? </h5>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-warning btn-ok btn-xs">Delete</button>
          </div>

        </div>
      </div>
    </div>
    <script>
      var t;

      $(function() {

        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
          return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
        };

        t = $("#tbl_list_disposisi").dataTable({
          initComplete: function() {
            var api = this.api();
            $('#tbl_list_disposisi_filter input')
            .off('.DT')
            .on('keyup.DT', function(e) {
              if (e.keyCode == 13) {
                api.search(this.value).draw();
              }
            });
          },
          oLanguage: {
            sProcessing: "loading..."
          },
          processing: true,
          serverSide: true,
          ajax: {"url": "disposisi/ajax_lihat", "type": "POST"},
          columns: [
          {"data" : "nomor_urut" ,
          "orderable": false},
          {
            "data": "no_lembar_disposisi",

          },
          {"data": "tgl_masuk"},
          {"data": "pengirim"},
          {"data": "perihal"},
          {"data": "tujuan_text"},
          {"data": "status_nama"},
          {"data": "view"},
          ],
          order: [[1, 'desc']],
          rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
          }
        });

 // 
 $('#confirm-delete').on('show.bs.modal', function(e) {
  $(this).find('.btn-ok').attr('id', $(e.relatedTarget).data('id_disposisi'));
});


 $('.btn-ok').click(function(event) {

  var id = $(this).attr('id');
  doDelete(id);
  $('#confirm-delete').modal('hide');
});
});


//Tampilkan Modal 
function showDetails(id)
{
  $.ajax({
    url: 'disposisi/ajax_detail',
    type: 'POST',
    data: {id_disposisi : id},
    cache: false,
    dataType: 'html',
    //processData: false, // Don't process the files
    //contentType: false, // Set content type to false as jQuery will tell the server its a query string request
    success: function(data, textStatus, jqXHR)
    {
     $('#modal_detail  .modal-body').html('');
     $('#modal_detail  .modal-body').html(data);
     $("#modal_detail").modal("show");
   },
   error: function(jqXHR, textStatus, errorThrown)
   {
    // Handle errors here
    console.log('ERRORS: ' + textStatus);
    // STOP LOADING SPINNER
  }
});
}

function doDelete(id)
{
  $.ajax({
    url: 'disposisi/ajax_delete_disposisi',
    type: 'POST',
    data: {id_disposisi : id},
    //processData: false, // Don't process the files
    //contentType: false, // Set content type to false as jQuery will tell the server its a query string request

    success: function(data, textStatus, jqXHR)
    {
     if (data == 'YES') {

      t.api().ajax.reload();
    }
    else
    {

    }
  },
  error: function(jqXHR, textStatus, errorThrown)
  {
    // Handle errors here
    console.log('ERRORS: ' + textStatus);
    // STOP LOADING SPINNER
  }
});

//     $.ajax({
//       url: 'disposisi/ajax_delete',
//       type: 'GET',
//       data: {id_disposisi : '1'},
//       dataType : "JSON",
//       processData: false,
//       contentType: false,
//       success: function(data, textStatus, jqXHR)
//       {
//        console.log(data);
//      },
//      error: function(jqXHR, textStatus, errorThrown)
//      {
//     // Handle errors here
//     console.log('ERRORS: ' + textStatus);
//     // STOP LOADING SPINNER
//   }
// });
}

function clearModals()
{

}
</script>
