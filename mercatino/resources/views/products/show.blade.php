@extends('layouts.app')

@section('content')
    <main class="container my-4">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $product->name }}</h1>
                <p class="card-text"><strong>Category:</strong> {{ $product->category->name }}</p>
                <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p class="card-text">{{ $product->description }}</p>

                @if ($product->image)
                    <div class="text-center my-3">
                        <img 
                            src="{{ asset($product->image) }}" 
                            alt="{{ $product->name }}" 
                            class="img-fluid"
                        >
                    </div>
                @endif

                <p class="card-text">
                    <strong>Created by:</strong> 
                    <a href="{{ route('user.products', $product->user->id) }}">
                        {{ $product->user->name }}
                    </a>
                </p>
            </div>
        </div>

        @auth
            @if ($product->user_id === auth()->id())
                <!-- Edit and Delete Options -->
                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit Product</a>

                    <form 
                        action="{{ route('products.destroy', $product->id) }}" 
                        method="POST" 
                        onsubmit="return confirm('Are you sure you want to delete this product?');" 
                        style="display: inline;"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Product</button>
                    </form>
                </div>
            @endif
        @endauth
    </main>
@endsection
