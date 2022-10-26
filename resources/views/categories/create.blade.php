@extends('layouts.app')
@section('title','category')
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
                <div class="card-header bg-dark text-white" > Create Category </div>

                <div class="card-body">
                    <form method="POST" action="{{url('/cat/store')}}">
                    @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" id="category_name"  name="category_name" placeholder="Enter Category">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                        <a href="{{url('/')}}" class="btn btn-danger float-right"  > Cancel  </a> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection