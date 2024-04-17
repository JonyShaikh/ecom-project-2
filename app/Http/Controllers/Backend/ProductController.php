<?php

namespace App\Http\Controllers\Backend;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{
    public function productCreateForm()
    {
        $categories = Category::all();
        return view('back-end.pages.products.add',compact('categories'));
    }

    public function productStore(Request $request)
    {
        $this->validate($request,[
            'category_id'=>'required|integer',
            'name'=>'required|string',
            'price'=>'required',
            'discount_price'=>'sometimes',
            
            'type'=>'required',
            'image'=>'required|image',

        ]);

        $imageName = $request->name.'.'. $request->image->extension();
        $request->image->move('images/', $imageName);

        Product::create([
            'category_id'=> $request->category_id,
            'name'=>$request->name,
            'price'=>$request->price,
            'discount_price'=>$request->discount_price,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'type'=>$request->type,
            'image'=>$imageName,
        ]);

        session()->flash('success','product has been created');
        return redirect()->back();
    }
   
    public function productManage()
    {   
        $products = Product::with('category')->get();
        return view('back-end.pages.products.manage',compact('products'));
    }
  
}
