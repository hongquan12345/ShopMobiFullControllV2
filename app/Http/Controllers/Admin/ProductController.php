<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;
use App\Models\Color;
use App\Models\ProductColors;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status','0')->get();
        return view('admin.products.create', compact('categories', 'brands','colors'));
    }
    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        $category = Category::findOrFail($validatedData['category_id']);
        $product = $category->products_in_category()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending ==true ?'1':'0',
            'status' => $request->status ==true ?'1':'0',
            'metal_title' => $validatedData['metal_title'],
            'metal_description' => $validatedData['metal_description'],
            'metal_keyword' => $validatedData['metal_keyword'],

                ]);

                if($request->hasFile('image'))
                        {
                            $uploadPath = 'uploads/products/';
                            $i=1;
                            foreach($request->file('image') as $imageFile)
                        {
                                $extention = $imageFile->getClientOriginalExtension();
                                $filename = time().$i++.'.'.$extention;
                                $imageFile->move($uploadPath,$filename);
                                $finalImagePathName = $uploadPath.$filename;

                                $product->productImage()->create([
                                    'product_id' => $product->id,
                                    'image' => $finalImagePathName,
                        ]);

                    }
                }
                else
                {
                    $product->productImage()->create([
                        'product_id' => $product->id,
                        'image' => asset('/emptyimage.jpg'),
                    ]);
                }

                if($request->colors)
                {
                    foreach($request->colors as $key => $color)
                    {
                        $product->productColors()->create([
                            'product_id' => $product->id,
                            'color_id'=> $color,
                            'quantity'=> $request ->color_quantity[$key] ?? 0
                        ]);
                    }
                }
            return redirect('/adminpage/Products')->with('message','Product Added Succesfully');

    }
    public function edit(int $product_with_ID)
    {


        $categories = Category::all();

        $brands = Brand::all();

        $product = Product::findOrFail($product_with_ID);

        $product_color = $product->productColors->pluck('color_id')->toArray();

        $colors = Color::whereNotIn('id',$product_color)->get();
        return view('admin.products.edit',compact('categories', 'brands','product','colors'));
    }
    public function updateProduct(ProductFormRequest $request, int $product_with_ID)
    {
        $validatedData = $request->validated();
        // $categorys = Category::findOrFail($validatedData['category_id']);
        $product = Product::where('id', $product_with_ID)->first();
        // ->products_in_category()->where('id',$product_with_ID)->first();

        // Category::findOrFail($validatedData['category_id'])

        if ($product)
        {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request->trending ==true ?'1':'0',
                'status' => $request->status ==true ?'1':'0',
                'metal_title' => $validatedData['metal_title'],
                'metal_description' => $validatedData['metal_description'],
                'metal_keyword' => $validatedData['metal_keyword'],
            ]);

            if($request->hasFile('image'))
                        {
                            $uploadPath = 'uploads/products/';
                            $i=1;
                            foreach($request->file('image') as $imageFile)
                        {
                                $extention = $imageFile->getClientOriginalExtension();
                                $filename = time().$i++.'.'.$extention;
                                $imageFile->move($uploadPath,$filename);
                                $finalImagePathName = $uploadPath.$filename;
                                $product->productImage()->create([
                                    'product_id' => $product->id,
                                    'image' => $finalImagePathName,
                                ]);

                    }
            }
            if($request->colors)
                {
                    foreach($request->colors as $key => $color)
                    {
                        $product->productColors()->create([
                            'product_id' => $product->id,
                            'color_id'=> $color,
                            'quantity'=> $request ->color_quantity[$key] ?? 0
                        ]);
                    }
                }

            return redirect('/adminpage/Products')->with('message','Product Update Succesfully');
        }
        else
        {
            return redirect('/adminpage/Products')->with('message','No Such Product ID Found');
        }
    }
    public function destroyImage(int $product_image_id)
        {
            $productImg = ProductImage::findOrFail($product_image_id);
            if(File::exists($productImg->image))
            {
                File::delete($productImg->image);
            }
            $productImg->delete();
            return redirect()->back()->with('message','Product Image Deleted');
        }
    public function destroyProduct(int $product_with_ID)
    {
        $product = Product::findOrFail($product_with_ID);
        if( $product->productImage())
        {
                foreach($product->productImage as $image)
                {
                    if(File::exists($image->image))
                        {
                            File::delete($image->image);
                        }
                }
        }
        $product->delete();
        return redirect()->back()->with('message','Product  Deleted Succesfully');
    }
    public function updateProdQty(Request $request, $prod_color_id)
    {


            $productColorData = Product::findOrFail($request->product_id)->productColors()->where('id',$prod_color_id)->first();

            $productColorData->update(['quantity'=>$request->qty]);

             return response()->json(['message' =>'Product Color Qty updated']);

    }
    public function deleteProdQtyColor($prod_color_id)
    {
        $prodColor = ProductColors::findOrFail($prod_color_id);
        $prodColor->delete();
        return response()->json(['message' =>'Product Color Qty Deleted']);


    }
}
