<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class FrontController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
        public function index()
        {
            $cats = Category::where('status',1)->get();
            $products = Product::latest('id')
                ->limit(3)
                ->where('status', 1)
                ->get();
            return view('front.index',compact('cats','products'));
        }
        public function contact()
        {
            return view('front.contact');
        }

        public function about()
        {
        return view('front.about');
        }

         public  function product($slug){
            $cat = Category::where('slug',$slug)->first();
            $products = Product::where('cat_id', $cat->id)->paginate(9);
            return view('front.products',compact('cat', 'products'));
         }

        public function category()
        {
            $cats = Category::all();
            return view('front.cats',compact('cats'));
        }

        public function more($id)
        {
          $product = Product::findOrFail($id);
        return view('front.more',compact('product'));

        }
        public function cooperation(){
            return view('front.cooperation');
        }

}
