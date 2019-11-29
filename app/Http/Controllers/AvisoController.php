<?php

namespace App\Http\Controllers;

use App\Aviso;
use App\Vecino;
use Illuminate\Http\Request;
use DateTime;

class AvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Aviso::latest('updated_at')->get();
        return view('avisos.avisos', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('avisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vecino = new Aviso();

            if (request('vec') != null){
                $vecino->id_vecinos = request('vec');
            }
            if (request('pro') != null){
                $vecino->id_proovedores = request('pro');
            }
            if (request('incidencia') != null){
                $vecino->incidenia = request('incidencia');
            }
            if (request('descripcion') != null){
                $vecino->descripcion = request('descripcion');
            }
            if (request('accion') != null){
                $vecino->accion = request('accion');
            }
            if (request('tipo_contacto') != null){
                $vecino->tipo_contacto = request('tipo_contacto');
            }

            $vecino->atendido = auth()->user()->name;

            $vecino->save();

        return redirect()->route('avisos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(request('nombre2') == "Selecciona..."){
             return redirect()->route('avisos');
         }

        if(request('nombre2') != null){
            $temp = Vecino::where('comunidades_id',request('nombre2'))->first();
         $notas = Aviso::where('id_vecinos',$temp->comunidades_id)->paginate(10);
         return view('avisos.avisos', compact('notas'));}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aviso $nota)
    {
        return view('avisos.edit', [
            'nota' => $nota,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Aviso $nota)
    {

            if (request('vec') != null){
                $nota->id_vecinos = request('vec');
            }
            if (request('pro') != null){
                $nota->id_proovedores = request('pro');
            }
            if (request('incidencia') != null){
                $nota->incidenia = request('incidencia');
            }
            if (request('descripcion') != null){
                $nota->descripcion = request('descripcion');
            }
            if (request('accion') != null){
                $nota->accion = request('accion');
            }
            if (request('tipo_contacto') != null){
                $nota->tipo_contacto = request('tipo_contacto');
            }

            $nota->atendido = auth()->user()->name;

            $nota->update();

        return redirect()->route('avisos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aviso $nota)
    {
         $nota->delete();
        return redirect()->route('avisos');
    }
}
