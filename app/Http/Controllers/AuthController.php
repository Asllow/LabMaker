<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ValidadeRegistration;
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

    public function cadastrar(){
        return view('auth/cadastrar');
    }

    public function debug_to_console($data): void
    {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    public function salvarCadastro(Request $request){
        $registrationfalse = $request->registrationfalse;
        $list = " -()";
        $listsplit = str_split($list);
        $phone = str_replace($listsplit,"",$request->phone);
        Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'registration' => new ValidadeRegistration($registrationfalse),
            'course' => 'required',
            'birth_date' => 'required|date|before:-13 years',
            'email' => 'required|email',
            'password' => ['required', 'confirmed',
            Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()]
        ])->validate();

        User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'registration' => $request->registration,
            'course' => $request->course,
            'birth_date' => $request->birth_date,
            'phone' => $phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission' => "0"
        ]);

        return redirect()->route('entrar');
    }

    public function entrar(){
        return view('auth/entrar');
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

        if (auth()->user()->permission == 'admin_all'){
            $this->debug_to_console(auth()->user()->permission);
            return redirect()->route('dashboard');
        } else{
            return redirect()->route('home');
        }
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect(route('welcome'));
    }
}
