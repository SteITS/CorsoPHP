@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercatino del Rumeno</title>
    <link 
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLR+1QmJLkhIl5Y53QqMEgKX1pFklzDe1H7V76fI1S" 
        crossorigin="anonymous"
    >
</head>
<body>
<style>
  img {
    max-width: 100%;
    height: auto;
  }
</style>

@section('content')
    <main class="container my-4">
        @auth
            <div class="mb-4">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Insertion</a>
            </div>
        @endauth

        <!-- Product List -->
        <div class="row g-4">
            @forelse ($products as $product)
                <div class="col-md-4">
                    <div class="card h-100">
                        @if ($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">You have not created any insertion yet.</p>
                </div>
            @endforelse
        </div>
    </main>
@endsection
</body>
</html>
