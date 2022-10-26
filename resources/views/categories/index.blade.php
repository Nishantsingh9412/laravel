@extends('layouts.app')
@section('title','Category' )
@section('data')
<div class="container-fluid w-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <!-- @if($msg = session('msg'))
            <div class="alert alert-success text-success text-center alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{$msg}}
            </div>
        @endif
        @if($failed = session('failed'))
            <div class="alert alert-danger text-danger text-center alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{$failed}}
            </div>
        @endif -->
            @if(Session::has('message'))
                <div class="alert alert-{{session('message')['status']}} text-{{session('message')['status']}}text-center alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{session('message')['msg']}}
                </div>        
            @endif
            <div class="card">
                <div class="card-header bg-dark text-white" >  Category <a href="{{url('cat/create')}}" class="btn btn-light text-dark float-right btn-sm"> +Add Category </a> </div>

                <div class="card-body"> 
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Category  Name</th>
                                <th>created at</th>
                                <th> updated at </th>
                                <th colspan="3" width="25%" class="text-sm-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cat as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td> {{ucwords($category->category_name)}} </td>
                                <td> {{$category->created_at}} </td>
                                <td> {{$category->updated_at}} </td>
                                <td> 
                                <a class="btn btn-info text-white btn-sm " href="{{url('cat/show/'.$category->id)}}"> View </a>  
                                </td>
                                <td>
                                <a class="btn btn-dark text-white btn-sm" href="{{url('cat/edit/'.$category->id)}}"> Edit </a> 
                                </td>
                                <td>
                                <form method="POST" action="{{url('cat/destroy/'.$category->id)}}">
                                @csrf
                                    <button  type="submit" class="btn btn-danger text-white btn-sm"> Delete </button>                                     
                                </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>                
                </div>
                {{$cat->links()}}
            </div>
        </div>
    </div>
</div>
@endsection