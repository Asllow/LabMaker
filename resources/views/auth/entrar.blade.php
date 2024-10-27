@extends('layouts.header')

@section('title', 'Entrar')

@section('main')
    <section class="section">
        <div class="">
            <div class="">Entrar</div>
            <div class="">
                <div class="">
                    <h1 class="">Entrar na sua conta</h1>
                    <form class="" method="post" action="{{ route('entrar.action') }}">
                        @csrf
                        @if ($errors->any())
                        <div class="" role="alert">
                            <strong class="">Erro!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li><span class="">{{ $error }}</span></li>
                                @endforeach
                            </ul>
                            <span class="">
                                <svg class="" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Fechar</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                        @endif
                        <div>
                            <label for="email" class="">Seu email</label>
                            <input type="email" name="email" id="email" class="" placeholder="nome@instituição.com" required="">
                        </div>
                        <div>
                            <label for="password" class="">Senha</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="" required="">
                        </div>
                        <div class="">
                            <div class="">
                                <div class="">
                                    <input name="remember" id="remember" aria-describedby="remember" type="checkbox" class="" required="">
                                </div>
                                <div class="">
                                    <label for="remember" class="">Lembrar-se de mim</label>
                                </div>
                            </div>
                            <a href="#" class="">Esqueceu a senha?</a>
                        </div>
                        <button type="submit" class="">Entrar</button>
                        <p class="">Não tem uma conta ainda? <a href="{{ route('cadastrar') }}" class="">Cadastrar</a></p>
                    </form>
                </div>
            </div>
        </div>
        <div class="container2">
            <div class="backbox">
                <div class="loginMsg">
                    <div class="textcontent">
                        <p class="title-alt">Não tem uma conta ainda?</p>
                        <button id="switch1">Sign Up</button>
                    </div>
                </div>
            </div>
            <div class="frontbox">
                <div class="login">
                    <h2>LOG IN</h2>
                    <div class="inputbox">
                        <input type="text" name="email" placeholder="  EMAIL">
                        <input type="password" name="password" placeholder="  PASSWORD">
                    </div>
                    <p>FORGET PASSWORD?</p>
                    <button>LOG IN</button>
                </div>
            </div>
            <!-- frontbox -->
        </div>
    </section>
@endsection
