@extends('admin_template.dashboard')

@section('content')

<div class="content">


<div class="container-fluid">



              <!-- do what you want to do -->
              <div class="row">

                  <div class="card" style="padding : 20px">
                    <h4 class="card-title">Data Tarik</h4>
                    <p class="card-category">
                        Menampilkan Seluruh Data Penarikan Uang Kas Bersama
                    </p>

                    <div class="" style="padding-top: 15px">
                      <form class="" action="" method="post">

                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('msg'))
                    <div class="alert alert-info alert-with-icon" data-notify="container">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                              <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span data-notify="icon" class="nc-icon nc-bell-55"></span>
                          <span data-notify="message">{{ session('msg') }}</span>
                      </div>
                    @endif
                      </form>
                    </div>

                      <div class="container">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Nominal</th>
                              <th>Tujuan</th>
                              <th>Keterangan</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach ($tariks as $key => $tarik)

                            <tr >
                              <td>{{++$key}}</td>
                              <td>{{ $tarik->created_at }}</td>
                              <td class="nominal"><?php echo rupiah(  $tarik->nominal  ); ?></td>
                              <td>{{ $tarik->tujuan }}</td>
                              <td>{{ $tarik->keterangan }}</td>
                              <td>
                                <input type="button" class="btn btn-primary modal_edit" data-id="{{ $tarik->id }}" data-toggle="modal" data-target="#modal_edit" name="" value="Edit">
                                <input type="button" class="btn btn-danger modal_delete" data-id="{{ $tarik->id }}" data-toggle="modal" data-target="#modal_delete" name="" value="Hapus">
                              </td>
                            </tr>
                            @endforeach
                          </tbody>

                        </table>
                      </div>
                      <center>
                      <div id="page">
                        {{ $tariks->links() }}
                      </div>
                    </center>

                </div>

              </div>





</div>
</div>

<!-- show modal dialog update status -->
@include('super_admin.tarik.modal_edit')
@include('super_admin.tarik.modal_delete')




<script type="text/javascript">

$(document).ready(function(){
  // onClick status centang untuk yang aproved
  $("body").on("click",".modal_update",function() {
      var id = $(this).attr('id');
      var stat = $(this).attr('value');
      $("#modal_update").find("form").attr("action","transfer/" + id +"/"+ stat);
  });

  //on Modal closed
  $("#modal_update").on("hidden.bs.modal", function () {
    console.log("yak terclose");
    $(".checkin").each(function(){
      $(this).prop("checked", true);
    });

    $(".checkout").each(function(){
      $(this).prop("checked", false);
    });
  });

  rupiah($('#nominal'));

  $('#modal_edit').appendTo("body");
  $('#modal_delete').appendTo("body");

  // onClick Edit untuk mengedit data Transfer
  $("body").on("click",".modal_edit",function() {
      var id = $(this).attr('data-id');
      var nominal = $(this).parent("td").prev("td").prev("td").prev("td").text();
          //nominal = nominal.replace(".", "");
      var tujuan = $(this).parent("td").prev("td").prev("td").text();
      var keterangan = $(this).parent("td").prev("td").text();

      $("#modal_edit").find("input[name='nominal']").val(nominal);
      $("#modal_edit").find("input[name='tujuan']").val(tujuan);
      $("#modal_edit").find("textarea[name='keterangan']").val(keterangan);
      $("#modal_edit").find("form").attr("action","tarik/" + id);
  });

  //onClick Hapus untuk menghapus data transfer
  $("body").on("click",".modal_delete",function() {
      var id = $(this).attr('data-id');
      var jumlah = $(this).parent("td").prev("td").prev("td").prev("td").text();

      $("#editP").text("Apakah anda yakin ingin menghapus data tarik sejumlah Rp."+ jumlah);
      $("#modal_delete").find("form").attr("action","tarik/" + id);
  });



}); //document ready



</script>

<script src="{{ asset('js/rupiah.js') }}"></script>

@endsection
