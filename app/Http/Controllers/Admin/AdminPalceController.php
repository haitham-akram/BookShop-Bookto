<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PlaceRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Place;
class AdminPalceController extends Controller
{
    public function index(){
        $places = Place::select()->get();
        return view('Admin.admin_PublishingPlace')->with('places',$places);
    }
    public function store(PlaceRequest $request){
        $place = new Place();
        if($request->has('Place_name') && $request->has('Shop_name')){
            $name = $request['Place_name'];
            $shop = $request['Shop_name'];
            $exist_place = Place::where([['name',$name],['shop_name',$shop]])->first();
//            dd($exist_place ,$name,$shop);
            if (!empty($exist_place)){
                return redirect()->back()->withErrors(['There is a publishing place with same data']);
            }else{
                $place->name = $name;
                $place->shop_name=$shop;
                $place->save();
            }

        }
        return redirect()->back();
    }
    public function edit($id){
        $place = Place::find($id);
        return view('includes.admin_editPlace')->with('place',$place);
    }
    public function update(PlaceRequest $request , $id){
        $place = Place::where('id',$id)->first();
        if($request->has('Place_name') && $request->has('Shop_name') ){
            $name = $request['Place_name'];
            $shop = $request['Shop_name'];
            $exist_place = Place::where([['name',$name],['shop_name',$shop]])->first();
            if (!empty($exist_place)){
                return redirect()->back()->withErrors(['There is a publishing place with same data']);
            }else{
                $place->name = $name;
                $place->shop_name=$shop;
                $place->save();
            }
        }
        return redirect()->back();
    }
    public function destroy($id){
        Place::find($id)->delete();
        return redirect()->back();
    }


}
