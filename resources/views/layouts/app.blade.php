@extends('layouts.header')

@section('main')
    <div class="flex flex-row">
        <h2>lala</h2>
        <div>
            @yield('dashbar')
        </div>
        {{--<div class="">
            <div class="text-gray-100 text-xl">
                <div class="p-2.5 mt-1 flex items-center">
                    <i class="bi bi-app-indicator px-2 py-1 rounded-md bg-blue-600"></i>
                    <h1 class="font-bold text-gray-200 text-[15px] ml-3">Admin</h1>
                </div>
                <div class="my-2 bg-gray-600 h-[1px]"></div>
            </div>
            <a href="{{ route('dashboard') }}">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                    <i class="bi bi-house-door-fill"></i>
                    <span class="text-[15px] ml-4 text-gray-200 font-bold">Início</span>
                </div>
            </a>
            @if(auth()->user()->permission_makesoft >= '1')
                <a href="{{route('makesoft.produtos')}}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                        <i class="bi bi-bookmark-fill"></i>
                        <span class="text-[15px] ml-4 text-gray-200 font-bold">Produtos</span>
                    </div>
                </a>
            @endif
            <a href="{{route('dashboard.perfil')}}">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                    <i class="bi bi-bookmark-fill"></i>
                    <span class="text-[15px] ml-4 text-gray-200 font-bold">Perfil</span>
                </div>
            </a>
            <a href="{{route('sair')}}">
                <div class="my-4 bg-gray-600 h-[1px]"></div>
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span class="text-[15px] ml-4 text-gray-200 font-bold">Sair</span>
                </div>
            </a>
        </div>
        --}}
        <div>
            @yield('contents')
        </div>
    </div>
@endsection
