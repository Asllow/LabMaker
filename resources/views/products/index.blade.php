@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('contents')
    <div>
        <h1 class="font-bold text-2xl ml-3">Lista de Produtos</h1>
        <a href="{{route('dashboard/produtos')}}" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Adicionar Produto</a>
        <hr/>
    </div>
@endsection
