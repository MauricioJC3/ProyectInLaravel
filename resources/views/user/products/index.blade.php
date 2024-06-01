@extends('layouts.navbarUser')

@section('content')
<div class="container">
    <h1>Productos</h1>
    <form action="{{ route('user.products.index') }}" method="GET">
        <input type="text" name="search" placeholder="Buscar producto">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <div class="row mt-4">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->nombre_product }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->nombre_product }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">${{ $product->price_product }}</p>
                        <form action="{{ route('user.cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-success">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
