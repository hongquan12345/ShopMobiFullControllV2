<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $productTotal = Product::count();
        $categoryTotal = Category::count();
        $BrandTotal = Brand::count();

        $accountTotal = User::count();
        $userTotal = User::where('role_as','0')->count();
        $AdminTotal = User::where('role_as','1')->count();

        $todayDate = Carbon::now()->format('d-m-Y');
        $MountDate = Carbon::now()->format('m');
        $YeahDate = Carbon::now()->format('Y');

        $orderTotal = Order::count();
        $ordertoday = Order::whereDate('created_at',$todayDate)->count();
        $orderMonth = Order::whereMonth('created_at',$MountDate)->count();
        $orderYear = Order::whereYear('created_at',$YeahDate)->count();



        return view('admin.dashboard',compact('orderTotal',

        'ordertoday','orderMonth','orderYear',
        'productTotal','BrandTotal','categoryTotal',
    'accountTotal','userTotal','AdminTotal'));
    }
}
