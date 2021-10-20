<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class AdminCategoryController extends Controller
{
    public function index(){
         $Categories = Category::select()->get();
        return view('Admin.admin_CategoryList')->with('categories',$Categories);
    }
    public function store(CategoryRequest $request){
        $category = new category();
        if ($request->has('category_name')){
            $name = $request['category_name'];
            $exist_category = Category::where('name',$name)->first();
           // dd($exist_category,$name);
            if (!empty($exist_category)){
                return redirect()->back()->withErrors(['There is the same category']);
            }else{
                $category->name = $name;
                $category->save();
            }
        }
        return redirect()->back();
    }
    public function edit($id){
        $Category= Category::find($id);
        return view('includes.admin_editCategory')->with('category', $Category);
    }
    public function update (CategoryRequest $request, $id){
        $category = Category::where('id',$id)->first();
        if($request->has('category_name')){
            $name = $request['category_name'];
            $exist_category = Category::where('name',$name)->first();;
            if (!empty($exist_category)){
                return redirect()->back()->withErrors(['There is the same category']);
            }else{
                $category->name = $name;
                $category->save();
            }
        }
        return redirect()->back();
    }
    public function destroy($id){
        Category::find($id)->delete();
        return redirect()->back();
    }

}
