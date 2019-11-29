
<a href="{{route('mensajes.create')}}"><button type="button" class="btn btn-success mt-3 mb-3"><span class="oi oi-file">&nbsp</span>Nuevo</button></a>

@forelse($notas as $nota)
<?php
$fecha = $nota->updated_at;
?>
<div class="card mb-3">
  <div class="card-header ">
    <div class="d-flex justify-content-between">
    <span class="oi oi-calendar">&nbsp{{$fecha->format('d-m-y')}}</span>
    <span class="oi oi-person">&nbspMensaje de: <spam class="text-danger">{{$nota->to}}</span>
    <small>  <span class="oi oi-clock">&nbsp{{$nota['updated_at']->diffForHumans()}}</span> </small>
 </div>
  </div>
  <div class="card-body">
    <p class="card-text">{{$nota['mensaje']}}</p>

    <a href="#" onclick="document.getElementById('{{$nota['id']}}').submit()">
   	 <button type="button" class="btn btn-danger"><span class="oi oi-trash">&nbsp</span>Eliminar</button></a>

  </div>
</div>
<form id="{{$nota['id']}}" method = "POST" action="{{route('mensajes.destroy', $nota) }}">
      @csrf
      @method('DELETE')
    </form>
@empty
	<li>No hay registros</li>
@endforelse
{{$notas->links()}}


