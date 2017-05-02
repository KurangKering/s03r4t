              <table id="tbl_list_belum_disposisi" class="table table-striped" width="100%">
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
   

     <!-- Modal details surat masuk -->
     <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal_detail_belum">
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

        t = $("#tbl_list_belum_disposisi").dataTable({
          initComplete: function() {
            var api = this.api();
            $('#tbl_list_belum_disposisi_filter input')
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
          ajax: {"url": "disposisi/ajax_lihat_belum", "type": "POST"},
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
     $('#modal_detail_belum  .modal-body').html('');
     $('#modal_detail_belum  .modal-body').html(data);
     $("#modal_detail_belum").modal("show");
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

}

function clearModals()
{

}
</script>
