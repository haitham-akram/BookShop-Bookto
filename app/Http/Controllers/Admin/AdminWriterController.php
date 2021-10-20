<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Writer;

class AdminWriterController extends Controller
{
    public function index(){
        $Authors = Writer::select()->get();
        return view('Admin.admin_author')->with('authors',$Authors);
    }
    public function store(AuthorRequest $request){
        $Author = new Writer();
        if($request->has('author_name')){
            $name = $request['author_name'];
            $exit_author = Writer::where('name',$name)->first();
            if (!empty($exit_author)){
                return redirect()->back()->withErrors(['There is the same author']);
            }else{
                $Author->name = $name;
                $Author->save();
            }
        }
        return redirect()->back();
    }
   public function edit($id){
       $author = Writer::find($id);
       return view('admin_editAuthor')->with('author', $author);
   }
    public function update(AuthorRequest $request,$id){
        $Author = Writer::where('id',$id)->first();
        if($request->has('author_name')){
            $name = $request['author_name'];
            $exit_author = Writer::where('name',$name)->first();
            if (!empty($exit_author)){
                return redirect()->back()->withErrors(['There is the same author']);
            }else{
            $Author->name = $name;
            $Author->save();
            }
        }
        return redirect()->back();
    }

    public function destory($id){
        Writer::find($id)->delete();
        return redirect()->back();
    }

}
