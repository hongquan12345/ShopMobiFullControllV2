<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormColorRequest;
use Illuminate\Contracts\Support\ValidatedData;

class ColorController extends Controller
{
    //
    public function index()
    {
        $colors = Color::all();

        return view('admin.colors.index',compact('colors')) ;
    }
    public function create()
    {
        return view('admin.colors.create');
    }
    public function store_color(FormColorRequest $request)
    {
        $ValidatedData = $request->validated();
        Color::create($ValidatedData);
        return redirect('adminpage/Colors')->with('message','Color Add Successfully');
    }
    public function edit_page_color(Color $color)
    {
        // return $color_id;
        return view('admin.colors.edit',compact('color'));
    }
    public function update_color(FormColorRequest $request,$color_id)
    {

        $ValidatedData = $request->validated();
        $ValidatedData['status'] = $request->status == true ?'1':'0';

        Color::Find($color_id)->update($ValidatedData);
        return redirect('adminpage/Colors')->with('message','Color Update Successfully');

    }
    public function destroycolor($color_id)
    {
        $color = Color::findOrFail($color_id);
        $color->delete();
        return redirect('adminpage/Colors')->with('message','Color Delete Successfully');

    }
}
