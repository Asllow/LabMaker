@extends('layouts.app')

@section('title', 'Criar Produtos')

@section('contents')
    <h1 class="font-bold text-2xl ml-3">Adicionar Produtos</h1>
    <hr />
    <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <form action="{{route('makesoft.produtos.store')}}" method="PUT" enctype="multipart/form-data">
                @csrf
                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Nome do Produto</label>
                    <div class="mt-2">
                        <input type="text" name="nome_produto" id="nome_produto" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Link da Imagem do Produto</label>
                    <div class="mt-2">
                        <input type="text" name="img_produto" id="img_produto" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Preço do Produto</label>
                    <div class="mt-2">
                        <input id="preco_produto" name="preco_produto" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Descrição</label>
                    <div class="mt-2">
                        <textarea name="desc_produto" placeholder="Descrição" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium leading-6 text-gray-900">Dimensões do Produto</label>
                    <div class="mt-2">
                        <input id="dimensao_produto" name="dimensao_produto" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <button type="submit" class="flex w-full justify-center mt-10 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Enviar</button>
            </form>
        </div>
    </div>
@endsection
