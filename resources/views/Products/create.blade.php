@extends('layouts.master')

@section('container')
    <h1 class="h2">Create Product</h1>
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Produk</label>
            <input type="text" class="form-control" id="name" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
