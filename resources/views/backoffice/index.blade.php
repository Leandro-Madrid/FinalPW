<!DOCTYPE html>
<html lang=""{{'app.local'}}"">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Productos</title>
</head>

<body>

    <header>
        <div class="container bg-light py-2">
            <div class=" d-flex align-items-center">
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
                                <li class="nav-item"><a class="nav-link" href="{{ route('web.index') }}">Vista
                                        Cliente</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class= "text-center">
                <h2>Administrador</h2>
            </div>
        </div>
    </header>

    <main>
        <div class="container mt-3">
            <div class="my-3">
                <a href="{{ route('backoffice.create') }}" class="btn btn-success px-4 py-2">AGREGAR PRODUCTO</a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="align-middle text-center">Imagen</th>
                                <th class="align-middle text-center">Nombre</th>
                                <th class="align-middle text-center">Descripción</th>
                                <th class="align-middle text-center">Precio</th>
                                <th class="align-middle text-center">Categoría</th>
                                <th class="align-middle text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="align-middle text-center"><img src="{{ $product->image }}" alt="Imagen del producto"
                                            class="img-thumbnail py-3 mt-3"></td>
                                    <td class="align-middle text-center">{{ $product->name }}</td>
                                    <td class="align-middle text-center">{{ $product->description }}</td>
                                    <td class="align-middle text-center">{{ $product->price }}</td>
                                    <td class="align-middle text-center">{{ $product->category->name }}</td>
                                    <td class="align-middle text-center">
                                        <a href="{{ route('backoffice.edit', $product->id) }}"
                                            class="btn btn-primary"><span class="fa fa-pencil"></span></a>
                                        <form action="{{ route('backoffice.destroy', $product->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('¿Estás seguro de eliminar este producto?');">
                                                <span class="fa fa-trash"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Todavía no hay productos cargados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
