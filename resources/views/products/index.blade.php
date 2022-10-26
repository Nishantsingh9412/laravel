@extends('layouts.app')
@section('title','Products' )
@section('data')

<div class="container-fluid w-100">     
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (Session::has('message'))
        <div class="alert alert-{{session('message')['status']}} text-{{session('message')['status']}} text-center alert-dismissible">
            <button type="button" class="close" data-dismiss='alert' >  &times; </button>
                            {{session('message')['msg']}}
        </div>
        @endif
            <div class="card">
                <div class="card-header bg-dark text-white">Products <a href="{{url('product/create')}}" class="text-dark bg-light btn btn-light btn-sm float-right"> +Add Product</a> </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Category </th>
                                <th>Brand </th>
                                <th>Product </th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th colspan="3" width="22%" class="text-sm-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $pr)
                            <tr>
                                <th scope="row">{{$pr->id}}</th>
                                <td>{{$pr->cat_id}}</td>
                                <td>{{$pr->brand_id}}</td>
                                <td>{{$pr->product_name}}</td>
                                <td> {{$pr->quantity}} </td>
        
                                <td> <div><img class="w-50 img-thumbnail" src="{{url('public/storage/images/'.$pr->image)}}" ></div></td>
                                <td> 
                                 <a class="btn btn-info text-white btn-sm" href="{{url('product/show/'.$pr->id)}}"> View </a>  
                                </td>
                                <td>
                                 <a class="btn btn-dark text-white btn-sm" href="{{url('product/edit/'.$pr->id)}}" >  Edit </a> 
                                </td>
                                 <td>
                                 <form method="POST" action="{{url('product/destroy/'.$pr->id)}}">
                                    @csrf
                                 <button type="submit" class="btn btn-danger text-white btn-sm" > Delete </buton>                                      
                                 </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                
                    {{$products->links()}}
                </div>
        </div>
        </div>
    </div>
</div>


@endsection