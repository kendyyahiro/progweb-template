<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
       
    }

    public function editar()
    {
        return view('perfil.editar');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Esse método atualiza o usuário
     * 
     * @param Request - Requisição
     * @param Integer $id - Recebe o id do usuário a ser atualizado
     */
    public function atualizar(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $usuario = User::find($id);
        $data = $request->all();
        $usuario->name = $data['name'];
        $usuario->email = $data['email'];
        $usuario->password =  Hash::make($data['password']);

        if($usuario ->save()) {
            session()->flash('mensagem', 'Registro atualizado com sucesso!');
            session()->flash('alert', 'alert-success');

            return back()->withInput();
        }
    }

    // public function atualizarvrlho(request $data)
    // {
    //     $id = (int)$data['id'];
    //     //exit($data['id'] . $data['name']);
    //     $usuario = \App\User::find($id);

    //     $usuario->name = $data['name'];
    //     $usuario->email = $data['email'];
    //     $usuario->password =  Hash::make($data['password']);
    //     if($usuario->save()){
    //         return redirect('/usuario/update');
    //     }
    // }

    /**
     * Esse método verifica se esse usuário possui algum anúncio/produto cadastrado
     * Caso tenha, não permitirá a exclusão dele.
     * 
     * @param Integer $id - id do usuário a ser deletado
     */
    public function deletar($id)
    {
        $produto = Produto::where('user_id', '=', $id);

        if($produto->count() > 0){
            session()->flash('mensagem', 'Não pode ser deletado. Usuário possui anúncios.');
            session()->flash('alert', 'alert-danger');
            return back()->withInput();
        }else{
            User::find($id)->delete();

            //Testar isso
            return redirect('/');
        }
    }
}
