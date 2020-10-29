<?php

namespace App\Http\Controllers;
use App\Models\Cadastros;
use Redirect;
use Illuminate\Http\Request;

class CadastrosController extends Controller
{
    public function index(){

        $cadastros = Cadastros::get();
        return view('cadastros/list', ['cadastros' => $cadastros]);
    }

    public function novo() {
        return view('cadastros/novo');
    }

    public function add( Request $request ) {
        
       // $cadastro = new Cadastros;
       // $cadastro = $cadastro->create( $request->all() );
      //  return Redirect::to('/cadastros');
        Cadastros::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data_nascimento,
            'curriculo' => $request->curriculo,

        ]);
        return Redirect::to('/cadastros');
    }


    public function edit( $id ){
        $cadastro = Cadastros::findOrFail( $id );
        return view('cadastros/novo', ['cadastro' => $cadastro]);
    }

    public function update( $id, Request $request ){

        $cadastro = Cadastros::findOrFail( $id );
        $cadastro->update($request->all());
        return Redirect::to('/cadastros');
    }


    public function delete( $id ){

        $cadastro = Cadastros::findOrFail( $id );
        $cadastro->delete();
        return Redirect::to('/cadastros');
    }
}
