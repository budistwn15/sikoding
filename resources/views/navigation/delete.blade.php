<!-- Button trigger modal -->
<div class="row">
    <div class="col-md-3">
        <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#hapus">
            Are you sure ?
          </button>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
            <div class="d-flex justify-content-between">
                <div class="w-100">
                    <form action="{{ route('navigation.delete', $navigation) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-block">Yes</button>
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
