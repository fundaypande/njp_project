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

                      <div class="container" style="overflow-x:auto;">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>No</th>

                              <th>Tanggal</th>
                              <th>Nominal</th>
                              <th>Bank</th>
                              <th>Keterangan</th>
                              <th>Pengirim</th>
                            </tr>
                          </thead>

                            <tbody id="Aprove">


                            @foreach ($transfers as $key => $transfer)
                            <tr >
                              <td>{{++$key}}</td>

                              <td>{{ $transfer->created_at }}</td>
                              <td class="nominal"><?php echo rupiah(  $transfer->nominal  ); ?></td>
                              <td>{{ $transfer->bank }}</td>
                              <td>{{ $transfer->keterangan }}</td>
                              <td>{{ $transfer->user->name }}</td>

                              <td>

                              </td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                      <center>
                      <div id="page">
                        {{ $transfers->links() }}
                      </div>
                    </center>

                </div>

              </div>





</div>
</div>

@endsection
