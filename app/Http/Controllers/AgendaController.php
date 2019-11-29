<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Agenda::where('id_user', auth()->user()->id)->latest('updated_at')->get();
        return view('agenda.agenda', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(request('fecha') == null){
            $fecha = now();
        } else {
            $fecha = request('fecha');
        }
        Agenda::create([
            'notas' => request('apunte'),
            'id_user' => auth()->user()->id,
            'fecha' => $fecha,
        ]);

        return redirect()->route('agenda');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         if(request('fecha') == null){
             return redirect()->route('agenda');
         }
         $notas = Agenda::whereDate('fecha',request('fecha'))->paginate(4);
         return view('agenda.agenda', compact('notas'));
         //return view('agenda.show',compact('notas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $nota)
    {
        return view('agenda.edit', [
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
    public function update(Agenda $nota)
    {
        $nota->update([
            'notas' => request('apunte'),
        ]);
         return redirect()->route('agenda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $nota)
    {
        $nota->delete();
        return redirect()->route('agenda');
    }
}
