<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


    <nav class="navbar navbar-expand-lg" style="background: #563D7C">
        <div class="container">      
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('products')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{route('fetch.data')}}">Fetch-Data</a>
                    </li>
                </ul>
            </div>  
        </div>
      </nav>     

    {{-- <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Products</a>
        <a class="nav-link text-light" href="#">Home</a>
    </nav> --}}

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="row">
                @foreach ($data['data'] as $key => $item)
                    <div class="col-md-4">
                        {{-- <img src="{{ asset($data['data'][$key]['feature_image']) }}" class="card-img-top"> --}}
                        <img src="https://image.shutterstock.com/image-vector/hand-holding-megaphone-new-product-260nw-387107431.jpg" class="card-img-top">
                        <div class="card-body">
                            <p class="text-success text-bold">{{ $data['data'][$key]['name'] }}</p>                            
                            <h5 class="card-title"><td>BDT {{ number_format($data['data'][$key]['original_price'], 2) }}</td></h5>
                            <p><span class="text-danger">★</span> {{ $data['data'][$key]['rating'] }}  &nbsp; <b>Quantity :</b> {{ $data['data'][$key]['variants'][0]['qty'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>