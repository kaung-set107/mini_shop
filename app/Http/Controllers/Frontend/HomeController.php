<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Item;
use App\Models\Type;
use App\Models\Category;
use App\Models\Condition;
use Illuminate\Http\Request;
use App\Models\ItemCondition;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(){
        $category=Category::all();
        $con=Condition::get();
        $item=Item::latest()->with('category')->paginate(6);
        return view('frontend.home',compact('item','con','category'));
    }

public function fashion(){
        $cat=Category::all();
        $item_con=Condition::all();
        $item_type=Type::all();
    $item=Item::paginate(6);
    return view('frontend.filter',compact('item','cat','item_con','item_type'));
}

public function byCategory($slug){
            $cat=Category::all();
        $item_con=Condition::all();
        $item_type=Type::all();
        $cat_id=Category::where('slug',$slug)->first()->id;
        $item=Item::where('category_id',$cat_id)->with('category')->paginate(6);

                return view('frontend.filter',compact('item','cat','item_con','item_type'));
    }

public function search(Request $request){
        $cat=Category::all();
        $item_con=Condition::all();
        $item_type=Type::all();
        
        $search=$request->search;
        $item=Item::where('name','like',"%{$search}%")->with('category')->paginate(6);
        $item->appends($request->all());
//"%{$search}%" you can write double code only if not can error 
        return view('frontend.filter',compact('item','cat','item_con','item_type'));
    }

    public function filter(Request $request){
        
    $name=$request->name;
    


        $item=Item::where('name','like',"%{$name}%")           
        ->paginate(6);
        $item->appends($request->all());
//"%{$search}%" you can write double code only if not can error 
        return view('frontend.filter');
    }

    public function detail($slug){
        $item=Item::where('slug',$slug);
    
        //get
        $item=$item->with('category')->first();

        //redirect
        return view('frontend.detail',compact('item'));
    }
}