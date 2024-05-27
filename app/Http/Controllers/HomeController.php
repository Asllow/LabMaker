<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return redirect()->route('dashboard');
    }

    public function dashboard(){
        return view('dashboard');
    }

}

class Pessoa
{
    public function __construct($nome, $sobrenome, $cpf, $dinheiro){
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->cpf = $cpf;
        $this->dinheiro = $dinheiro;
    }

    public function comprar($preco){
        $this->dinheiro -= $preco;
    }
}
$preço = 70;
$pessoa1 = new Pessoa("Arthur", "Bladnjias", 65465965, 520000000);
$pessoa1->comprar($preco);
