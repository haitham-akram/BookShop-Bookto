<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Book;
use App\BookInfo;
use App\Writer;
use App\Place;
use App\Category;


class AdminBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    $Books = Book::with('BookInfo')
        ->with('BookInfo.Category')
        ->with('BookInfo.Writer')
        ->with('BookInfo.Place')
        ->get();
    dd($Books);
        return view('Admin.admin_BooKList')->with('Books',$Books);
    }
    public function create(){
        $Category = Category::select()->get();
        $Author = Writer::select()->get();
        $Place = Place::select()->get();
        return view('Admin.admin_addBook')->with('categories',$Category)->with('authors',$Author)->with('places',$Place);
    }
    public function store(BookRequest $request){
      $Book = new Book();
      $bookInfo = new BookInfo();
        if($request->has('Book_name')
            &&$request->has('Book_category')
            &&$request->has('Book_author')
            &&$request->has('Publishing_place')
            &&$request->has('Issue_Number')
            &&$request->has('Release_year')
            &&$request->has('img')
        ){
            $name = $request['Book_name'];
            $number = $request['Issue_Number'];
            $year = $request['Release_year'];
            $img = $request['img'];
            $category = $request['Book_category'];
            $author = $request['Book_author'];
            $place = $request['Publishing_place'];
            $idAuthor = Writer::where('name',$author)->first();
            $idCategory =Category::where('name',$category)->first();
            $idPlace = Place::where('shop_name',$place)->first();
//////////////////////////
            $exist_books= Book::where('name',$name)->get();
            foreach ($exist_books as $exist_book){
            if($exist_book->issus_number == $number &&$exist_book->release_year == $year){
                return redirect()->back()->withErrors(['There is a book with the same name, issue number and year ']);
                //here an exception state same book
            }
            }
            $Book->name =$name;
            $Book->img_URL=$img;
            $Book->issus_number=$number;
            $Book->release_year=$year;
            $Book->save();
            $bookInfo->writer_id=$idAuthor->id;
            $bookInfo->category_id=$idCategory->id;
            $bookInfo->place_id=$idPlace->id;
            $bookInfo->book_id =$Book->id;
            $bookInfo->save();
       }
        return redirect()->back();
    }
public function edit($id){
        $book = Book::where('id',$id)->first();
        $book_info= BookInfo::where('book_id',$id)->first();
        $Category = Category::select()->get();
        $Author = Writer::select()->get();
        $Place = Place::select()->get();
        return view('Admin.admin_editBook')
            ->with('book',$book)
            ->with('info',$book_info)
            ->with('categories',$Category)
            ->with('authors',$Author)
            ->with('places',$Place);
}
public function update(BookRequest $request, $id)
{
    $Book = Book::where('id', $id)->first();
    $book_info = BookInfo::where('book_id', $id)->first();
    /////Book before Edit/////
    $old_name = $Book->name;
    $old_number = $Book->issus_number;
    $old_year = $Book->release_year;
    /////Book in Edit request /////
    if ($request->has('Book_name')
        && $request->has('Book_category')
        && $request->has('Book_author')
        && $request->has('Publishing_place')
        && $request->has('Issue_Number')
        && $request->has('Release_year')
        && $request->has('img')
    ) {
        $name = $request['Book_name'];
        $img = $request['img'];
        $number = $request['Issue_Number'];
        $year = $request['Release_year'];
        $category = $request['Book_category'];
        $author = $request['Book_author'];
        $place = $request['Publishing_place'];
        $idAuthor = Writer::where('name', $author)->first();
        $idCategory = Category::where('name', $category)->first();
        $idPlace = Place::where('shop_name', $place)->first();
        ///// insert new info in selected book /////
        $Book->name = $name;
        $Book->img_URL = $img;
        $Book->issus_number = $number;
        $Book->release_year = $year;
        $book_info->writer_id = $idAuthor->id;
        $book_info->category_id = $idCategory->id;
        $book_info->place_id = $idPlace->id;
        /////Editing Condition/////
        ///Editing if the name and year and number didnt change
        if ($old_name == $name && $old_number == $number && $old_year == $year) {
            $Book->save();
            $book_info->save();
        } else { ///Editing if name and year and number changed or one of them
            $exist_book = Book::where([['name', $name], ['issus_number', $number], ['release_year', $year]])->first();
            if (!empty($exist_book)) {
                return redirect()->back()->withErrors(['There is a book with the same name, issue number and year']);
            } else {
                $Book->save();
                $book_info->save();
            }
        }
    }
return redirect()->back();
}
public function destroy($id){
     BookInfo::where('book_id',$id)->delete();
     Book::find($id)->delete();
    return redirect()->back();
}

}
