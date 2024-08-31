@extends('layouts.master')

@section('container')
    <h1 class="h2">Create Product</h1>
    <form action="{{ route('product.store') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Produk</label>
            <input type="text" class="form-control" id="name" name="nama" placeholder="Masukkan nama produk"
                required>
        </div>
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            {{-- dropdown --}}
            <select class="form-control" id="kategori_id" name="kategori_id" required>
                <option value="" disabled selected>Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi produk" rows="3"
                required></textarea>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga produk"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
