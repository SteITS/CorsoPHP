@extends('layouts.app')

@section('content')
    <main class="container my-4">
        <h1 class="mb-4">Marketplace Products</h1>

        <!-- Filter Form -->
        <form action="{{ route('products.index') }}" method="GET" class="mb-4">
            <div class="mb-3">
            <label for="search">Search by Title</label>
            <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" placeholder="Search for a product...">
                <label for="category" class="form-label">Filter by Category:</label>
                <select name="category" id="category" class="form-select" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <!-- Product List -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100">
                        @if ($product->image)
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
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
        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>

    </main>
@endsection
