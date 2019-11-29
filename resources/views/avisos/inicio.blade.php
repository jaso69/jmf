<?php use App\Comunidade;
use App\Proovedore;
use App\Vecino;
$comun = Comunidade::get();
  ?>

<a href="{{route('avisos.create')}}"><button type="button" class="btn btn-success mt-3 mb-3"><span class="oi oi-medical-cross">&nbsp</span>Nuevo</button></a>
<div class="d-flex justify-content-between">

    <form method = "POST" action="{{route('avisos.show') }}" class="mb-3">
      @csrf
       <select name="nombre2" value="null">
        <option selected>Selecciona...</option>
        @forelse($comun as $co)
            <option value="{{$co['id']}}">{{$co['calle']}} &nbsp {{$co['numero']}}</option>
            @empty
         @endforelse
          </select>
      <button type="submit" class="btn btn-warning"><span class="oi oi-magnifying-glass">&nbsp</span>Comunidad</button>
    </form>
</div>
<table class="table table-striped" id="usurs">
  <thead>
    <tr>
      <th scope="col">Avisos</th>
    </tr>
  </thead>
   <tbody>
@forelse($notas as $nota)
<tr>
    <td>
<?php
if(Vecino::find($nota->id_vecinos) != null){
  $vec = Vecino::find($nota->id_vecinos);
  $com = Comunidade::find($vec->comunidades_id);} else {
    $vec = null;
}

if($nota->id_proovedores != null){
  if(Proovedore::find($nota->id_proovedores) != null){
$pro = Proovedore::find($nota->id_proovedores);} else {
  $pro = null;
}}
?>
<div class="card mb-3 shadow rounded" >
  <div class="card-body">
    <p class="p-1 mb-2 bg-secondary text-white" >Atendido por:</p>
     <h5 class="card-title"><span class="oi oi-people">&nbsp{{$nota['atendido']}}</span>
      <span class="oi oi-clock">&nbsp</span>{{$nota['updated_at']->format('d-m-y, H:i')}}
      <hr>
      <p class="p-1 mb-2 bg-secondary text-white">Incidencia:</p>
      <p class="mt-3"><span class="oi oi-medical-cross">&nbsp{{$nota->incidenia}}</span></p>
      <p> {{$nota->descripcion}}</p>
      <hr>
       <p class="p-1 mb-2 bg-secondary text-white">Accion:</p>
      <p><span class="oi oi-flash">&nbsp</span>{{$nota->accion}}
        <span class="oi oi-envelope-open">&nbsp</span>{{$nota->tipo_contacto}}</p>
        @if($pro != null)
        <p><span class="oi oi-wrench">&nbsp</span>{{$pro->profesion}}&nbsp{{$pro->nombre}}
          &nbsp{{$pro->telefono}}</p>
          @else
          <div class="alert alert-danger" role="alert">
            El proovedor fue eliminado o no ha sido seleccionado
          </div>
        @endif
     </h5>
     <hr>
<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Comunidad y vecino</button>
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
       @if($vec != null)
     <p class="badge badge-primary text-wrap" style="width: 9rem;">CLIENTE:</p>
    <h5 class="card-title"><span class="oi oi-person">&nbsp</span>{{$vec['nombre']}}&nbsp{{$vec['apellidos']}}&nbsp
    {{$vec['dni']}} &nbsp @if($vec['cargo'] != null)<span class="oi oi-star">&nbsp{{$vec['cargo']}}</span>@endif</h5>

    <hr>
    <h6 class="card-subtitle mb-2"><span class="oi oi-home mr-1"></span>Comunidad: </h6>
     <p>
      {{$com['calle']}}, &nbsp {{$com['numero']}}
    </p>
    <p>{{$com['municipio']}}</p>
     @else
      <div class="alert alert-danger" role="alert">
  El vecino fue eliminado o no ha sido seleccionado
</div>
@endif
      </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
    <h6><span class="oi oi-envelope-open mr-1"></span>Contacto:</h6>
    <p class="card-text">
      @if($vec['telefono'] != null)
      <a href="tel:{{$vec['telefono']}}">
        <button type="button" class="btn btn-outline-success mb-3">
      <span class="oi oi-phone"></span><span class="text-primary">&nbsp{{$vec['telefono']}}</span>&nbsp LLAMAR</button></a><br>
      @endif
      @if($vec['movil'] != null)
      <a href="tel:{{$vec['movil']}}">
        <button type="button" class="btn btn-outline-danger mb-3">
      <span class="oi oi-phone"></span><span class="text-primary">&nbsp{{$vec['movil']}}</span> &nbsp LLAMAR</button></a>
      @endif
      @if($vec['email'] != null)
      <br>
      <a href="mailto:{{$vec['email']}}">
      <span class="oi oi-envelope-closed"></span><span class="text-primary">&nbsp{{$vec['email']}}</span></a>
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
      </div>
    </div>
  </div>
</div>
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
    </td>
</tr>
@empty
	<li>No hay registros</li>
@endforelse
</tbody>
</table>



