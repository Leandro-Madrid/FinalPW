<!DOCTYPE html>
<html lang=""{{ 'app.local' }}"">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Producto Nº {{ $product->id }}</title>
</head>

<body>

    <header>
        <div class="container bg-light text-center py-2">
            <div class=" d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('web.index') }}">
                    <img src="{{ asset('toy.png') }}" alt="Logo">
                </a>
                <h1 class="mx-auto">RETROSPECTICUS</h1>
                <nav class="navbar navbar-expand-lg navbar-light py-2 mb-4 align-top">
                    <div class="">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('web.index') }}">Productos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cart.view') }}">Carrito</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class= "text-center">
                <h2>Producto Nº {{ $product->id }}</h2>
            </div>
        </div>
    </header>

    <main>
        <div class="container text-center mt-3">
            <div class="d-flex justify-content-center mx-auto">
                <div class="card" style="width: 20rem;">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen del producto">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->name }}</h3>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Precio: ${{ $product->price }}</p>
                        <form action="{{ url('/cart/add') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit " class="btn btn-success">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
