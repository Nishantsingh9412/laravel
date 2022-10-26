@extends('layouts.app')
@section('title','Register Admin' )
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
            <div class="card">
                <div class="card-header bg-dark text-white" > Register Admin </div>
                    
                <div class="card-body">
                    <form method="POST" action="{{url('admin/add')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name"> Admin Name </label>
                            <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Name">
                        </div> 
                        <div class="form-group">
                            <label for="email">Email </label>
                            <input type="text" class="form-control" id="email"  name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password"> Password </label>
                            <input type="password" class="form-control" id="password"  name="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password"> Confirm Password </label>
                            <input type="password" class="form-control" id="confirm_password"  name="confirm_password">
                        </div>                        
                        <br>
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="{{url('/')}}" class="btn btn-danger float-right"  > Cancel  </a> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection