@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('contents')
    <div>
        <h1 class="font-bold text-2xl ml-3">Lista de Produtos</h1>
        <a href="{{route('makesoft.produtos.criar')}}" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Product</a>
        <hr />
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Imagem</th>
                <th scope="col" class="px-6 py-3">Nome</th>
                <th scope="col" class="px-6 py-3">Preço</th>
                <th scope="col" class="px-6 py-3">Dimensão</th>
                <th scope="col" class="px-6 py-3">Descrição</th>
                <th scope="col" class="px-6 py-3">Ações</th>
            </tr>
            </thead>
            <tbody>
            @if($product->count() > 0)
                @foreach($product as $rs)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td>
                            <img src="{{ $rs->img_produto }}">
                        </td>
                        <td>
                            {{ $rs->nome_produto }}
                        </td>
                        <td>
                            {{ $rs->preco_produto }}
                        </td>
                        <td>
                            {{ $rs->dimensao_produto }}
                        </td>
                        <td>
                            {{ $rs->desc_produto }}
                        </td>
                        <td class="w-36">
                            <div class="h-14 pt-5">
                                <a href="" class="text-blue-800">Detalhes</a> |
                                <a href="" class="text-green-800 pl-2">Editar</a> |
                                <form action="" method="POST" onsubmit="return confirm('Delete?')" class="float-right text-red-800">
                                    @csrf
                                    @method('DELETE')
                                    <button>Apagar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Product not found</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
