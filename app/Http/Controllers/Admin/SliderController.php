<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }
    public function create()
    {

        return view('admin.sliders.create');
    }
    public function store_sliders(SliderRequest $request)
    {

        $validateData = $request->validated();
        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validateData['image'] = "uploads/slider/$filename";

            $validateData['status'] = $request->status == true ? '1' : '0';
            Slider::create([
                    'title' => $validateData['title'],
                    'description' => $validateData['description'],
                    'image' => $validateData['image'],
                    'status' => $validateData['status'],
                ]);
        }
        else
        {
            $validateData['status'] = $request->status == true ? '1' : '0';
            Slider::create([
                    'title' => $validateData['title'],
                    'description' => $validateData['description'],
                    'image' => asset('/emptyimage.jpg'),
                    'status' => $validateData['status'],
                ]);
        }   
        
        return redirect('adminpage/Sliders')->with('message', 'Slider is Add Successfully');
    }
    public function edit_slider(Slider $slider_id)
    {
        return view('admin.sliders.edit', compact('slider_id'));
    }
    public function update_slider(SliderRequest $request, Slider $slider_id)
    {
    //    return $slider_id;
        $validateData = $request->validated();
        if ($request->hasFile('image'))
        {
            $destination = $slider_id->image;
            if (File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validateData['image'] = "uploads/slider/$filename";
        }
        $validateData['status'] = $request->status == true ? '1' : '0';
        Slider::where('id',$slider_id->id)->update([
            'title' => $validateData['title'],
            'description' => $validateData['description'],
            'image' => $validateData['image'] ?? $slider_id->image,
            'status' => $validateData['status'],
        ]);
        return redirect('adminpage/Sliders')->with('message', 'Slider is Add Successfully');

    }
    public function destroySlider( Slider $slider_id)
    {
        if($slider_id->count() >0){
            $destination = $slider_id->image;
            if (File::exists($destination))
            {
                File::delete($destination);
            }
            $slider_id->delete();
            return redirect('adminpage/Sliders')->with('message', 'Slider Delete Successfully');
        }
        return redirect('adminpage/Sliders')->with('message', 'Some thing Wrong');
    }
}
