<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Validator;
use Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = new Product;
        // $products = $product->all();

        $products = Product::paginate(2);

        // dd($products);
        // exit();
        return view('products.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
// ============================ FOR FETCHING CATEGORY IN CREATE.BLADE.PHP =========
        $categories = new Category;
        $category  = $categories->all();
        // dd($category);
// ============================ FOR FETCHING BRAND IN CREATE.BLADE.PHP =========
        $brands = new Brand;
        $brand = $brands->all();
        // dd($brand);
        // exit();
        return view('products.create',compact('category','brand'));
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
            'category_id'=>'required',
            'brand_id'=>'required',
            'product_name'=>'required|max:20|min:3|unique:products',   // products == table ka naam
            'quantity'=>'required|integer|min:1',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
        ]);
            if ($request->hasfile("image")) {
                $fileExt = $request->file("image")->getClientOriginalName();
                $filename = Pathinfo($fileExt,PATHINFO_FILENAME);
                $Extension = $request->file("image")->getClientOriginalExtension();
                $fileNametoStore = $filename.'.'.$Extension;
                $path = $request->file("image")->storeAs('public/images',$fileNametoStore);
            }else {
                $fileNametoStore = "no-image.png";
            }
                
            $product = new Product;
            $product->cat_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->image = $fileNametoStore;
            $products = $product->save();
            if($products){
            return redirect('/product')->with('message',['status'=>'success','msg'=>'The Product ' .$product->id. 'has been addded']);

            }else {
            return redirect("/product")->with('message',['status'=>'danger','msg'=>'The Product ' .$product->id. 'has not  been addded']);
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
        $product = new Product;
        $products = $product->find($id);
        return view('products.show',compact('products'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = new Product;
        $products = $product->find($id);
        // dd($products);
        // exit();
        return view('products.edit',compact('products'));
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
        $product = new Product;
        $products = $product->find($id);
        // $products->cat_id=$request->category_id;
        // $products->brand_id = $request->brand_id;
        $products->product_name = $request->update_product;
        $products->quantity = $request->update_quantity;
        $products->price = $request->update_price;
        $data = $products->update();
        // $products->image = $fileNametoStore;
        if($data){
            return redirect('/product')->with('message',['status'=>'success','msg'=>'The Product '.$products->id.' has been updated' ]);
        }else {
            return redirect('/product')->with('message',['status'=>'danger','msg'=>'The Product '.$products->id.' has been updated succesfully']);
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
        // Delete Image from site and Folder
        $product = Product::find($id);
        if($product->image !="noimage.jpg"){
           Storage::delete('public/images/'.$product->image);
        }
        $delete=$product->delete();
        if ($delete) {
            return redirect("/product")->with('message',['status'=>'warning','msg'=>'The Product  '.$product->id.' has been Deleted']);
        }else {
            return redirect("/product")->with('message',['status'=>'danger','msg'=>'The Product ' .$product->id.' has been Deleted ']);
        }
        
    }
}
