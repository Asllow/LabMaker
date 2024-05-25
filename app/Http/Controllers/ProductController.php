<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();
        return view('products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request = $this->checkNull($request);
        return $request;
        Product::create($request->all());
        return redirect()->route('makesoft.produtos')->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('makesoft.produtos')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('makesoft.produtos')->with('success', 'Produto apagado com sucesso!');
    }

    private function checkNull(Request $request): Request
    {
        if ($request->nome_produto == null){$request->nome_produto = '';}
        if ($request->img_produto == null){$request->img_produto = '';}
        if ($request->preco_produto == null){$request->preco_produto = 0;}
        if ($request->desc_produto == null){$request->desc_produto = '';}
        if ($request->dimensao_produto == null){$request->dimensao_produto = '';}
        return $request;
    }
}
