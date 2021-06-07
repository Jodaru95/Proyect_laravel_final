<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $misPerfiles=Perfil::orderBy('nombre')->paginate(5);
        return view('perfiles.index',compact('misPerfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfiles.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['required','string','min:5','max:20','unique:perfils,nombre'],
            'descripcion'=>['required','string','min:5','max:200']
        ]);
        try {
            Perfil::create($request->all());
        }catch(Exception $ex){
            return redirect()->route('perfiles.index')->with("mensaje","Error al crear el perfil,intentelo de nuevo");
        }
        return redirect()->route('perfiles.index')->with("mensaje","Perfil creado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfile)
    {
        return view('perfiles.detalles',compact('perfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfile)
    {
        return view('perfiles.editar',compact('perfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfile)
    {
        $request->validate([
            'nombre'=>['required','string','min:5','max:20','unique:perfils,nombre,'.$perfile->id],
            'descripcion'=>['required','string','min:5','max:200']
        ]);
        try {
            $perfile->update($request->all());
        }catch(Exception $ex){
            return redirect()->route('perfiles.index')->with("mensaje","Error al actualizar el perfil,intentelo de nuevo");
        }
        return redirect()->route('perfiles.index')->with("mensaje","Perfil actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfile)
    {
        try{
            $perfile->delete();
        }catch(Exception $ex){
            return redirect()->route('perfiles.index')->with("mensaje","Error al borrar el perfil, intentelo de nuevo");
        }
        return redirect()->route('perfiles.index')->with("mensaje","Perfil borrado correctamente");
    }
}
