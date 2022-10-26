@extends('layouts.app')
@section('title','show in products' )
@section('data')
<div class="container-fluid w-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white" > Update Category </div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Product Id <small class="float-right"> {{$products->id}}</small> </li>
                        <li class="list-group-item"> Category Id <small class="float-right"> {{$products->cat_id}} </small></li>
                        <li class="list-group-item">Brand Name <small class="float-right">  {{$products->brand_id}} </small></li>
                        <li class="list-group-item">Product Name <small class="float-right">  {{$products->product_name}} </small></li>
                        <li class="list-group-item"> Quantity <small class="float-right">  {{$products->quantity}} </small></li>
                        <li class="list-group-item">Price <small class="float-right">  {{$products->price}} </small></li>
                        <li class="list-group-item text-center"><span>Product Image</span></li>
                        <div><center><img class="w-50"  src="{{url('public/storage/images/'.$products->image)}} " width="100px"> </center> </div>
                    </ul><br>
                    <a href="{{url('/')}}" class="btn btn-danger float-right"  > Cancel  </a> 
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

