<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Order;
use App\Product;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $order_count = Order::where('view',false)->count();
        $product_count = Product::where('status',1)->count();
        $cat_count = Category::count();
        return view('admin.index',compact('order_count','product_count','cat_count'));
    }

}
