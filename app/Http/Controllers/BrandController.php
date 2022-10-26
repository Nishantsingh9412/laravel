<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::paginate(2);
        return view('brands.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $this->validate($request,[
        'brand_name'=>'required|max:20|min:3|unique:brands',
    
        ]);
       
        $brand = Brand::create([
            'brand_name'=>$request['brand_name']
        ]);
        
        if($brand){
            return redirect("/brand")->with('msg','The Brand has been added succesfully');
        }else{
            return redirect('/brand')->with('failed','The brand has not been added sorry!!!!');
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

        $brands = new Brand;
        $brand = $brands->find($id);
        return view('brands.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $brands = new Brand;
        $brand = $brands->find($id);
        return view('brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $brands = new Brand;
        $brand = $brands->find($id);
        $brand->brand_name = $request->brand_name;
        $data = $brand->update();
        // dd($brand);
        // exit();
        if($data){
            return redirect('/brand')->with('message',['status'=>'success','msg'=>'The Brand '.$brand->brand_name. ' has been updated successfully']);
        }else{
            return redirect('/brand')->with('message'.['status'=>'danger','msg'=>'The Brand '.$brand->brand_name.' Has not been updated ']);
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
        $brand = Brand::find($id);
        $delete = $brand->delete();
         if ($delete) {
            return redirect("/brand")->with('message',['status'=>'warning','msg'=>'The Category ' .$brand->brand_name. ' has been deleted']);

        }else {
            return redirect("/brand")->with('message',['status'=>'danger','msg'=>'The Category ' .$brand->brand_name. ' has not been deleted']);
        }
        
    }
}
