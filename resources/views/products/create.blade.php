@extends('layouts.app')
@section('title','create in products' )
@section('data')


<div class="container-fluid w-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if($errors->any())
            <div class='alert alert-danger w-100'>
                @foreach($errors->all() as $error)
                    <li><span>{{ $error}} </span></li>
                @endforeach
            </div>
        @endif
            <div class="card">
                <div class="card-header bg-dark text-white" > Create Product </div>

                <div class="card-body">
                    <form method="POST" action="{{url('/product/store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_id"> Select Category  </label>
                            <select class="form-control" id="category_id"  name="category_id">
                                <option value=""> Select Category </option>
                                @foreach($category as $c)
                                <option value="{{$c->id}}"> {{$c->category_name}} </option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="brand_id"> Select Brand </label>
                            <select class="form-control" id="brand_id"  name="brand_id">
                                <option value=""> Select Brand </option>
                                @foreach($brand as $b)
                                <option value="{{$b->id}}"> {{$b->brand_name}}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="product_name"> Product Name </label>
                            <input type="text" class="form-control" value="{{old('product_name')}}" id="product_name"  name="product_name" placeholder="Enter Productname" >
                        </div> 
                        <div class="form-group">
                            <label for="quantity">Quantity </label>
                            <input type="text" class="form-control" value="{{old('quantity')}}" id="quantity"  name="quantity" placeholder="Enter Quantity" >
                        </div>
                        <div class="form-group">
                            <label for="price"> Price </label>
                            <input type="text" class="form-control" value="{{old('price')}}" id="price"  name="price" placeholder="Enter Price" >
                        </div>
                        <div class="form-group">
                            <label for="image"> Product Image </label>
                            <input type="file" class="form-control" id="image"  name="image">
                        </div>                        
                        <br>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                        <a href="{{url('/')}}" class="btn btn-danger float-right"  > Cancel  </a> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection