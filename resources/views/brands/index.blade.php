@extends('layouts.app')
@section('title','brands' )
@section('data')
<div class="container-fluid w-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if($msg = session('msg'))
        <div class="alert alert-success text-success text-center alert alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{$msg}}
        </div>
        @endif
        @if($msg = session('failed'))
        <div class=" alert alert-danger text-danger text-center alert-dismissible ">
            <button type="button" class="close" data-dismiss="alert"> &times; </button>
        </div>
        @endif
        @if(Session::has('message'))
            <div class="alert alert-{{session('message')['status']}} text-{{session('message')['status']}} text-center alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"> &times; </button>
                                {{session('message')['msg']}}
            </div>
        @endif
            <div class="card">
                <div class="card-header bg-dark text-white">Brands <a class="btn btn-light text-dark btn-sm float-right" href="{{url('brand/create')}}">+Add Brand </a></div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Brand  Name</th>
                                <th>created at</th>
                                <th> updated at </th>
                                <th colspan="3" width="22%" class="text-sm-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($brand as $b)
                            <tr>
                                <td scope="row">{{$b->id}}</td>
                                <td>{{$b->brand_name}}</td>
                                <td> {{$b->created_at}} </td>
                                <td> {{$b->updated_at}} </td>
                                <td> 
                                 <a class="btn btn-info text-white btn-sm" href="{{url('brand/show/'.$b->id)}}"> View </a>  
                                </td>
                                <td>
                                 <a class="btn btn-dark text-white btn-sm" href="{{url('brand/edit/'.$b->id)}}"> Edit </a> 
                                </td>
                                <td>
                                <form method="POST" action="{{url('brand/destroy/'.$b->id)}}">
                                    @csrf
                                 <button type="submit" class="btn btn-danger text-white btn-sm" > Delete </button> 
                                </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>                
                {{$brand->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection