@extends('admin_template.dashboard')

@section('content')

<div class="content">


<div class="container-fluid">



              <!-- do what you want to do -->
              <div class="row">

                  <div class="card" style="padding : 20px">
                    <h4 class="card-title">Data Transfer</h4>
                    <p class="card-category">
                        Menampilkan Seluruh Data User Yang Melakukan Transfer
                    </p>

                    <div class="" style="padding-top: 15px">
                      <form class="" action="" method="post">
                      <div class="form-group">
                        <input id="BAprove" type="radio" name="gender" value="male" checked> Sudah Terverifikasi
                        <input id="BUnAprove" style="margin-left: 30px" type="radio" name="gender" value="female"> Belum Terverifikasi<br>
                      </div>
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
                              <th>Bank</th>
                              <th>Keterangan</th>
                              <th>Pengirim</th>
                              <th>Aprove</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody style="display:none" id="unAprove">

                            @foreach ($transfersUnaprove as $key => $transfer)

                            <tr >
                              <td>{{++$key}}</td>
                              <td>{{ $transfer->created_at }}</td>
                              <td class="nominal"><?php echo rupiah(  $transfer->nominal  ); ?></td>
                              <td>{{ $transfer->bank }}</td>
                              <td>{{ $transfer->keterangan }}</td>
                              <td>{{ $transfer->user->name }}</td>
                              <td>
                                <input type="checkbox" class="modal_update checkout" data-toggle="modal" data-target="#modal_update" value="unAprove" id="{{ $transfer->id }}"></input>
                              </td>
                              <td>
                                <input type="button" class="btn btn-primary modal_edit" data-id="{{ $transfer->id }}" data-toggle="modal" data-target="#modal_edit" name="" value="Edit">
                                <input type="button" class="btn btn-danger modal_delete" data-id="{{ $transfer->id }}" data-toggle="modal" data-target="#modal_delete" name="" value="Hapus">
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                            <tbody id="Aprove">


                            @foreach ($transfersAprove as $key => $transfer)
                            <tr >
                              <td>{{++$key}}</td>

                              <td>{{ $transfer->created_at }}</td>
                              <td class="nominal"><?php echo rupiah(  $transfer->nominal  ); ?></td>
                              <td>{{ $transfer->bank }}</td>
                              <td>{{ $transfer->keterangan }}</td>
                              <td>{{ $transfer->user->name }}</td>
                              <td>
                                <input type="checkbox" ia="tes" class="modal_update checkin" data-toggle="modal" data-target="#modal_update" value="aprove" id="{{ $transfer->id }}" checked ></input>
                              </td>
                              <td>

                              </td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                      <center>
                      <div id="page">
                        {{ $transfersAprove->links() }}
                      </div>
                    </center>

                </div>

              </div>





</div>
</div>

<!-- show modal dialog update status -->
@include('super_admin.transfer.modal_update')
@include('super_admin.transfer.modal_edit')
@include('super_admin.transfer.modal_delete')



<script type="text/javascript">

  $(document).ready(function(){
    $('#BAprove').click(function(e){
      $('#Aprove').show();
      $('#unAprove').hide();
      $('#page').show();
    });

    $('#BUnAprove').click(function(e){
      $('#Aprove').hide();
      $('#unAprove').show();
      $('#page').hide();
    });
    @foreach ($transfersAprove as $key => $transfer)
      $('#{{ $transfer->id }}').click(function(e){
        console.log($(this).val());
      });
    @endforeach


  $('#modal_update').appendTo("body");
  $('#modal_edit').appendTo("body");
  $('#modal_delete').appendTo("body");

  // onClick status centang untuk yang aproved
  $("body").on("click",".modal_update",function() {
      var id = $(this).attr('id');
      var stat = $(this).attr('value');
      console.log('Ini ID nya :'+stat);
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

  // onClick Edit untuk mengedit data Transfer
  $("body").on("click",".modal_edit",function() {
      var id = $(this).attr('data-id');
      var nominal = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
          //nominal = nominal.replace(".", "");
      var bank = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
      var keterangan = $(this).parent("td").prev("td").prev("td").prev("td").text();

      $("#modal_edit").find("input[name='nominal']").val(nominal);
      $("#modal_edit").find("input[name='bank']").val(bank);
      $("#modal_edit").find("textarea[name='keterangan']").val(keterangan);
      $("#modal_edit").find("form").attr("action","transfer/" + id);
  });

  //onClick Hapus untuk menghapus data transfer
  $("body").on("click",".modal_delete",function() {
      var id = $(this).attr('data-id');
      var nama = $(this).parent("td").prev("td").prev("td").text();

      $("#editP").text("Apakah anda yakin ingin menghapus data transfer yang dikirim oleh "+ nama);
      $("#modal_delete").find("form").attr("action","transfer/" + id);
  });



}); //document ready



</script>

<script src="{{ asset('js/rupiah.js') }}"></script>

@endsection
