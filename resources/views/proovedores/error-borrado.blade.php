<?php

use App\Comunidade;
use App\Proovedore;
use App\Vecino;
?>
@extends('layouts.app')

@section('tabla')

<div class="alert alert-danger" role="alert">Este proovedor tiene avisos</div>

<form method = "POST" action="{{route('borrar-todo', [$avs[0]->id_proovedores])}}">
      @csrf
      @method('DELETE')
<button type="submit" class="btn btn-danger btn-lg mb-3">&nbsp<span class="oi oi-warning"></span> BORRAR &nbsp<span class="oi oi-warning"></span></button>
    </form>
@forelse($avs as $nota)
<?php
$vec = Vecino::find($nota->id_vecinos);
$com = Comunidade::find($vec->comunidades_id);
if($nota->id_proovedores != null){
$pro = Proovedore::find($nota->id_proovedores);}
?>
<div class="card mb-3 shadow rounded" >
  <div class="card-body">
    <p class="badge badge-primary text-wrap" style="width: 9rem;">ATENDIDO POR:</p>
     <h5 class="card-title"><span class="oi oi-people">&nbsp{{$nota['atendido']}}</span>
      <span class="oi oi-clock">&nbsp</span>{{$nota['updated_at']->format('d-m-y, H:i')}}
      <hr>
      <p class="badge badge-primary text-wrap" style="width: 9rem;">INCIDENCIA:</p>
      <p class="mt-3"><span class="oi oi-medical-cross">&nbsp{{$nota->incidenia}}</span></p>
      <p> {{$nota->descripcion}}</p>
      <hr>
       <p class="badge badge-primary text-wrap" style="width: 6rem;">ACCION:</p>
      <p><span class="oi oi-flash">&nbsp</span>{{$nota->accion}}
        <span class="oi oi-envelope-open">&nbsp</span>{{$nota->tipo_contacto}}</p>
        <p><span class="oi oi-wrench">&nbsp</span>{{$pro->profesion}}&nbsp{{$pro->nombre}}
          &nbsp{{$pro->telefono}}</p>
     </h5>
     <hr>
     <p class="badge badge-primary text-wrap" style="width: 9rem;">CLIENTE:</p>
    <h5 class="card-title"><span class="oi oi-person">&nbsp</span>{{$vec['nombre']}}&nbsp{{$vec['apellidos']}}&nbsp
    {{$vec['dni']}} &nbsp @if($vec['cargo'] != null)<span class="oi oi-star">&nbsp{{$vec['cargo']}}</span>@endif</h5>
    <hr>
    <h6 class="card-subtitle mb-2"><span class="oi oi-home mr-1"></span>Comunidad: </h6>
     <p>
      {{$com['calle']}}, &nbsp {{$com['numero']}}
    </p>
    <p>{{$com['municipio']}}</p>
    <hr>
    <h6><span class="oi oi-envelope-open mr-1"></span>Contacto:</h6>
    <p class="card-text">
      @if($vec['telefono'] != null)
      <span class="oi oi-phone"></span><span class="text-primary">&nbsp{{$vec['telefono']}}</span>&nbsp
      @endif
      @if($vec['movil'] != null)
      <span class="oi oi-phone"></span><span class="text-primary">&nbsp{{$vec['movil']}}</span> &nbsp
      @endif
      @if($vec['email'] != null)
      <span class="oi oi-envelope-closed"></span><span class="text-primary">&nbsp{{$vec['email']}}</span>
      @endif
    </p>
    <hr>
    <h6><span class="oi oi-key">&nbsp Vivienda</span></h6>
     <p>
      @if($vec['escalera'] != null)
      Escalera:<span class="text-primary">&nbsp{{$vec['escalera']}}</span>&nbsp
      @endif
      @if($vec['piso'] != null)
      Piso:<span class="text-primary">&nbsp{{$vec['piso']}}</span> &nbsp
      @endif
      @if($vec['letra'] != null)
      Letra:<span class="text-primary">&nbsp{{$vec['letra']}}</span>
      @endif
     </p>
     <hr>
    <a href="{{route('avisos.edit', [$nota]) }}" class="btn btn-primary mr-4"><span class="oi oi-pencil">&nbsp</span>Editar</a>
    <a href="#" onclick="document.getElementById('{{$nota['id']}}').submit()">
     <button type="button" class="btn btn-danger ml-3"><span class="oi oi-trash">&nbsp</span>Eliminar</button></a>
  </div>
</div>
 <form id="{{$nota['id']}}" method = "POST" action="{{route('avisos.destroy', $nota) }}">
      @csrf
      @method('DELETE')
    </form>
@empty
	<li>No hay registros</li>
@endforelse


@endsection