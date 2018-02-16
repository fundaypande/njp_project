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

                      <div class="container">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Username</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>

                            @foreach ($users as $key => $user)
                            <?php
                              $role = 'member';
                              if( ($user->role)  == '0')
                                $role = 'admin';
                             ?>
                            <tr >
                              <td>{{++$key}}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->realemail }}</td>
                              <td><?php echo $role ?></td>
                              <td>
                                <input type="button" class="btn btn-danger modal_delete" data-id="{{ $user->id }}" data-toggle="modal" data-target="#modal_delete" name="" value="Hapus">
                              </td>
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

<!-- show modal dialog update status -->
@include('super_admin.user.modal_delete')
@include('modals.warning')




<script type="text/javascript">

$(document).ready(function(){

  $('#modal_delete').appendTo("body");
  $('#modal_warning').appendTo("body");

  //onClick Hapus untuk menghapus data transfer
  $("body").on("click",".modal_delete",function() {
      var id = $(this).attr('data-id');
      var jumlah = $(this).parent("td").prev("td").prev("td").prev("td").text();
      var role = $(this).parent("td").prev("td").text();
      console.log('ini role '+ role);
      if(role == 'admin'){
        $(this).attr('data-target', '#modal_warning');
        $('#titleModalWarning').text('Tidak Boleh Menghapus Admin');
        $('#pModal').text('Role admin tidak diperkenankan untuk dihapus');
      }

      $("#editP").text("Apakah anda yakin ingin menghapus User "+ jumlah);
      $("#modal_delete").find("form").attr("action","user/" + id);
  });



}); //document ready



</script>

<script src="{{ asset('js/rupiah.js') }}"></script>

@endsection
