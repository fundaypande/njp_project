<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="simpleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Hapus Data</h4>
            </div>
            <div class="modal-body">
              <p id="editP">Apakah anda yakin ingin menghapus?</p>
              <form action="" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button type="button" data-dismiss="modal" id="cancel" class="btn btn-primary" name="cancel">Batal</button>
                <button type="submit" id="hapus" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger remove-item">Hapus</button>
              </form>
            </div>
        </div>
    </div>
</div>
