@extends('admin_template.dashboard')

@section('content')
<div class="content">


<div class="container-fluid">



              <!-- do what you want to do -->
              <div class="card">
                                <div class="card-header" style="padding : 10px 20px 10px 20px">
                                    <h4 class="card-title">Tarik Uang</h4>
                                    <p class="card-category">
                                      Menu tarik uang untuk mengambil uang dari ATM BRI
                                    </p>
                                </div>
                                <div class="card-body" style="padding : 10px 20px 10px 20px">
                                  @if(session('msg'))
                                    <div class="alert alert-success">
                                      {{ session('msg') }}
                                    </div>
                                  @endif
                                    <form action="tarik/store" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="nominal">Nominal</label>
                                                    <input type="text" name="nominal" class="form-control" placeholder="Rp." value="{{ old('nominal') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tujuan</label>
                                                    <fieldset name="tujuan" class="form-group" style="margin-left : 20px;">
                                                    <div class="form-check">
                                                      <label class="form-check-label">
                                                        <input type="radio" id="off" class="form-check-input" name="optionKeluarga" value="option1" checked>
                                                        Keperluan Keluarga
                                                      </label>
                                                    </div>
                                                    <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" id="on" class="form-check-input" name="optionPinjam" value="option2">
                                                        Keperluan Dipinjamkan
                                                      </label>
                                                    </div>

                                                  </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="kepada" style="display:none">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="kepada">Kepada Siapa</label>
                                                    <select name="kepada" class="form-control" id="select">
                                                      <option>1</option>
                                                      <option>2</option>
                                                      <option>3</option>
                                                      <option>4</option>
                                                      <option>5</option>
                                                    </select>
                                                  </div>
                                                </div>
                                            </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan</label>
                                                    <textarea rows="4" name="keterangan" cols="80" class="form-control" placeholder="Keterangan tambahan" >{{ old('keterangan') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="button" class="btn btn-info btn-fill pull-right">Submit</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>


</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#on').click(function(e){
      $('#kepada').slideDown();
    });

    $('#off').click(function(e){
      $('#kepada').slideUp();
      $("#select").val("");
    });
  });
</script>

@endsection
