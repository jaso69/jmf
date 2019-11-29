
<a href="{{route('comunidades.create')}}"><button type="button" class="btn btn-success mt-3 mb-3"><span class="oi oi-home">&nbsp</span>Nueva</button></a>

<table class="table table-striped" id="usurs">
  <thead>
    <tr>
      <th scope="col">Calle</th>
      <th scope="col">Numero</th>
      <th scope="col">Municipio</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
   <tbody>
@forelse($notas as $nota)
<tr>
    <td>{{$nota['calle']}}</td>
    <td>{{$nota['numero']}}</td>
    <td>{{$nota['municipio']}}</td>
    <td><a href="{{route('comunidades.edit', $nota) }}" class="btn btn-primary "><span class="oi oi-pencil">&nbsp</span>Editar</a></td>
    <td><a href="#" onclick="document.getElementById('{{$nota['id']}}').submit()">
   	 <button type="button" class="btn btn-danger"><span class="oi oi-trash">&nbsp</span>Eliminar</button></a>
     <form id="{{$nota['id']}}" method = "POST" action="{{route('comunidades.destroy', $nota) }}">
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
