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
                            </tr>
                          </thead>
                          <tbody style="display:none" id="unAprove">

                            @foreach ($transfersUnaprove as $key => $transfer)
                            <tr >
                              <td>{{++$key}}</td>
                              <td>{{ $transfer->created_at }}</td>
                              <td>{{ $transfer->nominal }}</td>
                              <td>{{ $transfer->bank }}</td>
                              <td>{{ $transfer->keterangan }}</td>
                              <td>{{ $transfer->user->name }}</td>
                              <td>
                                <input type="checkbox" value="{{ $transfer->id }}"></input>
                            </td>
                            </tr>
                            @endforeach
                          </tbody>
                            <tbody id="Aprove">


                            @foreach ($transfersAprove as $key => $transfer)
                            <tr >
                              <td>{{++$key}}</td>
                              <td>{{ $transfer->created_at }}</td>
                              <td>{{ $transfer->nominal }}</td>
                              <td>{{ $transfer->bank }}</td>
                              <td>{{ $transfer->keterangan }}</td>
                              <td>{{ $transfer->user->name }}</td>
                              <td>
                                <input type="checkbox" value="{{ $transfer->id }}" id="{{ $transfer->id }}" checked ></input>
                              </label>

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
  });

</script>

@endsection
