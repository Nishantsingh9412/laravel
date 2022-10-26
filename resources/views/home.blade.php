<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Project Lara</title>
    <style>
      .adjust{
        margin-left:80px ;
      }
    </style>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
      <a class="nav-item nav-link active text-white" href="{{url('/')}}">Home </a>
      </li>
      <li class="nav-item">
      <a class="nav-item nav-link text-white" href="{{url('admin/panel')}}">Admin</a>
      </li>
      <li class="nav-item">


    </li>
      <li class="nav-item">


    </li>
    </ul>
  </div>
</nav>



                    <!-- <a class="nav-item nav-link text-white" href="{{url('category')}}">Category </a>
                    <a class="nav-item nav-link text-white" href="{{url('brand')}}"> Brands </a>
                    <a class="nav-item nav-link text-white" href="{{url('product')}}">Products</a> -->

  <br><br><br><br>
  
    <div class="container-fluid adjust">
        <div class="row row-cols-1 row-cols-md-6">
        @foreach($products as $pr)
            <div class="col mb-1 w-25">
                <div class="card">
                    <img src="{{url('public/storage/images/'.$pr->image)}}" class="card-img-top w-75" alt="all product">
                        <div class="card-body">
                            <h5 class="card-title">{{$pr->product_name}}</h5>
                            <p class="card-text">INR{{$pr->price}}.00</p>
                        </div>
                </div>
            </div> 
        @endforeach
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>