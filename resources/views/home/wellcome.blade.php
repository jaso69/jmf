

<div class="alert alert-primary mt-4" role="alert" id="tosta">
	Bienvenid@ {{auth()->user()->name}}
</div>
@forelse($notas as $nota)
@if(auth()->user()->id == $nota->id_user)
<div class="text-center bg-success text-white mb-3">Tareas hoy {{now()->format('d-m-y')}}</div>
<div class="alert alert-warning" role="alert">
  {{$nota->notas}}
</div>
@endif
@empty
@endforelse