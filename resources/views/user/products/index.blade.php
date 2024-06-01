<!-- En tu archivo Blade -->
@extends('layouts.navbarUser')

<style>
    /* Overall container styling */
.container {
  padding: 2rem;
}

/* Product heading */
h1.mb-4 {
  text-align: center;
  font-size: 1.8rem;
  margin-bottom: 2rem;
}

/* Search form styling */
.form-control {
  border-radius: 0.5rem;
  border-color: #cccccc; /* Light gray border */
}

.btn-primary {
  background-color: #007bff; /* Blue button */
  border-color: #007bff;
  border-radius: 0.5rem;
}

/* Product card styling */
.card-columns {
  column-gap: 1rem; /* Spacing between cards */
}

.card {
  border-radius: 0.5rem;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.card-img-top {
  height: 200px; /* Adjust image height as needed */
  object-fit: cover; /* Crop image to fit within container */
}

.card-body {
  padding: 1rem;
}

.card-title {
  font-weight: bold;
}

.card-text {
  color: #333; /* Grayish text color */
}

.card-footer {
  padding: 0.75rem 1rem;
  background-color: #f8f9fa; /* Light background for footer */
}

.btn-success {
  background-color: #28a745; /* Green button */
  border-color: #28a745;
  border-radius: 0.5rem;
}

/* Responsive card layout */
@media (max-width: 768px) {
  .card-columns {
    column-count: 2; /* Two cards per row */
  }
}

@media (max-width: 576px) {
  .card-columns {
    column-count: 1; /* One card per row */
  }
}

</style>

@section('content')
<div class="container">
    <h1 class="mb-4">Productos</h1>
    <form action="{{ route('user.products.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar producto">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>
    <div class="card-columns">
        @foreach($products as $product)
            <div class="card mb-4">
                <img src="{{ asset('assets/images/' . $product->image) }}" class="card-img-top" alt="{{ $product->nombre_product }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->nombre_product }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                </div>
                <div class="card-footer">
                    <p class="card-text">${{ $product->price_product }}</p>
                    <form action="{{ route('user.cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-success">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
