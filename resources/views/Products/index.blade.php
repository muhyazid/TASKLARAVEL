@extends('layouts.master')

@section('header')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product</h1>
    </div>
@endsection

@section('container')
    <a href="{{ route('product.create') }}" class="btn btn-success btn-sm mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Produk
    </a>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->nama }}</td>
                        <td><span class="badge bg-primary">{{ $product->category->kategori }}</span></td>
                        <td>{{ $product->deskripsi }}</td>
                        <td>{{ $product->harga }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
