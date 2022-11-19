@extends('layouts.adminpage')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h3> Products
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

                <form action="{{ url('adminpage/Products') }}" method="POST" enctype="multipart/form-data"
                    style="background-color:rgb(222, 222, 234)">
                    @csrf
                    <h1>This is Add Product Form</h1>
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
                                type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                                Product CRUD Color
                            </button>
                        </li>


                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            <div class="md-3">
                                <label for="">Category </label>
                                <select name="category_id" class="form-select" aria-label="Disabled select example" enabled>
                                    @foreach ($categories as $cateogry)
                                        <option value="{{ $cateogry->id }}">{{ $cateogry->name }}</option>
                                    @endforeach
                                </select>
                                <hr />
                            </div>
                            <div class="md-3">
                                <label>Product Name</label>
                                <input type="text" name="name" class="form-control">
                                <hr/>
                            </div>
                            <div class="md-3">
                                <label>Product Slug</label>
                                <input type="text" name="slug" class="form-control">
                                <hr/>
                            </div>
                            <div class="md-3">
                                <label for="">Brand</label>
                                <select name="brand" class="form-select" aria-label="Disabled select example" enabled>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>

                                <hr/>
                            </div>
                            <div class="md-3">
                                <label>Small description(500 words)</label>
                                <textarea type="text" name="small_description" class="form-control" rows="4"></textarea>
                                <hr/>
                            </div>
                            <div class="md-3">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" rows="4"></textarea>
                                <hr/>
                            </div>
                        </div>

                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel"
                            aria-labelledby="seotag-tab"tabindex="0">
                            <div class="md-3">
                                <label>Meta Title</label>
                                <input type="text" name="metal_title" class="form-control">
                                <hr/>
                            </div>
                            <div class="md-3">
                                <label>Meta Description</label>
                                <textarea type="text" name="metal_description" class="form-control" rows="4"></textarea>
                                <hr/>
                            </div>
                            <div class="md-3">
                                <label>Meta Keysword</label>
                                <textarea type="text" name="metal_keyword" class="form-control" rows="4"></textarea>
                                <hr/>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="detail-tab-pane" role="tabpanel"
                            aria-labelledby="detail-tab"tabindex="0">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="md-4">
                                        <label>Original Price</label>
                                        <input type="text" name="original_price" class="form-control">
                                        <hr/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-4">
                                        <label>Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control">
                                        <hr/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-4">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" class="form-control">
                                        <hr/>
                                    </div>
                                </div>

                                <div class="col-md-6" style="text-align: center">

                                    <div class="md-6">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" style="width: 50px; height:50px">
                                    </div>
                                </div>

                                <div class="col-md-6" style="text-align: center">

                                    <div class="md-6">
                                        <label>Status</label>
                                        <input type="checkbox" name="status" style="width: 50px; height:50px">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                            tabindex="0">
                            <div class="md-3">
                                <label for="">UpLoad Product Image</label>
                                <br>
                                <input type="file" name="image[]" multiple class="form-control">
                                <hr/>
                            </div>
                        </div>

                        <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                            tabindex="0">
                            <div class="md-3">
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
                        </div>

                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
