
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Surat Keluar</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li class=""><button  id="btn_tambah" onclick="location.href = '<?php echo base_url('surat_keluar/tambah') ?>';" class="btn btn-primary">Tambah</button>
                     </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="tbl_keluar" class="table table-striped">
            <thead>
              <tr>
               <th>#</th>
               <th>No Surat Keluar</th>
               <th>Tanggal Masuk</th>
               <th>Pembuat</th>
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
 <div class="modal fade surat-keluar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_detail_keluar">
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


<div class="modal fade bs-example-modal-sm"  id="confirm_delete_keluar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

    t = $("#tbl_keluar").dataTable({
      initComplete: function() {
        var api = this.api();
        $('#tbl_keluar_filter input')
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
      ajax: {"url": "surat_keluar/ajax_lihat", "type": "POST"},
      columns: [
      {"data" : "nomor_urut" ,
      "orderable": false},
      {
        "data": "no_surat_keluar",

      },
      {"data": "tgl_surat"},
      {"data": "pembuat_surat_text"},
      {"data": "perihal"},
      {"data": "tujuan_text"},
      {"data": "nama"},
     
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
 $('#confirm_delete_keluar').on('show.bs.modal', function(e) {
  $(this).find('.btn-ok').attr('id', $(e.relatedTarget).data('id_surat_keluar'));
});


 $('.btn-ok').click(function(event) {

  var id = $(this).attr('id');
  doDelete(id);
  $('#confirm_delete_keluar').modal('hide');
});
});


//Tampilkan Modal 
function showDetails(id)
{
  $.ajax({
    url: 'surat_keluar/ajax_detail',
    type: 'POST',
    data: {id_surat_keluar : id},
    cache: false,
    dataType: 'html',
    //processData: false, // Don't process the files
    //contentType: false, // Set content type to false as jQuery will tell the server its a query string request
    success: function(data, textStatus, jqXHR)
    {
     $('#modal_detail_keluar  .modal-body').html('');
     $('#modal_detail_keluar  .modal-body').html(data);
     $("#modal_detail_keluar").modal("show");
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
    url: 'surat_keluar/ajax_delete_surat_keluar',
    type: 'POST',
    data: {id_surat_keluar : id},
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
//       url: 'surat_masuk/ajax_delete',
//       type: 'GET',
//       data: {id_surat_masuk : '1'},
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
