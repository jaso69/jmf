<?php

namespace App\Http\Controllers;

use App\Aviso;
use App\Proovedore;
use Illuminate\Http\Request;

class ProovedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Proovedore::orderBy('nombre')->get();
        return view('proovedores.proovedores', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proovedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vecino = new Proovedore();

            if (request('nombre') != null){
                $vecino->nombre = request('nombre');
            }
            if (request('cif') != null){
                $vecino->cif = request('cif');
            }
            if (request('profesion') != null){
                $vecino->profesion = request('profesion');
            }
            if (request('telefono') != null){
                $vecino->telefono = request('telefono');
            }
            if (request('dir') != null){
                $vecino->direccion = request('dir');
            }
            if (request('email') != null){
                $vecino->email = request('email');
            }
            if (request('poblacion') != null){
                $vecino->poblacion = request('poblacion');
            }
            if (request('p_contacto') != null){
                $vecino->p_contacto = request('p_contacto');
            }
            if (request('t_contacto') != null){
                $vecino->t_contacto = request('t_contacto');
            }
            if (request('e_contacto') != null){
                $vecino->e_contacto = request('e_contacto');
            }

            $vecino->save();

        return redirect()->route('proovedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         if(request('nombre') == null){
             return redirect()->route('proovedores');
         }
         $notas = Proovedore::where('nombre',request('nombre'))->paginate(10);
         return view('proovedores.proovedores', compact('notas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proovedore $nota)
    {
         return view('proovedores.edit', [
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
    public function update(Proovedore $nota)
    {
            $vecino = $nota;

             if (request('nombre') != null){
                $vecino->nombre = request('nombre');
            }
            if (request('cif') != null){
                $vecino->cif = request('cif');
            }
            if (request('profesion') != null){
                $vecino->profesion = request('profesion');
            }
            if (request('telefono') != null){
                $vecino->telefono = request('telefono');
            }
            if (request('dir') != null){
                $vecino->direccion = request('dir');
            }
            if (request('email') != null){
                $vecino->email = request('email');
            }
            if (request('poblacion') != null){
                $vecino->poblacion = request('poblacion');
            }
            if (request('p_contacto') != null){
                $vecino->p_contacto = request('p_contacto');
            }
            if (request('t_contacto') != null){
                $vecino->t_contacto = request('t_contacto');
            }
            if (request('e_contacto') != null){
                $vecino->e_contacto = request('e_contacto');
            }

            $vecino->update();

        return redirect()->route('proovedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proovedore $nota)
    {
        $nota->delete();
        return redirect()->route('proovedores');
    }

    public function todos($id)
    {

        $com = Proovedore::findOrFail($id);
        $com->delete();

        return redirect()->route('proovedores');
    }
}
