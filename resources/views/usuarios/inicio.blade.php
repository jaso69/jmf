
<a href="{{route('usuarios.create')}}"><button type="button" class="btn btn-success mt-3 mb-3"><span class="oi oi-person">&nbsp</span>Nuevo</button></a>
<table class="table table-striped" id="usurs">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Correo-e</th>
       <th scope="col">EDITAR</th>
      <th scope="col">ELIMINAR</th>
    </tr>
  </thead>
   <tbody>
@forelse($notas as $nota)
<tr>
    <td>{{$nota['name']}}</td>
    <td>{{$nota['email']}}</td>
     <td><a href="{{route('usuarios.edit', [$nota]) }}" class="btn btn-primary mr-4"><span class="oi oi-pencil">&nbsp</span>Editar</a></td>
    <td>
      @if(auth()->user()->id != $nota->id)
      <a href="#" onclick="document.getElementById('{{$nota['id']}}').submit()">
   	 <button type="button" class="btn btn-danger"><span class="oi oi-trash">&nbsp</span>Eliminar</button></a>
@endif
<form id="{{$nota['id']}}" method = "POST" action="{{route('usuarios.destroy', $nota) }}">
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



