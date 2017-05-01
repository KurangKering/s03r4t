
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Daftar Arsip</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li class=""><button  id="btn_tambah" onclick="location.href = '<?php echo base_url('arsip/tambah') ?>';" class="btn btn-primary">Tambah</button>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="tbl_arsip" class="table table-striped">
            <thead>
              <tr>
               <th>#</th>
               <th>Perkara Id</th>
               <th>No Perkara</th>
               <th>Tgl Masuk</th>
               <th>Penerima</th>
               <th>Penyerah</th>
               <th>Action</th>
             </tr>
           </thead>
         </table>
       </div>
     </div>
   </div>
 </div>

 <!-- Modal details surat masuk -->
 <div class="modal fade arsip" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_detail">
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

    t = $("#tbl_arsip").dataTable({
      initComplete: function() {
        var api = this.api();
        $('#tbl_arsip_filter input')
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
      ajax: {"url": "arsip/ajax_lihat", "type": "POST"},
      columns: [
      {"data" : "nomor_urut" ,
      "orderable": false},
      {"data": "perkara_id"},
      {"data": "nomor_perkara"},
      {"data": "tanggal_masuk_arsip"},
      {"data": "nama"},
      {"data": "nama_penyerah"},
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
  $(this).find('.btn-ok').attr('id', $(e.relatedTarget).data('id_arsip'));
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
    url: 'arsip/ajax_detail',
    type: 'POST',
    data: {id_arsip : id},
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
    url: 'arsip/ajax_delete_surat_arsip',
    type: 'POST',
    data: {id_arsip : id},
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
//       data: {id_arsip : '1'},
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
