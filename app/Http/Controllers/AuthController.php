<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $request){   
        
        //Validação do Formulario. Exige que os campos sejam preenchidos
        $request->validate(
            //regras
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            //mensagens de erro  
            [
                'text_username.required' => 'O Nome de Usuário é obrigatório',
                'text_username.email' => 'O Nome de Usuário deve ser um email válido',
                'text_password.required' => 'A Senha é obrigatória',
                'text_password.min' => 'A Senha deve ter pelo menos :min caracteres',
                'text_password.max' => 'A Senha deve ter no máximo :max caracteres'
            ]
            );

        //obtendo o input do usuário no form
        $usuario = $request->input('text_username');
        $senhaUsuario = $request->input('text_password');
        
        //verificando se o usuário existe no Banco de Dados
        $user = User::where('nome_usuario', $usuario)->where('deleted_at',NULL)->first();
        
        if(!$user){
            return redirect()->back()->withInput()->with('loginError', 'Nome de Usuário ou Senha incorretos.');
        }

        //verificando se a Senha está correta de acordo com o Banco de Dados
        if(!password_verify($senhaUsuario, $user->senha)){
            return redirect()->back()->withInput()->with('loginError', 'Nome de Usuário ou Senha incorretos.');
        }

        //atualiza o atributo ultimo_login da tabela users
        $user->ultimo_login = date('Y-m-d H:i:s');
        $user->save();

        //colocar os dados do usuário logado na sessão 
        session([
            'user' => [
                'id' => $user->id,
                'nome_usuario' => $user-> nome_usuario
            ]
        ]);

        //redireciona para a home
        return redirect()->to('/');
                       
        //teste de conexão com o Banco de Dados
        //try{
        //    DB::connection()->getPdo();
        //    echo 'Conexão Bem Sucedida!';
        //}catch(\PDOException $e){
        //    echo "A Conexão Falhou: " . $e->getMessage();
        //}
    }

    public function logout(){
        //fazendo logout
        session()->forget('user');
        return redirect()->to('/login');
    }
}
