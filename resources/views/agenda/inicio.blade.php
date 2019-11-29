
<a href="{{route('agenda.create')}}"><button type="button" class="btn btn-success mt-3 mb-3"><span class="oi oi-clipboard">&nbsp</span>Nuevo</button></a>

<form method = "POST" action="{{route('agenda.show') }}" class="mb-3">
    	@csrf
    	<input type="date" name="fecha">
    	<button type="submit" class="btn btn-primary"><span class="oi oi-magnifying-glass">&nbsp</span>Fecha</button>
    </form>
<table class="table table-striped" id="usurs">
  <thead>
    <tr>
      <th scope="col">Agenda</th>
    </tr>
  </thead>
   <tbody>
@forelse($notas as $nota)
<tr>
  <td>
<?php
$fecha = new DateTime($nota->fecha);
?>
<div class="card mb-3">
  <div class="card-header">
    <div class="d-flex justify-content-between">
       <span class="oi oi-calendar">&nbsp{{$fecha->format('d-m-y')}}</span>
       <small>  <span class="oi oi-clock">{{$nota['updated_at']->diffForHumans()}} </span></small>
  </div>
</div>
  <div class="card-body">
    <p class="card-text">{{$nota['notas']}}</p>

    <a href="{{route('agenda.edit', $nota) }}" class="btn btn-primary ml-5 mr-4"><span class="oi oi-pencil">&nbsp</span>Editar</a>
    <a href="#" onclick="document.getElementById('{{$nota['id']}}').submit()">
   	 <button type="button" class="btn btn-danger"><span class="oi oi-trash">&nbsp</span>Eliminar</button></a>

  </div>
</div>
<form id="{{$nota['id']}}" method = "POST" action="{{route('agenda.destroy', $nota) }}">
      @csrf
      @method('DELETE')
    </form>
  </td>
</tr>
@empty
	<li>No hay registros</li>
@endforelse
</tbody>
</table>

