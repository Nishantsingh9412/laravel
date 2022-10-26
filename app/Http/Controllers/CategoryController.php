<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cat = Category::all();
        $cat = Category::paginate(2);
        return view('categories.index',compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required|max:20|min:3|unique:categories',
        ],[
            'category_name.required'=>'OYE ! ',                            // CUSTOM ERROR 
            'category_name.min'=>'minimum 3 characters ! OYE',                            // CUSTOM ERROR 
            'category_name.max'=>'minimum 20 characters ! OYE ',                            // CUSTOM ERROR 
        ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $cat = $category->save();
    // =========================== ANOTHER WAY TO INSERT DATA INTO DATABADSE TABLE===================
        $cat = Category::create([
            'category_name'=>$request['category_name']
        ]);
    // ================================= FIRST WAY TO DISPLAY MESSAGES ==============================

        // if($cat){
        //     return redirect('/category')->with('msg','The Category has been added');

        // }else {
        //     return redirect('/category')->with('failed','The Category has not been added');
        // }

    // =================================== SECOND WAY TO DISPLAY MESSAGES==============================//

        if($cat){
            return redirect("/category")->with('message',['status'=>'success','msg'=>'The Category ' .$cat->id. 'has been addded']);

        }else {
            return redirect("/category")->with('message',['status'=>'danger','msg'=>'The Category ' .$cat->id. 'has not  been addded']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = new Category;
        $category = $cat->find($id);
        // dd($category);
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = new Category;
        $category = $cat->find($id);
        return view('categories.edit',compact('category'));
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
        $cat = new Category;
        $category = $cat->find($id);
        $category->category_name = $request->update_category;
        //  $data = $category->save();
        // OR 
        $data = $category->update();
        if($data){
            return redirect("/category")->with('message',['status'=>'success','msg'=>'The Category ' .$cat->id. 'has been updated']);

        }else {
            return redirect("/category")->with('message',['status'=>'danger','msg'=>'The Category ' .$cat->id. 'has not  been updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // $category = Category::find($id);
        $del = new Category;
        $category = $del->find($id);
        $delete = $category->delete();
        if ($delete) {
            return redirect("/category")->with('message',['status'=>'warning','msg'=>'The Category ' .$category->id. 'has been deleted']);

        }else {
            return redirect("/category")->with('message',['status'=>'danger','msg'=>'The Category ' .$category->id. 'has not been deleted']);
        }
        
    }
}



// $product = Product::all()‐>get();

// $product = new Product();
// $product‐>orderBy("id","DESC")‐>get();
// $product‐>‐>where("id", 5)‐>get();
// $product‐>‐>where(["id"=>8])‐>get();
// $product‐>‐>where(["id"=>8])‐>first();

// where()
// get()
// first()
// find()
// all()