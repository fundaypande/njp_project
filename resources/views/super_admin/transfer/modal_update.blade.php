<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="simpleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Rubah Status Transfer</h4>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin ingin merubah status transfer?</p>
              <form action="" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <button type="button" data-dismiss="modal" id="cancel" class="btn btn-danger" name="cancel">Batal</button>
                <button type="submit" data-toggle="modal" data-target="#create-item" class="btn btn-primary crud-submit">Simpan</button>
              </form>
            </div>
        </div>
    </div>
</div>
