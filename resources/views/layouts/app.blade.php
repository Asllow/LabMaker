@extends('layouts.header')

@section('main')
    <div class="navbar">
        <div class="nav-item">
            <div class="itens">
                <div class="separator-items">
                    <a class="@if($page=='dashboard') active @endif selector" href="{{ route('dashboard') }}">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Dashboard</span>
                    </a>
                    </a>
                </div>
                <div class="separator-items line">
                    @if(auth()->user()->permission_makesoft >= '1')
                        <a class="@if($page=='product') active @endif selector" href="{{route('makesoft.produtos')}}">
                            <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-2 text-sm font-medium">Produtos</span>
                        </a>
                    @endif
                    <a class="@if($page=='perfil') active @endif selector" href="{{route('dashboard.perfil')}}">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium">Perfil</span>
                    </a>
                </div>
            </div>
            <a class="flex items-center justify-center w-full h-16 mt-auto bg-gray-200 hover:bg-gray-300" href="{{route('sair')}}">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M13.8 12H3"/>
                </svg>
                <span class="ml-2 text-sm font-medium">Sair</span>
            </a>
        </div>
        <div class="display">
            @yield('contents')
        </div>
    </div>
@endsection
