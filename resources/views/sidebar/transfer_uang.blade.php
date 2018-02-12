@extends('admin_template.dashboard')

@section('content')
<div class="content">


<div class="container-fluid">



              <!-- do what you want to do -->
              <div class="card">
                                <div class="card-header" style="padding : 10px 20px 10px 20px">
                                    <h4 class="card-title">Transfer Uang</h4>
                                    <p class="card-category">
                                      Menu tranfer uang untuk memasukkan transaksi uang yang sudah di transfer ke Rekening BRI
                                    </p>
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
                                    <form action="transfer/store" method="POST">
                                      {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Nominal</label>
                                                    <input name="nominal" id="nominal" type="text" value="{{ old('nominal') }}" class="form-control" placeholder="Rp.">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>BANK</label>
                                                    <input name="bank" type="text" value="{{ old('keterangan') }}" class="form-control" placeholder="ex. BNI BRI">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <textarea name="keterangan" rows="4" cols="80" class="form-control" placeholder="Keterangan tambahan" >{{ old('keterangan') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>


</div>
</div>
<script src="{{ asset('js/rupiah.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){
    rupiah($('#nominal'));
  });
</script>
@endsection
