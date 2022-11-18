<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/adminpage/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-coin menu-icon"></i>
          <span class="menu-title">Sales</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-Category" aria-expanded="false" aria-controls="ui-Category">
          {{-- <i class="mdi mdi-circle-outline menu-icon"></i> --}}
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-Category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/adminpage/Category/create')}}">Add Catagory</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/adminpage/Category')}}">View Catagory</a></li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-cellphone menu-icon"></i>
          <span class="menu-title">Product</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/adminpage/Products/create')}}">Add Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/adminpage/Products')}}">View Product</a></li>
          </ul>
        </div>
      </li>

  
      
      <li class="nav-item">
        <a class="nav-link" href="{{url('/adminpage/brands')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Brand</span>
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>

    </ul>
  </nav>