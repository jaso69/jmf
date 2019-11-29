<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dat = now()->format('y-m-d');
        $notas = Agenda::where('fecha',$dat)->get();

        return view('home', compact('notas'));
    }
}
