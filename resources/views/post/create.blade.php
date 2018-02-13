<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="simpleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titleModal">Simple Modal</h4>
            </div>
            <div class="modal-body">
              <form action="/posts">
                {{ csrf_field() }}
                <input type="text" name="title" value="">
                <textarea name="details" rows="8" cols="60"></textarea>
                <button type="submit" data-toggle="modal" data-target="#create-item" class="btn btn-primary crud-submit">Simpan</button>
              </form>
            </div>
        </div>
    </div>
</div>
