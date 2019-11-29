
<a href="{{route('proovedores.create')}}"><button type="button" class="btn btn-success mt-3 mb-3"><span class="oi oi-wrench">&nbsp</span>Nuevo</button></a>
<div class="d-flex justify-content-between">

</div>
<table class="table table-striped" id="usurs">
  <thead>
    <tr>
      <th scope="col">Proovedor</th>
    </tr>
  </thead>
   <tbody>
@forelse($notas as $nota)
<tr>
    <td>
<div class="card mb-3 shadow rounded" >
  <div class="card-body">
     <h5 class="card-title">
      <span class="oi oi-wrench">&nbsp</span> &nbsp{{$nota['profesion']}}</h5>
    <h5 class="card-title">{{$nota['nombre']}}
     &nbsp{{$nota['cif']}} &nbsp
      <a href="tel:{{$nota['telefono']}}">
        <button type="button" class="btn btn-outline-success mr-2">
     <span class="oi oi-phone">&nbsp</span>{{$nota['telefono']}}&nbsp
   </button></a>
    <a href="mailto:{{$nota['email']}}">
      <span class="oi oi-envelope-closed">&nbsp</span>{{$nota['email']}}
    </a>
  </h5>
    <hr>

    <h6><span class="oi oi-envelope-open mr-1"></span>Contacto:</h6>
    <p class="card-text">
      @if($nota['p_contacto'] != null)<span class="oi oi-person text-danger">&nbsp{{$nota['p_contacto']}}&nbsp</span>@endif
      @if($nota['t_contacto'] != null)
       <a href="tel:{{$nota['t_contacto']}}">
        <button type="button" class="btn btn-outline-success mr-2">
      <span class="oi oi-phone"></span><span class="text-primary">&nbsp{{$nota['t_contacto']}}</span>&nbsp</button></a>
      @endif
      @if($nota['email'] != null)
      <a href="mailto:{{$nota['e_contacto']}}">
      <span class="oi oi-envelope-closed"></span><span class="text-primary">&nbsp
      {{$nota['e_contacto']}}</span></a>
      @endif
    </p>
    <hr>
    <h6><span class="oi oi-home">&nbsp Direccion:</span></h6>
     <p>

      @if($nota['direccion'] != null)
      Via:<span class="text-primary">&nbsp{{$nota['direccion']}}</span>&nbsp
      @endif
      @if($nota['poblacion'] != null)
      Poblacion:<span class="text-primary">&nbsp{{$nota['poblacion']}}</span> &nbsp
      @endif
     </p>
     <hr>
    <a href="{{route('proovedores.edit', [$nota]) }}" class="btn btn-primary mr-4"><span class="oi oi-pencil">&nbsp</span>Editar</a>
    <a href="#" onclick="document.getElementById('{{$nota['id']}}').submit()">
     <button type="button" class="btn btn-danger ml-3"><span class="oi oi-trash">&nbsp</span>Eliminar</button></a>
  </div>
</div>
 <form id="{{$nota['id']}}" method = "POST" action="{{route('proovedores.destroy', $nota) }}">
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


