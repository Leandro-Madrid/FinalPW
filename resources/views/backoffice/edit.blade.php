<!DOCTYPE html>
<html lang=""{{'app.local'}}"">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Editar Producto</title>
</head>

<body>

    <header>
        <div class="container bg-light py-2">
            <div class="  d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('web.index') }}">
                    <img src="{{ asset('toy.png') }}" alt="Logo">
                </a>
                <h1 class="mx-auto">RETROSPECTICUS</h1>
                <nav class="navbar navbar-expand-lg navbar-light py-2 mb-4 align-top">
                    <div class="container">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('backoffice.index') }}">Administrador</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class= " text-center">
                <h2>Editar producto</h2>
            </div>
        </div>
    </header>

    <main>
        <div class="container mt-3">
            <div class="row">
                <div class="md-12">
                    <form action="{{ route('backoffice.update', ['id' => $product->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group my-3">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $product->name }}" required>
                        </div>
                        <div class="form-group my-3">
                            <label for="description">Descripción</label>
                            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group my-3">
                            <label for="price">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price"
                                value="{{ $product->price }}">
                        </div>
                        <div class="form-group my-3">
                            <label for="category_id">Categoría</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if ($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group my-3">
                            <label for="image">Imagen</label>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen del producto" style="max-width: 100px; max-height: 100px;">
                            @endif
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary my-3">Actualizar Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
