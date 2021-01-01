<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- sweetalert2 -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        })
    </script>


</head>
  <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    /* Loader  */
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid blue;
        border-right: 16px solid green;
        border-bottom: 16px solid red;
        border-left: 16px solid pink;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }


  </style>
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <a href="{{ route('fetch.data.show')}}" class="btn btn-primary btn-lg">Fetch Data & Show</a>
            </div>
            <div class="col-md-3">
                <form action="{{route('fetch.data.store')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg">Insert Into Database</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>



     {{-- Session Message --}}

        @if (session()->has('message'))
            <div class="container mt-3">
                <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
                    <strong>{{ session('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>  
        @endif 



    @if (isset($data))

        <div class="mt-5">
            <table class="table">
                <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">SL</th>
                    <th scope="col">Product-Name</th>
                    <th scope="col">Short-description</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Saller-Name</th>
                    <th scope="col">Saller-Email</th>
                    <th scope="col">Shop_name</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data['data'] as $key => $item)
                        <tr class="table-active text-center">
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $data['data'][$key]['name'] }}</td>
                            <td>{{ $data['data'][$key]['short_description'] }}</td>
                            <td>{{ $data['data'][$key]['rating'] }}</td>
                            <td>{{ number_format($data['data'][$key]['original_price'], 2) }}</td>
                            <td>{{ $data['data'][$key]['variants'][0]['qty'] }}</td>
                            <td>{{ $data['data'][$key]['seller']['name'] }}</td>
                            <td> @if ($data['data'][$key]['seller']['email']==NULL)
                                    <i>NULL</i>
                                @else
                                    {{ $data['data'][$key]['seller']['email'] }}
                                @endif 
                            </td>
                            <td>{{ $data['data'][$key]['seller']['shop_name'] }}</td>
                        </tr>
                    @endforeach  
                <tbody>
            </table>
        </div>

        <div id="overlay">
            <div class="loader"></div>
        </div>
    @endif


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    {{-- <script src="{{asset('js/script.js')}}"></script> --}}

    <script>
        // Loader Section Start
        var overlay = document.getElementById("overlay");
        window.addEventListener('load', function(){
            overlay.style.display = 'none';
        });
        // Loader Section End
    </script>

    

    
</body>

</html>