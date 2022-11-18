<!-- Modal -->
<div wire:ignore.self class="modal fade" id="brandAddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="brandAddModal">Add Brand</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>

      <div wire:loading>
        <div class="spinner-grow text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-success" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-danger" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-warning" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-light" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-dark" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>

      <div wire:loading.remove>
        <form wire:submit.prevent="storeBrand">
          <div class="modal-body">
            <div class="md-3">
              <label for="">Brand Name</label>
              <input type="text" class="form-control" style="border-color: rgb(130, 130, 172)" wire:model.defer="name">
              @error('name')<small class="text-danger">{{$message}}</small>@enderror
            </div>

            <div class="md-3">
              <label for="">Brand Slug</label>
              <input type="text" class="form-control" style="border-color: rgb(130, 130, 172)" wire:model.defer="slug">
              @error('slug')<small class="text-danger">{{$message}}</small>@enderror
            </div>
          </br>
            <div class="md-3">
              <label for="">Status</label>
              <input wire:model.defer="status" type="checkbox" />Checked=Hidden, Un-Checked= Visible
              @error('status')<small class="text-danger">{{$message}}</small>@enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" wire:click="closeModal" class="btn btn-secondary"
              data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


<!--Brand Update Modal -->
<div wire:ignore.self class="modal fade" id="brandupdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="brandupdateModal">Update Brand</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>

      <div wire:loading>
        <div class="spinner-grow text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-success" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-danger" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-warning" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-light" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-dark" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>

      <div wire:loading.remove></div>
      <form wire:submit.prevent="updateBrand">
        <div class="modal-body">
          <div class="md-3">
            <label for="">Brand Name</label>
            <input type="text" class="form-control" style="border-color: rgb(130, 130, 172)" wire:model.defer="name">
            @error('name')<small class="text-danger">{{$message}}</small>@enderror
          </div>
          <div class="md-3">
            <label for="">Brand Slug</label>
            <input type="text" class="form-control" style="border-color: rgb(130, 130, 172)" wire:model.defer="slug">
            @error('slug')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
        </br>
          <div class="md-3">
            <label for="">Status</label>
            <input wire:model.defer="status" type="checkbox" style="width:70px;height=70px" /> Checked=Hidden,
            Un-Checked= Visible
            @error('status')<small class="text-danger">{{$message}}</small>@enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>

    </div>
  </div>

</div>
<!--Brand Update Modal -->

<!--Brand Deleted Modal -->
<div wire:ignore.self class="modal fade" id="brandeDeletedModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="brandeDeletedModal">Xóa Brand</h1>
        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div wire:loading>
        <div class="spinner-grow text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-success" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-danger" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-warning" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-info" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-light" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
        <div class="spinner-grow text-dark" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
      <div wire:loading.remove></div>

      <form wire:submit.prevent="DestroyBrand">
        <div class="modal-body">
          <h4>Bạn có chắc muốn xóa Brand này không ?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary">Đúng, Xóa Nó</button>
        </div>
      </form>

    </div>
  </div>

</div>
<!--Brand Deleted Modal -->