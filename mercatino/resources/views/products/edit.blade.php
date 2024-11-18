@extends('layouts.app')
<link 
  rel="stylesheet" 
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
  integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLR+1QmJLkhIl5Y53QqMEgKX1pFklzDe1H7V76fI1S" 
  crossorigin="anonymous"
/>
@section('content')
    <main class="container my-4">
        <h1 class="mb-4">Edit Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control" 
                    value="{{ old('name', $product->name) }}" 
                    required
                >
                <div class="invalid-feedback">
                    Please enter a product name.
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="5" 
                    class="form-control"
                >{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input 
                    type="number" 
                    name="price" 
                    id="price" 
                    step="0.01" 
                    class="form-control" 
                    value="{{ old('price', $product->price) }}" 
                    required
                >
                <div class="invalid-feedback">
                    Please enter a valid price.
                </div>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select name="category_id" id="category" class="form-select" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please select a category.
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image:</label>
                <input 
                    type="file" 
                    name="image" 
                    id="image" 
                    class="form-control"
                >
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </main>
@endsection
