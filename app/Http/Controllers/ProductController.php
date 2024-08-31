<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use function Laravel\Prompts\text;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with('category')->get();
        return view('Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('Products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // menyimpan data baru ke database
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:categories,id',   // Validasi untuk memastikan kategori ada
            'deskripsi' => 'required',
            'harga' => 'required|integer'
        ]);

        Product::create([
        'nama' => $request->nama,
        'kategori_id' => $request->kategori_id,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        // Ambil data produk berdasarkan ID
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('Products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:categories,id',
            'deskripsi' => 'required',
            'harga' => 'required|numeric'
        ]);

        $product->update($request->only(['nama', 'kategori_id', 'deskripsi', 'harga']));
        return redirect()->route('product.index');
    }

    public function edit (string $id){
        $product=Product::findOrFail($id);
        $categories=Category::all();

        return view('Products.edit', compact('product','categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    // hapus product
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('product.index');
    }
}
