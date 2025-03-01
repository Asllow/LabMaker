<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ValidadeRegistration;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function cadastrar(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $page = 'cadastrar';
        return view('auth/cadastrar', compact('page'));
    }

    public function salvarCadastro(Request $request): RedirectResponse
    {
        $registrationfalse = $request->registrationfalse;
        $list = " -()";
        $listsplit = str_split($list);
        $phone = str_replace($listsplit,"",$request->phone);
        Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'registration' => ["unique:users,registration", new ValidadeRegistration($registrationfalse)],
            'course' => 'required',
            'birth_date' => 'required|date|before:-13 years',
            'email' => 'unique:users,email|required|email',
            'password' => ['required', 'confirmed',
            Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()]
        ])->validate();

        $new_name = ucwords($request->name);
        $new_last_name = ucwords($request->last_name);

        User::create([
            'name' => $new_name,
            'last_name' => $new_last_name,
            'registration' => $request->registration,
            'course' => $request->course,
            'birth_date' => $request->birth_date,
            'phone' => $phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission_maker' => "0",
            'permission_era' => "0",
            'permission_makesoft' => "0"
        ]);

        return redirect()->route('entrar');
    }

    public function entrar(){
        $page = 'entrar';
        return view('auth/entrar', compact('page'));
    }

    public function entrarAction(Request $request){
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))){
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect(route('welcome'));
    }

    public function termosecondicoes(){

    }

    public function politicasdeprivacidade(){

    }
}
