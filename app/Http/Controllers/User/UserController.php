<?php

namespace App\Http\Controllers\User;


use App\Http\Requests\GuestRequest;
use App\Http\Requests\searchRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\Category;
use App\Place;
use App\Writer;
class UserController extends Controller
{
    public function index(){
        $Category = Category::select()->get();
        $Author = Writer::select()->get();
        $Place = Place::select()->get();
        $Books = Book::with('BookInfo')
            ->with('BookInfo.Category')
            ->with('BookInfo.Writer')
            ->with('BookInfo.Place')
            ->get();
        return view('Public_user.Book')
            ->with('Books',$Books)
            ->with('categories',$Category)
            ->with('authors',$Author)
            ->with('places',$Place);
    }
    public function show(GuestRequest $request){
        $Category = Category::select()->get();
        $Author = Writer::select()->get();
        $Place = Place::select()->get();
            if($request->has('place')
              ||$request->has('category')
              ||$request->has('author')
            ){ $place = $request['place'];
               $category = $request['category'];
               $author = $request['author'];
                if (!empty($place)){
                    $seleted_place = Place::where('shop_name',$place)->first();
                    $id_place= $seleted_place->id;
                    $books = Place::with('BookInfo')
                        ->with('BookInfo.Category')
                        ->with('BookInfo.Writer')
                        ->with('BookInfo.Book')
                        ->where('id',$id_place)
                        ->first();
                    return view('Public_user.Book_based_on_place')
                        ->with('books_place',$books)
                        ->with('categories',$Category)
                        ->with('authors',$Author)
                        ->with('places',$Place);

                }else if (!empty($category)){
                    $selected_category = Category::where('name',$category)->first();
                    $id_category = $selected_category->id;
                    $books = Category::with('BookInfo')
                        ->with('BookInfo.Place')
                        ->with('BookInfo.Writer')
                        ->with('BookInfo.Book')
                        ->where('id',$id_category)
                        ->first();
                    return view('Public_user.Book_based_on_category')
                        ->with('books_category',$books)
                        ->with('categories',$Category)
                        ->with('authors',$Author)
                        ->with('places',$Place);
                }else if (!empty($author)){
                    $selected_author = Writer::where('name',$author)->first();
                    $id_author= $selected_author->id;
                    $books = Writer::with('BookInfo')
                        ->with('BookInfo.Category')
                        ->with('BookInfo.Place')
                        ->with('BookInfo.Book')
                        ->where('id',$id_author)
                        ->first();
                    return view('Public_user.Book_based_on_author')
                        ->with('books_author',$books)
                        ->with('categories',$Category)
                        ->with('authors',$Author)
                        ->with('places',$Place);
                }else {
                    return redirect()->back();
                }
            }else{

                return redirect()->back();
            }
    }
    public function search(searchRequest $request){
        $Categories = Category::select()->get();
        $Authors = Writer::select()->get();
        $Places = Place::select()->get();
        $search_value = $request['search'];
        if(!empty($search_value) ){
            $book = Book::where('name',$search_value)->first();
            $place = Place::where('shop_name',$search_value)->first();
            $author = Writer::where('name',$search_value)->first();
            $category =Category::where('name',$search_value)->first();
            if (!empty($book)){
                $Books = Book::with('BookInfo')
                    ->with('BookInfo.Category')
                    ->with('BookInfo.Writer')
                    ->with('BookInfo.Place')
                    ->where('name',$search_value)
                    ->get();
                return view('Public_user.Book')
                    ->with('Books',$Books)
                    ->with('categories',$Categories)
                    ->with('authors',$Authors)
                    ->with('places',$Places);
            }elseif (!empty($place)){
                $id_place= $place->id;
                $books = Place::with('BookInfo')
                    ->with('BookInfo.Category')
                    ->with('BookInfo.Writer')
                    ->with('BookInfo.Book')
                    ->where('id',$id_place)
                    ->first();
                return view('Public_user.Book_based_on_place')
                    ->with('books_place',$books)
                    ->with('categories',$Categories)
                    ->with('authors',$Authors)
                    ->with('places',$Places);
            }elseif (!empty($author)){
                $id_author= $author->id;
                $books = Writer::with('BookInfo')
                    ->with('BookInfo.Category')
                    ->with('BookInfo.Place')
                    ->with('BookInfo.Book')
                    ->where('id',$id_author)
                    ->first();
                return view('Public_user.Book_based_on_author')
                    ->with('books_author',$books)
                    ->with('categories',$Categories)
                    ->with('authors',$Authors)
                    ->with('places',$Places);
            }elseif (!empty($category)){
                $id_category = $category->id;
                $books = Category::with('BookInfo')
                    ->with('BookInfo.Place')
                    ->with('BookInfo.Writer')
                    ->with('BookInfo.Book')
                    ->where('id',$id_category)
                    ->first();
                return view('Public_user.Book_based_on_category')
                    ->with('books_category',$books)
                    ->with('categories',$Categories)
                    ->with('authors',$Authors)
                    ->with('places',$Places);
            }else{
                return redirect()->back()->withErrors(['Not Found']);
            }
        }else{
            return redirect()->back();
        }
    }

}
