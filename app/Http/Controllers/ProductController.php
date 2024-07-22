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
    public function store(Request $request): RedirectResponse
    {
        $response = $this->checkNull($request);
        Product::create($response);
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
        $response = $this->checkNull($request);
        $product = Product::findOrFail($id);
        $product->update($response);
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

    private function checkNull($request): array
    {
        $response = [];
        if ($request->nome_produto == null){$response['nome_produto'] = "";}else{$response['nome_produto'] = $request->nome_produto;}
        if ($request->img_produto == null){$response['img_produto'] = "";}else{$response['img_produto'] = $request->img_produto;}
        if ($request->preco_produto == null){$response['preco_produto'] = 0;}else{$response['preco_produto'] = $request->preco_produto;}
        if ($request->pix_produto == null){$response['pix_produto'] = "";}else{$response['pix_produto'] = $request->pix_produto;}
        if ($request->desc_produto == null){$response['desc_produto'] = "";}else{$response['desc_produto'] = $request->desc_produto;}
        if ($request->dimensao_produto == null){$response['dimensao_produto'] = "";}else{$response['dimensao_produto'] = $request->dimensao_produto;}
        return $response;
    }
}
