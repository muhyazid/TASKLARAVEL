@extends('layouts.master')

@section('container')
    <h1 class="h2">Delete Product</h1>
    <p>Are you sure you want to delete this product?</p>
    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Yes, delete</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
