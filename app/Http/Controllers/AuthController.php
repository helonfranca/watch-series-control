<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/series'); // Redirecionar para a página inicial, por exemplo
        }
        return view('welcome');
    }

    public function showRegistroForm()
    {
        return view('auth.registrar');
    }

    public function registrar(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password'
        ],[
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo de email é obrigatório.',
            'email.email' => 'Informe um endereço de email válido.',
            'email.unique' => 'Endereço de email já estar em uso.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'confirm_password.required' => 'O campo de confirmação de senha é obrigatório.',
            'confirm_password.same' => 'As senhas não coincidem.'
        ]);

        // Criação do novo usuário
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $mensagem = 'Registro concluído com sucesso! Faça login para acessar sua conta.';

        return redirect()->route('welcome')->with('success', $mensagem);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'O campo de email é obrigatório.',
            'email.email' => 'Informe um endereço de email válido.',
            'password.required' => 'O campo de senha é obrigatório.',
        ]);

        $dados = $request->only('email', 'password'); //busca apenas email e senha

        if (Auth::attempt($dados)) {
            // autenticação bem-sucedida, o usuário está agora autenticado
            $usuario = Auth::user();

            session(['nome_usuario' => $usuario->name]);

            return redirect('/series');

        } else {
            // Credenciais informadas estão incorretas
            return redirect()->back()->withErrors([
                'email' => 'Senha e/ou email da conta incorreta.',
            ]);
        }
    }
    public function logout()
    {
        Auth::logout(); // Destruir a sessão

        return redirect('/');
    }
}
