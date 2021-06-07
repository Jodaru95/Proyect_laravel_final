<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\{Usuario,Perfil};
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $misUsuarios=Usuario::orderBy('nomusu')->orderBy('localidad')->paginate(5);
        return view('usuarios.index',compact('misUsuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $misPerfiles=Perfil::getArrayIdNombre();
        return view('usuarios.crear',compact('misPerfiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.-Valido los datos
        $request->validate([
            'nomusu' => ['required', 'string', 'min:3', 'max:50', 'unique:usuarios,nomusu', 'regex:/^\S*$/u'],
            'mail' => ['required', 'string', 'min:5', 'max:60', 'unique:usuarios,email'],
            'localidad' => ['required', 'string', 'min:3', 'max:90'],
            'perfil_id'=>['required']
        ]);
        //2.-Proceso los datos
        try {
            Usuario::create($request->all());
        }catch(Exception $ex){
            return redirect()->route('usuarios.index')->with("mensaje","Error al crear el usuario,intentelo de nuevo");
        }
        return redirect()->route('usuarios.index')->with("mensaje","Usuario creado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        $perfiles=Perfil::getArrayIdNombre();
        return view('usuarios.detalles',compact('usuario','perfiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $misPerfiles=Perfil::getArrayIdNombre();
        return view('usuarios.editar',compact('usuario','misPerfiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //1.-Valido los datos
        $request->validate([
            'nomusu' => ['required', 'string', 'min:3', 'max:50', 'unique:usuarios,nomusu,'.$usuario->id, 'regex:/^\S*$/u'],
            'mail' => ['required', 'string', 'min:5', 'max:60', 'unique:usuarios,email,'.$usuario->id],
            'localidad' => ['required', 'string', 'min:3', 'max:90'],
            'perfil_id'=>['required']
        ]);
        //2.-Proceso los datos
        try {
            $usuario->update($request->all());
        }catch(Exception $ex){
            return redirect()->route('usuarios.index')->with("mensaje","Error al actualizar el usuario,intentelo de nuevo");
        }
        return redirect()->route('usuarios.index')->with("mensaje","Usuario actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        try{
            $usuario->delete();
        }catch(Exception $ex){
            return redirect()->route('usuarios.index')->with("mensaje","Error:".$ex->getMessage());
        }
        return redirect()->route('usuarios.index')->with("mensaje","Usuario borrado correctamente");
    }
}
