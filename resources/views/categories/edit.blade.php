@extends('layouts.app')
@section('title','categories' )
@section('data')
 

<div class="container-fluid w-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white" > Update Category </div>

                <div class="card-body">
                    <form method="POST" action="{{url('/cat/update/'.$category->id)}}">
                    @csrf
                        <div class="form-group">
                            <label for="update_category">Category Name</label>
                            <input type="text" class="form-control" id="update_category" value="{{$category->category_name}}"  name="update_category" placeholder="Enter Category">
                        </div> <br>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                        <a href="{{url('/')}}" class="btn btn-danger float-right"  > Cancel  </a> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection