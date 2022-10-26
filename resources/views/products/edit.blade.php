@extends('layouts.app')
@section('title','edit in products' )
@section('data')

<div class="container-fluid w-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white" > Update Product </div>

                <div class="card-body">
                    <form method="POST" action="{{url('product/update/'.$products->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="update_product"> Product name </label>
                            <input type="text" class="form-control" id="update_product"  name="update_product"  value ="{{$products->product_name}}" placeholder="Update Productname">
                        </div> 
                        <div class="form-group">
                            <label for="update_quantity">Quantity </label>
                            <input type="text" class="form-control" id="update_quantity"  name="update_quantity"  value ="{{$products->quantity}}"placeholder="Update Quantity">
                        </div>
                        <div class="form-group">
                            <label for="update_price"> Price </label>
                            <input type="text" class="form-control" id="update_price"  name="update_price"  value ="{{$products->price}}"placeholder="Update Price">
                        </div>
                        <!-- <div class="form-group">
                            <label for="update_image"> Product Image </label>
                            <input type="file" class="form-control" id="update_image"  name="update_image">
                        </div>                         -->
                        <br>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                        <a href="{{url('/')}}" class="btn btn-danger float-right"  > Cancel  </a> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection