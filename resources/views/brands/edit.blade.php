@extends('layouts.app')
@section('title',' brands' )
@section('data')


<div class="container-fluid w-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white" > Update Brand </div>

                <div class="card-body">
                    <form method="POST" action="{{url('brand/update/'.$brand->id)}}">
                    @csrf
                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control" id="brand_name"  name="brand_name" value="{{$brand->brand_name}}" placeholder="Enter brand">
                        </div> <br>
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                        <a href="{{url('/')}}" class="btn btn-danger float-right"  > Cancel  </a>                         
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection