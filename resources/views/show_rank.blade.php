@extends('admin_template.dashboard')

@section('content')

<div class="content">


<div class="container-fluid">



              <!-- do what you want to do -->
              <div class="row">

                  <div class="card" style="padding : 20px">
                    <h4 class="card-title">Data User</h4>
                    <p class="card-category">
                        Menampilkan Seluruh Data User Yang Telah Terdaftar
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

                      <div class="container" style="overflow-x:auto;">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Username</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Total Dana</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach ($users as $key => $user)

                              <tr >
                                <td>{{++$key}}</td>
                                <td><a href="/profile/{{ $user -> user_id }}">{{ $user -> user ->email }}</a></td>
                                <td>{{ $user-> user -> name }}</td>
                                <td>{{ $user-> user -> realemail }}</td>
                                <td>{{ rupiah($user-> sum) }}</td>

                              </tr>

                            @endforeach
                          </tbody>

                        </table>
                      </div>
                      <center>
                      <div id="page">
                        {{ $users->links() }}
                      </div>
                    </center>

                </div>

              </div>





</div>
</div>

@endsection
