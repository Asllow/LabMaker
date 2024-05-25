@extends('layouts.header')

@section('title', 'LabMaker')

@section('body')
    @if (Route::has('entrar'))
        <div class="">
            @auth
                <a href="{{ route('home') }}" class="">Home</a>
            @else
                <a href="{{ route('entrar') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('cadastrar'))
                    <a href="{{ route('cadastrar') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
@endsection
