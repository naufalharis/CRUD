<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->SimplePaginate(5);
        return view('products.index')->with('products', $products)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success','Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    public function edit(string $id)
    {
        // return view('products.edit',compact('product'));
        $product = product::findOrFail($id); // Gunakan findOrFail untuk error handling yang lebih baik
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        // $product->update($request->all());
        $product = Product::findOrFail($id); // Mengambil pengguna berdasarkan ID
        $product->update([
            'name'     => $request->name,
            'detail'    => $request->detail,
             // Update role pengguna
        ]);

        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    public function destroy(string $id)
    {
        $user= Product::destroy($id);;

        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
