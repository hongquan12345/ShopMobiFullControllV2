<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
     public function index()
    {
       
        return view('admin.category.index');
    }
    public function create()
    {
       
        return view('admin.category.create');
    }
    //make CategoryFormRequest with php artisan make:request CategoryFormRequest
    public function store(CategoryFormRequest $request)
    {
          $vaidatedData = $request->validated();

          $category = new Category;

          $category->name = $vaidatedData['name'];

          $category->slug = Str::slug($vaidatedData['slug']);

          $category->description = $vaidatedData['description'];

          if($request->hasFile('image'))
          {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();

            $filename =time().'.'.$ext;

            $file->move('uploads/Category/',$filename);

            $category->image = $filename;
          }
          

          $category->metal_title = $vaidatedData['metal_title'];
          $category->metal_keyword = $vaidatedData['metal_keyword'];
          $category->metal_description = $vaidatedData['metal_description'];

          $category->status = $request->status == true ? '1':'0';

          $category->save();

          return redirect('adminpage/Category')->with('message','Category added Successfully');
    }

    public function edit(Category $categorywithid)
    {
        return view('admin.category.edit',compact('categorywithid'));
    }
    public function update(CategoryFormRequest $request, $categorywithid)
    {
        $vaidatedData = $request->validated();
        $category = Category::findOrFail($categorywithid);

        //Code install

        $category->name = $vaidatedData['name'];

        $category->slug = Str::slug($vaidatedData['slug']);

        $category->description = $vaidatedData['description'];

        if($request->hasFile('image'))
        {
            $path = 'uploads/Category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
          $file = $request->file('image');

          $ext = $file->getClientOriginalExtension();

          $filename =time().'.'.$ext;

          $file->move('uploads/Category/',$filename);

          $category->image = $filename;
        }
        

        $category->metal_title = $vaidatedData['metal_title'];
        $category->metal_keyword = $vaidatedData['metal_keyword'];
        $category->metal_description = $vaidatedData['metal_description'];

        $category->status = $request->status == true ? '1':'0';

        $category->update();
        // $category->save();

        return redirect('adminpage/Category')->with('message','Category Update Successfully');
    }
}
    