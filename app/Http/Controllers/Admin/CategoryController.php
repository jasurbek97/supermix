<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cats = Category::all();
        return view('admin.category.index',compact('cats'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name_uz' => ['required', 'string', 'max:255'],
            'name_ru' => ['required', 'string', 'max:255'],
            'image' => 'required|image',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $name = date('Y_m_d_H-i-s').".".$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/cats/'), $name);
        $image = 'uploads/cats/'.$name;

            $n = new  Category();
            $n->name_ru = $request->name_ru ;
            $n->name_uz = $request->name_uz ;
            $n->slug = str_slug($request->name_uz);
            $n->status = ($request->status == 1) ? 1 : 0;
            $n->image = $image;
            $n->save();

            return back()->with('success','Category saved!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.update',compact('category'));
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'name_uz' => ['required', 'string', 'max:255'],
            'name_ru' => ['required', 'string', 'max:255'],
            'image' => 'image',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);


        $n = Category::findOrFail($id);
        $old = $n->image;
        if ($request->hasFile('image')){
            (file_exists($old))? unlink($old):'';

            $name =  date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
            $upload =  $request->image->move(public_path('uploads/cats/'), $name);
            if(!$upload)
                return back()->with('danger','Image not uploaded!');
            else
                $image = 'uploads/cats/'.$name;

        }
        else   $image = $old;


        if (!empty($image)) {

            $n->name_ru = $request->name_ru ;
            $n->name_uz = $request->name_uz ;
            $n->slug = str_slug($request->name_uz);
            $n->status = ($request->status == 1) ? 1 : 0;
            $n->image = $image;
            $n->save();
            if (!$n->save()){
                (file_exists($image))? unlink($image):'';
                return back()->with('danger','Cannot write in DB!');
            }
        }

        return redirect('admin/category')->with('success','Category updated!');

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function destroy($id){
        $cat = Category::findOrFail($id);
        (is_file($cat->image))? unlink($cat->image): '';
        $products = Product::where('cat_id',$cat->id)->get();
        foreach ($products as $product){
            (is_file($product->image))? unlink($product->image): '';
            $product->delete();
        }
        $cat->delete();
        return redirect('admin/category');
   }

    public function validate(Request $request, array $array)
    {
    }
}
