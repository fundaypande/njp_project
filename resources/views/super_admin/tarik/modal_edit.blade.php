<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="simpleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Edit Tarik</h4>
            </div>
            <div class="modal-body">
              <p>Form untuk melakukan edit tarik</p>
              <form action="" method="POST">
                {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
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
                              <label>Tujuan</label>
                              <input name="tujuan" type="text" value="{{ old('tujuan') }}" class="form-control" placeholder="ex. BNI BRI">
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
                  <button type="button" data-dismiss="modal" id="cancel" class="btn btn-danger" name="cancel">Batal</button>
                  <button type="submit" data-toggle="modal" data-target="#edit-item" class="btn btn-info btn-fill pull-right">Submit</button>
                  <div class="clearfix"></div>
              </form>
            </div>
        </div>
    </div>
</div>
