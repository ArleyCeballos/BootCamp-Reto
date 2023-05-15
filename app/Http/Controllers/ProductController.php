<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('store.products.index', [
            'products' => Product::paginate(5)
        ]);
    }

    public function search(Request $request)
    {
        $name = $request->input('product');
        $products = Product::where('name', 'like', "%$name%")->get();


        return view('store.products.template', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::where('status', '1')->get();
        return view('store.products.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'stock' => 'required|numeric',
            'description' => 'required',
            'status' => 'required|in:active,inactive',
            'categorie_id' => 'required|exists:categories,id'
        ]);


        $product = new Product();
        $product->code = $request->input('code');
        $product->name = $request->input('name');
        $product->stock = $request->input('stock');
        $product->description = $request->input('description');
        $product->status = $request->input('status');
        $product->categorie_id = $request->input('categorie_id');
        $product->save();



        try {
            $product->save();
            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Error creating product: ' . $e->getMessage());
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Categorie::all();
        return view('store.products.edit', compact('product', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {

        $product = Product::findOrFail($id);

        $product->code = $request->validated()['code'];
        $product->name = $request->validated()['name'];
        $product->stock = $request->validated()['stock'];
        $product->description = $request->validated()['description'];
        $product->status = $request->validated()['status'];
        $product->categorie_id = $request->validated()['categorie_id'];

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente');
    }
}