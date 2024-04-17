<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categoryCreateForm()
    {
        return view('back-end.pages.category.add');
    }

    public function categoryManage()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('back-end.pages.category.manage', compact('categories'));
    }

    public function categoryEdit($id)
    {
        $category = Category::find($id);
        return view('back-end.pages.category.edit',compact('category')); 
    }


    public function categoryStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image'
        ]);

     $imageName = $request->name.'.'. $request->image->extension();
        $request->image->move('images/', $imageName);

        Category::create([
            'name' => $request->name,
            'image' => $imageName
        ]);
        session()->flash('success','Category has been created');
        return redirect()->back();
    }


    public function categoryDelete($id)
    {
         $category = Category::find($id);
         $category->delete();
         session()->flash('success','Category has been deleted');
         return redirect()->back();
    }
}
