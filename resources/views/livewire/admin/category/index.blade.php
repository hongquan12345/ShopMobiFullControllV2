{{-- Modal --}}
<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>  
    
            <form wire:submit.prevent="destroyCategory">
                <div class="modal-body">
                    <h6>Are you sure, you want to delete this Category ?</h6>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Yes. Delete Now</button>
                   </div>
            </form>
    
          </div>
        </div>
      </div>


{{-- Modal --}}
    <div class="row"  style="background-color: rgb(199, 202, 205)"> 
        <div class="col-md-12">
        @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
        <div class="card-header">
            <h3>Category
                {{-- url chu y chu hoa chu thuong --}}
                <a href="{{url('adminpage/Category/create')}}" class ="btn btn-primary btn-sm float-end">Add Category</a>
            </h3>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered table-striped" style="background-color:rgb(222, 222, 234)" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image Icon</th>
                    <th>Status</th>
                    <th>Action</th>
                        
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($categories as $catagory )
                <tr>
                    <td>{{$catagory->id}}</td>
                    <td>{{$catagory->name}}</td>
                    <td>
                        <img src="{{asset('/uploads/Category/'.$catagory->image)}}" width="80px" height="80px" alt="Category image">
                    </td>
                    <td>{{$catagory->status == '1' ? 'Hidden':'Visible'}}</td>
                    <td>
                        <a href="{{url('adminpage/Category/'.$catagory->id.'/edit')}}" class="btn btn-success">Edit</a>
                        <a href="#" wire:click="deleteCatagory({{$catagory->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach --}}
                @forelse ($categories as $catagory )
                <tr>
                    <td>{{$catagory->id}}</td>
                    <td>{{$catagory->name}}</td>
                    <td>
                        <img src="{{asset('/uploads/Category/'.$catagory->image)}}" width="80px" height="80px" alt="Category image">
                    </td>
                    <td>{{$catagory->status == '1' ? 'Hidden':'Visible'}}</td>
                    <td>
                        <a href="{{url('adminpage/Category/'.$catagory->id.'/edit')}}" class="btn btn-success">Edit</a>
                        <a href="#" wire:click="deleteCatagory({{$catagory->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No Category Found</td>
                 </tr>
                @endforelse

            </tbody>
            </table>
            <div>
                {{$categories->links()}}
            </div>
        </div>
        </div>
    </div>
</div>
@push('script')

<script>
    window.addEventListener('close-modal',event=>
    {
        $('#deleteModal').modal('hide');
    })
</script>
    
@endpush