@extends('layouts.master')

@section('container')
    <h1 class="h2">Edit Product</h1>
    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $product->deskripsi }}"
                required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $product->harga }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
