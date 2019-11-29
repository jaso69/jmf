<?php use App\Comunidade; $com = Comunidade::get();?>
<a href="{{route('vecinos.create')}}"><button type="button" class="btn btn-success mt-3 mb-3"><span class="oi oi-person">&nbsp</span>Nuevo</button></a>
<div class="d-flex justify-content-between">
<form method = "POST" action="{{route('vecinos.show') }}" class="mb-3">
      @csrf
       <select name="nombre2">
        @forelse($com as $co)
            <option value="{{$co['id']}}">{{$co['calle']}} &nbsp {{$co['numero']}}</option>
            @empty
         @endforelse
          </select>
      <button type="submit" class="btn btn-warning"><span class="oi oi-magnifying-glass">&nbsp</span>Buscar</button>
    </form>
</div>
<table class="table" id="usurs">
  <thead>
    <tr>
      <th scope="col">Vecino</th>
    </tr>
     </thead>
  <tbody>

@forelse($notas as $nota)
 <tr>
      <td>
<div class="card mb-3 shadow rounded" >
  <div class="card-body">
     <h5 class="card-title"><span class="oi oi-person"></span></h5>
    <h5 class="card-title">{{$nota['nombre']}}&nbsp{{$nota['apellidos']}}&nbsp
    {{$nota['dni']}} &nbsp @if($nota['cargo'] != null)<span class="oi oi-star">&nbsp{{$nota['cargo']}}</span>@endif</h5>
    <hr>

 <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2"><span class="oi oi-plus">&nbsp</span>Informacion</button>
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
         <h6 class="card-subtitle mb-2"><span class="oi oi-home mr-1"></span>Comunidad: </h6>
    <p>
      <?php $com = Comunidade::findOrFail($nota->comunidades_id); ?>
      {{$com['calle']}}, &nbsp {{$com['numero']}}
    </p>
    <p>{{$com['municipio']}}</p>
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

      </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        <h6><span class="oi oi-envelope-open mr-1"></span>Contacto:</h6>
    <p class="card-text">
      @if($nota['telefono'] != null)
       <a href="tel:{{$nota['telefono']}}">
        <button type="button" class="btn btn-outline-success mr-2 mb-3">
      <span class="oi oi-phone"></span><span class="text-primary">&nbsp{{$nota['telefono']}}</span>&nbsp</button></a>
      @endif
      @if($nota['movil'] != null)
      <a href="tel:{{$nota['movil']}}">
        <button type="button" class="btn btn-outline-success mr-2 mb-3">
      <span class="oi oi-phone"></span><span class="text-primary">&nbsp{{$nota['movil']}}</span> &nbsp</button></a>
      @endif
      @if($nota['email'] != null)
      <br>
      <a href="mailto:{{$nota['email']}}">
      <span class="oi oi-envelope-closed"></span><span class="text-primary">&nbsp{{$nota['email']}}</span></a>
      @endif


      </div>
    </div>
  </div>
</div>

    <a href="{{route('vecinos.edit', [$nota,$com]) }}" class="btn btn-primary mr-4"><span class="oi oi-pencil">&nbsp</span>Editar</a>
    <a href="#" onclick="document.getElementById('{{$nota['id']}}').submit()">
     <button type="button" class="btn btn-danger ml-3"><span class="oi oi-trash">&nbsp</span>Eliminar</button></a>
  </div>
</div>
 <form id="{{$nota['id']}}" method = "POST" action="{{route('vecinos.destroy', $nota) }}">
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



