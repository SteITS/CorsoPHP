@extends('layouts.app')

@section('content')
    <main class="container my-4">
        <h1 class="mb-4">Products by {{ $user->name }}</h1>

        @if($products->isEmpty())
            <p class="text-muted">No products found for this user.</p>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card h-100">
                            @if ($product->image)
                                <img 
                                    src="{{ asset($product->image) }}" 
                                    class="card-img-top" 
                                    alt="{{ $product->name }}" 
                                    style="width:100%; height:auto;"
                                >
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                                <p class="card-text">{{ $product->description }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>
@endsection
