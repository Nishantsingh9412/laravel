@extends('layouts.app')
@section('title',' View Brands' )
@section('data')

<div class="container-fluid w-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white" > View Brand </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"> Brand Id <small class="float-right">  {{$brand->id}} </small> </li>
                        <li class="list-group-item"> Brand Name <small class="float-right"> {{$brand->brand_name}} </small></li>
                        <li class="list-group-item">Created at <small class="float-right">  {{$brand->created_at}} </small></li>
                        <li class="list-group-item"> Updated at <small class="float-right"> {{$brand->updated_at}} </small></li>
                    </ul><br>
                    <a href="{{url('/')}}" class="btn btn-danger float-right"  > Cancel  </a> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection