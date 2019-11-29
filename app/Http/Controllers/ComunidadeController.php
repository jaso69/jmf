<?php

namespace App\Http\Controllers;

use App\Comunidade;
use App\Vecino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ComunidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Comunidade::orderBy('calle')->get();
        return view('comunidades.comunidades', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comunidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (request('municipio') == null){
            $municipio = "Torrejon de Ardoz";
        } else {
            $municipio = request('municipio');
        }
        Comunidade::create([
            'calle' => request('calle'),
            'numero' => request('numero'),
            'municipio' => $municipio,
        ]);
        if(request('edit') == '1'){
            Session::flash('edit1','2');
            return view('avisos.create');
        }
        return redirect()->route('comunidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(request('calle') == null){
             return redirect()->route('comunidades');
         }
         $notas = Comunidade::where('calle',request('calle'))->paginate(10);
         return view('comunidades.comunidades', compact('notas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunidade $nota)
    {
        return view('comunidades.edit', [
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
    public function update(Comunidade $nota)
    {
         $nota->update([
            'calle' => request('calle'),
            'numero' => request('numero'),
            'municipio' => request('municipio'),
        ]);
         return redirect()->route('comunidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidade $nota)
    {
        $vec = Vecino::where('comunidades_id',$nota->id)->get();
        if (Vecino::where('comunidades_id',$nota->id)->first() != null){
            return view('comunidades.error-borrado', compact('vec'));
        } else{
        $nota->delete();
        return redirect()->route('comunidades');}
    }
}
