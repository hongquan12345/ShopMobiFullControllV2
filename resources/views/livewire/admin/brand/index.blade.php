<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row" style="background-color: rgb(199, 202, 205)">
        <div class="col-md-12">
            @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
            <div class="card-header">
                <h2 class="text-primary">
                    Brands List
                    <a href="#" class="btn btn-primary small float-end" data-bs-toggle="modal" data-bs-target="#brandAddModal">Add Brands</a>
                </h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped " style="background-color:rgb(222, 222, 234)">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($brands as $brand)
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->slug}}</td>
                            <td>
                                @if($brand->category_in_brands)
                                {{$brand->category_in_brands->name}}
                                @else
                                     No Category
                                @endif
                            </td>
                            <td>{{$brand->status == '1' ? 'hidden' : 'visible'}}
                            </td>
                            <td>
                                    <a href="#" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#brandupdateModal" class ="btn btn-sm btn-success">Edit</a>
                                    <a href="" wire:click="DeleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#brandeDeletedModal" class ="btn btn-sm btn-danger">Delete</a>
                            </td>

                        </tr>
                        @empty
                             <tr>
                                <td colspan="5">No Brand Found</td>
                             </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{$brands->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')

<script>
    window.addEventListener('close-modal',event=>
    {
        $('#brandAddModal').modal('hide');
        $('#brandupdateModal').modal('hide');
        $('#brandeDeletedModal').modal('hide');
    })
</script>

@endpush
