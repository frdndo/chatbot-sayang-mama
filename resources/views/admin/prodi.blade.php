@extends('admin.template')

@section('content')

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Data Prodi </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_content">

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
                      </ul>
                      <div id="myTabContent2" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">

                          <!-------------------------------------------------------------------ARTIKEL INDEX--------------------------->
                          <div class="x_panel">
                            <div class="x_title">
                              <h2> Tabel Prodi <small>Daftar prodi yang telah dimasukkan</small></h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <a id="add-btn" class="btn btn-success" data-toggle="modal" data-target="#myModalAdd"><label class="fa fa-plus-circle"></label>  Tambah Prodi Baru</a>
                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <table id="tabel-user" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th align="center">Prodi</th>
                                    <th align="center">Fakultas</th>
                                    <th align="center">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($prodi as $prodis)
                                  @if( $prodis->deleted_at == NULL)
                                  <tr>
                                    <td valign="middle">{{ $prodis->nama }}</td>
                                    <td valign="middle" >{{ $prodis->fakultas->nama }}</td>
                                    <td valign="middle">
                                      <a id="edit-btn" class="btn btn-warning btn-xs edit_button" data-toggle="modal"
                                      data-target="#myModalUpdate"><span class="fa fa-pencil-square-o"></span> Edit</a>
                                      <a id="delete-btn" class="btn btn-danger btn-xs" customParam="#" href="#"><span class="fa fa-trash"></span> Hapus</a>
                                    </td>
                                  </tr>
                                  @endif
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">

                        </div>
                      </div>
                    </div>

                  </div>


              </div>
            </div>
          </div>
        </div>

<!-- /page content -->

@endsection

@section('custom_script')

<!-- Script SweetAlert Konfirmasi Hapus -->
<script>
    var deleter = {

        linkSelector : "a#delete-btn",

        init: function() {
            $(this.linkSelector).on('click', {self:this}, this.handleClick);
        },

        handleClick: function(event) {
            event.preventDefault();

            var self = event.data.self;
            var link = $(this);

        swal({
            title: 'Hapus Data',
            text: "Apakah anda yakin ingin menghapus data ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            confirmButtonClass: 'btn btn-success btn-lg',
            cancelButtonClass: 'btn btn-danger btn-lg',
            buttonsStyling: false
          }).then(function () {
              window.location = link.attr('customParam');
          }, function (dismiss) {
            // dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
            if (dismiss === 'cancel') {
              swal(
                'Batal',
                'Data batal untuk dihapus',
                'error'
              )
            }
          })
        },
    };

    deleter.init();
</script>
<!-- Script SweetAlert Konfirmasi Hapus -->

<!-- Datatables Artikel Index -->
<script>
    $('#tabel-user').dataTable();
</script>
<!-- /Datatables Artikel Index -->

<script type="text/javascript">
  $(document).on( "click", '.edit_button',function(e) {

        var id = $(this).data('id');
        $(".id").val(id);
        var fullname = $(this).data('fullname');
        $(".fullname").val(fullname);
        var npm = $(this).data('npm');
        $(".npm").val(npm);
        var email = $(this).data('email');
        $(".email").val(email);

    });
    </script>
@endsection
