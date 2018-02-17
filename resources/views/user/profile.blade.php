@extends('admin_template.dashboard')

@section('content')
<div class="content">


<div class="container-fluid">



              <!-- do what you want to do -->
              <div class="card">
                                <div class="card-header" style="padding : 10px 20px 10px 20px">
                                    <h4 class="card-title">Profil Page</h4>
                                </div>
                                <div class="card-body" style="padding : 10px 20px 10px 20px">
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

                                    <div class="row">
                                      <div class="col-md-3">
                                        <?php
                                          if($users -> gambar == null){
                                            $url = 'image.png';
                                          } else {
                                            $url = $users -> gambar;
                                          }
                                         ?>
                                        <div class="profile-image" style="padding: 0px 20px 20px 20px">
                                          <img src="{!! asset('gambar/' . $url) !!}" width="100%" alt="">

                                        </div>
                                        <div id="change-pic">
                                        <form action="profile/pic/{{ $users -> id }}" enctype="multipart/form-data" method="POST">
                                          <div class="print-img" style="display:none">
                                            <img src="" style="height:300px;width:500px">
                                          </div>
                                          {{ csrf_field() }}
                                          <input type="hidden" name="_method" value="PUT">
                                        	<div class="alert alert-danger print-error-msg" style="display:none">
                                            <ul></ul>
                                          </div>
                                        <input type="file" name="gambar" class="form-control">
                                        <div class="form-group">
                                            <button style="width: 100%; margin-top:5px;" class="btn btn-success upload-image" type="submit">Ubah Gambar</button>
                                          </div>
                                        </form>
                                        </div>
                                      </div>
                                      <div class="col-md-9">
                                        <form action="{{ URL('profile/'. $users -> id )}}" method="POST">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="_method" value="PUT">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input name="username" id-login="{{ Auth::user()->id }}" data-id="{{ $users -> id }}" id="username" type="text" value="{{ $users -> email }}" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input id="name" name="name" type="text" value="{{ $users -> name }}" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input id="email" name="realemail" type="text" value="{{ $users -> realemail }}" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <h4>Total Dana Rp. <?php echo rupiah( $total ); ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <button style="display : none" id="btn-edit" type="submit" class="btn btn-info btn-fill pull-right">Edit Profile</button>
                                            <div class="clearfix"></div>
                                        </form>
                                      </div>
                                    </div>
                                </div>
                            </div>


</div>
</div>
<script src="{{ asset('js/rupiah.js') }}"></script>
<script type="text/javascript">

    var idUser = $('#username').attr('data-id');
    var idUserLogin = $('#username').attr('id-login');
    console.log(idUserLogin);

    //user yang login dapat mengedit profile
    //tapi tidak profile orang lain
    if(idUser == idUserLogin){
      $('#btn-edit').show();
      console.log('HIDE BROOO');
      $('#username').prop('disabled', 'true');
    } else {
      $('#username').prop('disabled', 'true');
      $('#email').prop('disabled', 'true');
      $('#name').prop('disabled', 'true');
      $('#change-pic').hide();
    }

</script>
@endsection
