@extends('layouts.header')

@section('title', 'Entrar')

@section('main')
    <section class="section">
        <div class="container2">
            <div class="backbox">
                <div class="loginMsg">
                    <div class="textcontent">
                        <p class="title-alt">Não tem uma conta ainda?</p>
                        <a id="switch1" href="{{ route('cadastrar') }}" >Cadastrar</a>
                    </div>
                </div>
            </div>
            <div class="frontbox">
                <div class="login">
                    <h2 class="title">Entrar</h2>
                    <p>Entrar na sua conta</p>
                    <form class="inputbox" method="post" action="{{ route('entrar.action') }}">
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
                            <div class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <input type="email" name="email" id="email" class="" placeholder="nome@instituição.com" required="">
                            </div>
                        </div>
                        <div>
                            <label for="password" class="">Senha</label>
                            <div class="input-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input type="password" name="password" id="password" placeholder="••••••••" class="" required="">
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <div class="rememberme">
                                    <input name="remember" id="remember" aria-describedby="remember" type="checkbox" class="checkbox" required="">
                                    <label for="remember" class="">Lembrar-se de mim</label>
                                </div>
                            </div>
                        </div>
                        <div class="adjust">
                            <a href="#" class="">Esqueceu a senha?</a>
                        </div>
                        <button type="submit" class="">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
