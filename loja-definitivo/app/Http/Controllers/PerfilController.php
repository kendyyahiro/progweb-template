<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth');
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
        //exit( $usuario->password);

        if($usuario ->save()) {
            \Session::flash('mensagem', ['msg' => 'Registro atualizado com sucesso!', 'class' => 'green white-text']);
            //return redirect('/perfil/editar' );
            //return redirect()->route('perfil');
            return back()->withInput();
            //Redirect::to("dashboard/user/$id")->withInput();
        }
        //return view('perfil.editar');
    }

    public function atualizarvrlho(request $data)
    {
        $id = (int)$data['id'];
        //exit($data['id'] . $data['name']);
        $usuario = \App\User::find($id);

        $usuario->name = $data['name'];
        $usuario->email = $data['email'];
        $usuario->password =  Hash::make($data['password']);
        if($usuario->save()){
            return redirect('/usuario/update');
        }
    }


    public function deletar($id)
    {
        User::find($id)->delete();
        return redirect('/');

    }




}
