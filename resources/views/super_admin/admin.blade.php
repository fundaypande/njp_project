@extends('admin_template.dashboard')

@section('content')
<div class="content">


<div class="container-fluid">



              <!-- do what you want to do -->
              <div class="row">
                <div class="col-md-3">
                  <a href="/kelola/user">
                  <div class="card">
                      <div class="card-header" style="padding : 10px 20px 10px 20px">
                          <h4 class="card-title">Data User</h4>
                          <p class="card-category">
                              Kelola Semua Data User
                          </p>
                      </div>
                          <div class="card-body" style="padding : 10px 20px 10px 20px">
                            <h1>Users</h1>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3">
                  <a href="/kelola/transfer">
                  <div class="card">
                      <div class="card-header" style="padding : 10px 20px 10px 20px">
                          <h4 class="card-title">Data Transfer</h4>
                          <p class="card-category">
                              Kelola Data Transfer
                          </p>
                      </div>
                          <div class="card-body" style="padding : 10px 20px 10px 20px">
                            <h1>Transfer</h1>
                        </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-3">
                  <a href="/kelola/tarik">
                  <div class="card">
                      <div class="card-header" style="padding : 10px 20px 10px 20px">
                          <h4 class="card-title">Tarik Uang</h4>
                          <p class="card-category">
                              Menu tarik uang untuk mengambil uang dari ATM BRI
                          </p>
                      </div>
                          <div class="card-body" style="padding : 10px 20px 10px 20px">
                            <h1>Tarik</h1>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-md-3">
                  <div class="card">
                      <div class="card-header" style="padding : 10px 20px 10px 20px">
                          <h4 class="card-title">Tarik Uang</h4>
                          <p class="card-category">
                              Menu tarik uang untuk mengambil uang dari ATM BRI
                          </p>
                      </div>
                          <div class="card-body" style="padding : 10px 20px 10px 20px">
                            <h1>Laporan</h1>
                        </div>
                    </div>
                </div>

              </div>



</div>
</div>

@endsection
