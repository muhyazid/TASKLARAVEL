@extends('layouts.master')

@section('container')
    <h1 class="h2">Edit Product</h1>
    <form action="{{ route('product.update', $product->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $product->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select class="form-select" id="kategori_id" name="kategori_id" required>
                <option value="" disabled>Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $product->kategori_id) selected @endif>
                        {{ $category->kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ $product->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $product->harga }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
