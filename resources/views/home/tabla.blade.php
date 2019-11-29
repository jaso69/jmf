<?php
use App\Agenda;
use App\Mensaje;

$agnd = Agenda::where('id_user', auth()->user()->id)->latest('updated_at')->get();
$msj = Mensaje::where('id_users', auth()->user()->id)->latest('updated_at')->get();
?>
@if($msj->isNotEmpty())
<a href="{{route('mensajes') }}">
<button type="button" class="btn btn-primary">
  Mensajes <span class="badge badge-light">{{$msj->count()}}</span>
</button></a>
<div style=" overflow:scroll;height:200px;width:100%;">
@forelse($msj as $nota)
<div class="alert alert-dark mb-2 mt-2" role="alert">
 {{$nota->to}}: &nbsp  {{$nota->mensaje}}
</div>
@empty
@endforelse
</div>
@endif
<div class="card text-center text-white bg-success mt-4">
   <h5>Agenda</h5>
</div>
<div style=" overflow:scroll;height:200px;width:100%;">
<table class="table table-striped">
  <thead>
    <tr>
      <th>FECHA</th>
      <th>APUNTE</th>
    </tr>
  </thead>
  <tbody>
    @forelse($agnd as $nota)
    <?php
    $fecha = new DateTime($nota->fecha);
    ?>
    <tr>
      <td>{{$fecha->format('d-m-y')}}</td>
      <td>{{$nota['notas']}}</td>
    </tr>
    @empty
    @endforelse
  </tbody>
</table>
</div>
