@extends('layouts.adminpage')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <h4 class="alert alert-success mb-2">{{ session('message') }}</h4>
                @endif
            <div class="card-header">
                <h3> EDIT Products
                    <a href="{{ url('adminpage/Products') }}" class="btn btn-primary btn-sm text-white float-end">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class = "alert alert-warning">
                        @foreach ($errors->all() as $error )
                                <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('adminpage/Products/'.$product->id) }}" method="POST" enctype="multipart/form-data"
                    style="background-color:rgb(222, 222, 234)">
                    @csrf
                    @method('PUT')
                    <h1>This is Edit Product Form</h1>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane"
                                type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane"
                                type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane"
                                type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Product Image
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane"
                                type="button" role="tab" >
                                Product Color
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            <div class="md-3">
                                <br>
                                <label for="">Category </label>
                                <select name="category_id" class="form-select" aria-label="Disabled select example" enabled>
                                    @foreach ($categories as $cateogry)
                                        <option value="{{ $cateogry->id }}"{{$cateogry->id == $product->category->id ? 'seleted' :''}}>
                                            {{ $cateogry->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="md-3">
                                <label>Product Name</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                            </div>
                            <br>
                            <div class="md-3">
                                <label>Product Slug</label>
                                <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                            </div>
                            <br>
                            <div class="md-3">
                                <label for="">Brand</label>
                                <select name="brand" class="form-select" aria-label="Disabled select example" enabled>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}" {{$brand->name == $product->brand ? 'seleted' :''}}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                            <div class="md-3">
                                <label>{Small description(500 words)</label>
                                <textarea type="text" name="small_description" class="form-control" rows="4"> {{ $product->small_description }}</textarea>
                            </div>
                            <br>
                            <div class="md-3">
                                <label>{Description</label>
                                <textarea type="text" name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel"
                            aria-labelledby="seotag-tab"tabindex="0">
                            <div class="md-3">
                                <label>Meta Title</label>
                                <input type="text" name="metal_title" value="{{$product->metal_title}}" class="form-control">
                            </div>
                            <div class="md-3">
                                <label>Meta Description</label>
                                <textarea type="text" name="metal_description"  class="form-control" rows="4">{{ $product->metal_keyword }}</textarea>
                            </div>
                            <div class="md-3">
                                <label>Meta Keysword</label>
                                <textarea type="text" name="metal_keyword"  class="form-control" rows="4">{{ $product->metal_description }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="detail-tab-pane" role="tabpanel"
                            aria-labelledby="detail-tab"tabindex="0">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="md-4">
                                        <label>Original Price</label>
                                        <input type="text" name="original_price" value="{{$product->original_price}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-4">
                                        <label>Selling Price</label>
                                        <input type="text" name="selling_price" value="{{$product->selling_price}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-4">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6" style="text-align: center">

                                    <div class="md-6">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" {{$product->trending == '1' ? 'checked' :''}} style="width: 50px; height:50px">
                                    </div>
                                </div>

                                <div class="col-md-6" style="text-align: center">

                                    <div class="md-6">
                                        <label>Status</label>
                                        <input type="checkbox" name="status" {{$product->status == '1' ? 'checked' :''}}  style="width: 50px; height:50px">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                            tabindex="0">
                            <div class="md-3">
                                <label for="">UpLoad Product Image</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                            <div>
                                @if ($product->productImage)
                                <div class="row">
                                    @foreach ($product->productImage as $image)
                                    <div class="col-md-2">
                                        <img src="{{ asset($image->image) }}" style="width:80px;height:80px;" class="me-4 border" alt="img">
                                        <a href="{{ url('adminpage/Products-Image/'.$image->id.'/delete') }}" class="d-block">Remove </a>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <h5>No Image Added</h5>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" tabindex="0">
                            <div class="md-3">
                                <h4>Add Product Color</h4>
                                <label for="">Select CRUD Color</label>
                                <hr/>
                                <div class="row">
                                    @forelse ( $colors as $coloritem)
                                    <div class="col-md-3">
                                        <div class="p-2 border border-2 mb-3">
                                            Color : <input type="checkbox" name="colors[]" value="{{ $coloritem->id }}">{{ $coloritem->name }}
                                            <br/>
                                            Quantity : <input type="number" name="color_quantity[]" style="width:70px border:1px"/>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-3">
                                        No Colors found
                                    </div>
                                    @endforelse
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Color Name</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($product->productColors as $proDColor)
                                        <tr class="prod-color-tr">
                                            <td>
                                                @if ($proDColor->color)
                                                {{$proDColor->color->name}}
                                                @else
                                                No Color Found
                                                @endif
                                            </td>

                                            <td>
                                                <div class="input-group mb-3" style="width:150px">
                                                    <input type="text" value="{{ $proDColor->quantity}}" class="productColorquantity form-control form-control-sm">
                                                    <button type="button" value="{{ $proDColor->id}}"  class="updateProducColorbtn btn btn-primary btn-sm text-white">Update</button>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" value="{{ $proDColor->id}}" class="deleteProducColorbtn btn btn-danger btn-sm text-white">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="py-2 float-end">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



        $(document).on('click','.updateProducColorbtn',function(){

            var product_id ="{{ $product->id }}";
            var prod_color_id = $(this).val();
            var qty = $(this).closest('.prod-color-tr').find('.productColorquantity').val();

            // alert(prod_color_id);
            if(qty<=0)
            {
                alert('Quantity is required');
                return false;
            }
            var data ={
                'product_id':product_id,
                'prod_color_id':prod_color_id,
                'qty':qty
            };
            $.ajax({
                type: "POST",
                url: "/adminpage/product-color/"+prod_color_id,
                data: data,
                success: function(response){
                    alert(response.message)
                }
            });
        });
        $(document).on('click','.deleteProducColorbtn',function(){
            var prod_color_id = $(this).val();
            var thisClick =$(this);
            // thisClick.closest('.prod-color-tr').remove();
            $.ajax({
                type: "GET",
                url: "/adminpage/product-color/"+prod_color_id+"/delete",
                success: function(response){
                          thisClick.closest('.prod-color-tr').remove();
                        alert(response.message);
                }
            });
        });

    });
</script>
@endsection
