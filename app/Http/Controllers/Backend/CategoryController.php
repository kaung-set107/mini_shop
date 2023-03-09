<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status_public=Category::where('status','public')->get();
        $status_null=Category::where('status','')->get();
        $category=Category::orderBy('id','ASC')->paginate(5);
        return view('backend.category',compact('category','status_public','status_null'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.categoryCreate');
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
            'image'=>'required',
            
        ]);

        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $path='images/'.$file_name;

        $file->storeAs('images',$file_name);

        Category::create([
            'slug'=>uniqid().Str::slug($request->name),
            'name'=>$request->name,
            'image'=>$path,
            'status'=>$request->status
        ]);

        return redirect(route('category.index'))->with('success','Product Created Success!');
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
    {
    
        $cat=Category::where('id',$id)->first();
        return view('backend.editcat',compact('cat'));
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
        $item=Category::find($id);
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

    
        Category::where('id',$id)->update([
            'slug'=>uniqid().Str::slug($request->name),
            'name'=>$request->name,
            'image'=>$path,
            'status'=>$request->status

        ]);

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
        $category=Category::where('id', $id);

        $img_arr=explode('/',$category->first()->image);
        //for delete images/image\
        Storage::disk('images')->delete($img_arr[1]);

        $category->delete();

        return redirect(route('category.index'))->with('delete', 'Deleted Success!');
    }
}