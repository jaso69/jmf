<?php

namespace App\Http\Controllers;

use App\Comunidade;
use App\Vecino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VecinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Vecino::orderBy('nombre')->get();
        return view('vecinos.vecinos', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vecinos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $vecino = new Vecino();

            if (request('nombre') != null){
                $vecino->nombre = request('nombre');
            }
            if (request('apellidos') != null){
                $vecino->apellidos = request('apellidos');
            }
            if (request('dni') != null){
                $vecino->dni = request('dni');
            }
            if (request('telefono') != null){
                $vecino->telefono = request('telefono');
            }
            if (request('movil') != null){
                $vecino->movil = request('movil');
            }
            if (request('email') != null){
                $vecino->email = request('email');
            }
            if (request('escalera') != null){
                $vecino->escalera = request('escalera');
            }
            if (request('piso') != null){
                $vecino->piso = request('piso');
            }
            if (request('letra') != null){
                $vecino->letra = request('letra');
            }
            if (request('comu') != null){
                $vecino->comunidades_id = request('comu');
            }
            if (request('cargo') != null){
                $vecino->cargo = request('cargo');
            }
            $vecino->save();

             if(request('edit') == '11'){
            Session::flash('edit1','22');
            return view('avisos.create');
        }

        return redirect()->route('vecinos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   //dd(request()->all());
       if(request('nombre') == null && request('nombre2') == null){
             return redirect()->route('vecinos');
         }
        if(request('nombre') != null){
         $notas = Vecino::where('nombre',request('nombre'))->paginate(10);
         return view('vecinos.vecinos', compact('notas'));}

        if(request('nombre2') != null){
         $notas = Vecino::where('comunidades_id',request('nombre2'))->paginate(10);
         return view('vecinos.vecinos', compact('notas'));}

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vecino $nota, Comunidade $com)
    {

        return view('vecinos.edit', [
            'nota' => $nota,
            'com' => $com
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Vecino $nota)
    {
            //dd($nota);
            if (request('nombre') != null){
                $nota->nombre = request('nombre');
            }
            if (request('apellidos') != null){
                $nota->apellidos = request('apellidos');
            }
            if (request('dni') != null){
                $nota->dni = request('dni');
            }
            if (request('telefono') != null){
                $nota->telefono = request('telefono');
            }
            if (request('movil') != null){
                $nota->movil = request('movil');
            }
            if (request('email') != null){
                $nota->email = request('email');
            }
            if (request('escalera') != null){
                $nota->escalera = request('escalera');
            }
            if (request('piso') != null){
                $nota->piso = request('piso');
            }
            if (request('letra') != null){
                $nota->letra = request('letra');
            }
            if (request('comu') != null){
                $nota->comunidades_id = request('comu');
            }
            if (request('cargo') != null){
                $nota->cargo = request('cargo');
            }
            $nota->update();
        /* $nota->update([
            'calle' => request('calle'),
            'numero' => request('numero'),
            'municipio' => request('municipio'),
        ]);*/
         return redirect()->route('vecinos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vecino $nota)
    {
        $nota->delete();
        return redirect()->route('vecinos');
    }

    public function todos($id)
    {

        $nots = Vecino::where('comunidades_id', $id)->get();
        foreach ($nots as $nota) {

            $nota->delete();
        }
        $com = Comunidade::findOrFail($id);
        $com->delete();

        return redirect()->route('comunidades');
    }

    public function error()
    {
        return redirect()->route('comunidades');
    }
}
