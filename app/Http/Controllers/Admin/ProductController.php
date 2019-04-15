<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::paginate(8);
        return view('admin.product.index',compact('products'));
    }
    public  function  create(){
        $cats = Category::all();
        return view('admin.product.create',compact('cats'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|min:5 |max: 255',
            'body' =>'required|min:10',
            'image' => 'required|image',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $name =  date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/products/'), $name);
        $image = 'uploads/products/'.$name;


            $n = new  Product() ;
            $n->title = $request->title;
            $n->slug = str_slug($request->title);
            $n->cat_id = $request->cat_id;
            $n->body = $request->body;
            $n->status = ($request->status == 1) ? 1 : 0;
            $n->locale = $request->get('locale');
            $n->image = $image;
            $n->save();
            if (!$n->save()) {
                return back()->with('danger','Product not saved!');
            }
            else
                return redirect('admin/product')->with('success','Product saved!');

    }


    public  function edit($id){
        $cats = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.update',compact('product','cats'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title' => 'required|min:5 |max: 255',
            'body' =>'required|min:10',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $n = Product::findOrFail($id);
        $old = $n->image;
        if ($request->hasFile('image')){
            (file_exists($old))? unlink($old):'';

            $name =  date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
            $upload =  $request->image->move(public_path('uploads/products/'), $name);
            if(!$upload)
                return back()->with('danger','Изображение не может быть загружено!');
            else
                $image = 'uploads/products/'.$name;

        }
        else   $image = $old;


        if (!empty($image)) {

            $n->title = $request->title;
            $n->slug = str_slug($request->title);
            $n->cat_id = $request->cat_id;
            $n->body = $request->body;
            $n->status = ($request->status == 1) ? 1 : 0;
            $n->locale = $request->get('locale');
            $n->image = $image;
            $n->save();
            if (!$n->save()){
                (file_exists($image))? unlink($image):'';
                return back()->with('danger','Cannot write in DB!');
            }
        }

        return redirect('admin/product')->with('success','Product updated!');
    }




    public function destroy($id){
        $cat = Product::findOrFail($id);
        $yes =  $cat->delete();
        ($yes)? $m = 'Deleted': $m = 'Can not delete';
        return back()->with($m);
    }
    public function validate(Request $request, array $array)
    {
    }
}
