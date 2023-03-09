<?php

namespace App\Http\Controllers\Backend;

use App\Models\Item;
use App\Models\Type;
use App\Models\Category;
use App\Models\Condition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ItemCondition;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $status_public=Item::where('status','public')->get();
        $status_null=Item::where('status','')->get();
        $item=Item::with('category')->orderBy('id','ASC')->paginate(5);
        return view('backend.item',compact('status_public','status_null','item'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat_id=Category::all();
        $item_con=Condition::all();
        $item_type=Type::all();
        return view('backend.createItem',compact('cat_id','item_con','item_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
            'ownername'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);

            $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $path='images/'.$file_name;

        $file->storeAs('images',$file_name);


        $item=new Item();
        $item->slug=uniqid().Str::slug($request->name);
        $item->name=$request->name;
        $item->category_id=$request->category_id;
        $item->description=$request->description;
        $item->price=$request->price;
        $item->status=$request->status;
        $item->image=$path;
        $item->ownername=$request->ownername;
        $item->phone=$request->phone;
        $item->address=$request->address;
        $item->save();
        
        Item::find($item->id)->type()->sync($request->type_id);
        Item::find($item->id)->condition()->sync($request->condition_id);
        return redirect(route('items.index'))->with('success','Product Created Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    $cat_id=Category::all();
        $item_con=Condition::all();
        $item_type=Type::all();
        $item=Item::where('id',$id)->with('category')->first();
        return view('backend.edititem',compact('item','cat_id','item_con','item_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            
        $item=Item::find($id);
        //image upload
    if($request->image){
            //change string => image/1234.jpg
            $img_arr=explode('/',$item->image);

            //delete image/
            Storage::disk('images')->delete($img_arr[0]);

        //image upload
        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $path='images/'.$file_name;

        $file->storeAs('images',$file_name);

        }else{
            $path=$item->image;
        }

    
        Item::where('id',$id)->update([
        'slug'=>uniqid().Str::slug($request->name),
        'name'=>$request->name,
        'category_id'=>$request->category_id,
        'description'=>$request->description,
        'price'=>$request->price,
        'status'=>$request->status,
        'image'=>$path,
        'ownername'=>$request->ownername,
        'phone'=>$request->phone,
        'address'=>$request->address,
        ]);

        Item::find($item->id)->type()->sync($request->type_id);
        Item::find($item->id)->condition()->sync($request->condition_id);

        return redirect()->back()->with('success','Successful Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::find($id);

        $img_arr=explode('/',$item->first()->image);
        //for delete images/image\
        Storage::disk('images')->delete($img_arr[1]);

        $item->delete();

        return redirect(route('items.index'))->with('delete', 'Deleted Success!');
    }
}