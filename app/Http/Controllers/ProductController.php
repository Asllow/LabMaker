<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $product = Product::orderBy('created_at', 'DESC')->get();
        return view('products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = $this->checkNull($request);
        return $request;
        Product::create();
        return redirect()->route('makesoft.produtos')->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('makesoft.produtos')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('makesoft.produtos')->with('success', 'Produto apagado com sucesso!');
    }

    private function checkNull($request)
    {
        $response = [];
        if ($request->nome_produto == null){$response['nome_produto'] = "";}else{$response['nome_produto'] = $request->nome_produto;}
        if ($request->nome_produto == null){$response['nome_produto'] = "";}else{$response['nome_produto'] = $request->nome_produto;}
        return $response;
    }
}
