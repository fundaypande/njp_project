@extends('admin_template.dashboard')

@section('content')
<div class="content">
<div class="container-fluid">
              <!-- do what you want to do -->
              <div class="row">
                <div class="col-md-12">
                  @if(session('msg'))
                    <div class="alert alert-danger">
                      {{ session('msg') }}
                    </div>
                  @endif
                  <a href="#">
                  <div class="card">
                      <div class="card-header" style="padding : 10px 20px 10px 20px">
                          <h4 class="card-title">Total Dana Terhimpun (Sampai Saat Ini)</h4>
                          <p class="card-category">
                              Menampilkan seluruh total swadaya yang ada direkening BRI sampai saat ini
                          </p>
                      </div>
                          <div class="card-body" style="padding : 10px 20px 10px 20px">
                            <h1><b>Rp. {{ rupiah($realTotal) }}</b></h1>
                        </div>
                    </div>
                    </a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">

                  <div class="card">
                      <div class="card-header" style="padding : 10px 20px 10px 20px">
                          <h4 class="card-title">Pemasukkan Total Rp.{{ rupiah($allTransfer -> sum('nominal')) }}  (Untuk Tahun Ini)</h4>
                          <p class="card-category">
                              Menampilkan data pemasukkan yang ditransfer oleh anggota per tahun ini
                          </p>
                      </div>
                          <div class="card-body" style="padding : 10px 20px 10px 20px">
                            <div style="overflow-x:auto;">


                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Pengirim</th>
                                  <th>Nominal</th>
                                </tr>
                              </thead>
                              <tbody id="unAprove">

                                @foreach ($allTransfer as $key => $transfer)

                                <tr >
                                  <td>{{++$key}}</td>
                                  <td>{{ $transfer->created_at }}</td>
                                  <td>{{ $transfer->user->name }}</td>
                                  <td class="nominal"><?php echo rupiah(  $transfer->nominal  ); ?></td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                                    <hr>
                                    <div style="margin: 0px 10px 10px 10px" class="stats">
                                        <a href="home/transfer"><button type="button" name="button" class="btn btn-primary">Lihat Selengkapnya</button></a>
                                    </div>
                                </div>
                    </div>

                </div>
                <div class="col-md-6">

                  <div class="card">
                      <div class="card-header" style="padding : 10px 20px 10px 20px">
                          <h4 class="card-title">Pengeluaran Total Rp.{{ rupiah($allTarik -> sum('nominal')) }}  (Untuk Tahun Ini) </h4>
                          <p class="card-category">
                              Menampilkan data pengeluaran yang digunakan untuk keperluan tertentu untuk tahun ini
                          </p>
                      </div>
                          <div class="card-body" style="padding : 10px 20px 10px 20px">
                            <div style="overflow-x:auto;">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal</th>
                                  <th>Tujuan</th>
                                  <th>Nominal</th>
                                </tr>
                              </thead>
                              <tbody id="unAprove">

                                @foreach ($allTarik as $key => $tarik)

                                <tr >
                                  <td>{{++$key}}</td>
                                  <td>{{ $tarik->created_at }}</td>
                                  <td>{{ $tarik->keterangan }}</td>
                                  <td class="nominal"><?php echo rupiah(  $tarik->nominal  ); ?></td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="card-footer ">
                                    <hr>
                                    <div style="margin: 0px 10px 10px 10px" class="stats">
                                        <a href="home/tarik"><button type="button" name="button" class="btn btn-primary">Lihat Selengkapnya</button></a>
                                    </div>
                                </div>
                    </div>

                </div>
                </div>
                <div class="row">


                <div class="col-md-8">

                  <div class="card">
                      <div class="card-header" style="padding : 10px 20px 10px 20px;">
                          <h4 class="card-title">Grafik Data Transfer Per Anggota</h4>
                          <p class="card-category">
                              Menampilkan persentasi total transfer yang dimiliki masing-masing anggota
                          </p>
                      </div>
                      <div class="card-body" style="padding : 10px 20px 10px 20px">
                        <div class="row">
                          <div class="col-md-7">
                            <div class="ct-chart ct-perfect-fourth" style="height: 500px"></div>
                          </div>
                          <div class="col-md-5">
                            <h4>Legenda</h4>
                            <ul>
                              @foreach($trans as $key => $transf)
                                  <li class="legend{{ ++$key }}">{{$transf -> user -> name}}</li>
                              @endforeach
                            </ul>
                          </div>

                        </div>

                      </div>


                    </div>

                </div>

                <div class="col-md-4">
                  <div class="card">
                      <div class="card-header" style="padding : 10px 20px 10px 20px">
                          <h4 class="card-title">Ranking Dana Terbanyak</h4>
                          <p class="card-category">
                              Rangking terbanyak yang memiliki uang di tabungan
                          </p>
                      </div>
                          <div class="card-body" style="padding : 10px 20px 10px 20px">
                            <ol>
                              @foreach($rank as $key => $ranks)
                                  <a href="profile/{{$ranks -> user_id}}"><li class="rank">{{$ranks -> user -> name}}</li></a>
                              @endforeach
                            </ol>
                        </div>
                        <div class="card-footer ">
                                    <hr>
                                    <div style="margin: 0px 10px 10px 10px" class="stats">
                                        <a href="home/rank"> <button type="button" name="button" class="btn btn-primary">Lihat Selengkapnya</button></a>
                                    </div>
                                </div>
                    </div>
                </div>
</div>
</div>

<script type="text/javascript">

$.ajax({
  url: "/data",
  //force to handle it as text
  dataType: "text",
  success: function(member) {

      var json = $.parseJSON(member);
      console.log(json.member);
      var data = {
        series:
          json.member
      };

      var options = {
          width: undefined,
          height: undefined
        };

      var sum = function(a, b) { return a + b };

      new Chartist.Pie('.ct-chart', data, options, {
        labelInterpolationFnc: function(value) {
          return Math.round(value / data.series.reduce(sum) * 100) + '%';
        }
      });
  }
});







</script>

@endsection
