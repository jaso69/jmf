<?php

namespace App\Http\Controllers;

use App\User;
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
        $notas = User::orderBy('name')->get();
        return view('usuarios.usuarios', compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
         request()->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required'
        ]);
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
        return redirect()->route('usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $nota)
    {
        return view('usuarios.edit', [
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
    public function update(User $nota)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required'
        ]);
        $nota->name = request('name');
        $nota->email = request('email');
        $nota->password = bcrypt(request('password'));
        $nota->update();

        return redirect()->route('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $nota)
    {
         $nota->delete();
        return redirect()->route('usuarios');
    }
}
