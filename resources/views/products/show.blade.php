@extends('layouts.app')

@section('title', 'Mostrar Produto')

@section('contents')
    <h1 class="font-bold text-2xl ml-3">Detalhes do Produto</h1>
    <hr />
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                <div class="mt-2">
                    {{ $product->nome_produto }}
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-gray-900">Imagem</label>
                <div class="mt-2">
                    {{ $product->img_produto }}
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-gray-900">Preço</label>
                <div class="mt-2">
                    {{ $product->preco_produto }}
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-gray-900">Dimensões</label>
                <div class="mt-2">
                    {{ $product->dimensao_produto }}
                </div>
            </div>
            <div class="sm:col-span-4">
                <label class="block text-sm font-medium leading-6 text-gray-900">Descrição</label>
                <div class="mt-2">
                    {{ $product->desc_produto }}
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
