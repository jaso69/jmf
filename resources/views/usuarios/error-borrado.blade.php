<?php $notas = $vec; $id=$notas[0]->comunidades_id;?>

@extends('layouts.app')

@section('tabla')

<div class="alert alert-danger" role="alert">Esta comunidad tiene vecinos</div>

<form method = "POST" action="{{route('todos', $id) }}">
      @csrf
      @method('DELETE')
<button type="submit" class="btn btn-danger btn-lg mb-3">&nbsp<span class="oi oi-warning"></span> BORRAR TODO, COMUNIDAD Y VECINOS&nbsp<span class="oi oi-warning"></span></button>
    </form>

@forelse($notas as $nota)
<div class="card mb-3 shadow rounded" >
  <div class="card-body">
     <h5 class="card-title"><span class="oi oi-person"></span></h5>
    <h5 class="card-title">{{$nota['nombre']}}&nbsp{{$nota['apellidos']}}&nbsp
    {{$nota['dni']}} &nbsp @if($nota['cargo'] != null)<span class="oi oi-star">&nbsp{{$nota['cargo']}}</span>@endif</h5>
    <hr>
    <h6 class="card-subtitle mb-2"><span class="oi oi-home mr-1"></span>Comunidad: </h6>
    <p>{{$nota['municipio']}}</p>
    <hr>
    <h6><span class="oi oi-envelope-open mr-1"></span>Contacto:</h6>
    <p class="card-text">
      @if($nota['telefono'] != null)
      <span class="oi oi-phone"></span><span class="text-primary">&nbsp{{$nota['telefono']}}</span>&nbsp
      @endif
      @if($nota['movil'] != null)
      <span class="oi oi-phone"></span><span class="text-primary">&nbsp{{$nota['movil']}}</span> &nbsp
      @endif
      @if($nota['email'] != null)
      <span class="oi oi-envelope-closed"></span><span class="text-primary">&nbsp{{$nota['email']}}</span>
      @endif
    </p>
    <hr>
    <h6><span class="oi oi-key">&nbsp Vivienda</span></h6>
     <p>
      @if($nota['escalera'] != null)
      Escalera:<span class="text-primary">&nbsp{{$nota['escalera']}}</span>&nbsp
      @endif
      @if($nota['piso'] != null)
      Piso:<span class="text-primary">&nbsp{{$nota['piso']}}</span> &nbsp
      @endif
      @if($nota['letra'] != null)
      Letra:<span class="text-primary">&nbsp{{$nota['letra']}}</span>
      @endif
     </p>
     <hr>
@empty
	<li>No hay registros</li>
@endforelse

@endsection