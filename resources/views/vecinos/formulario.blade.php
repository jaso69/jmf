<?php use App\Comunidade;
      $com = Comunidade::get();
     if(Empty($com[0])){ ?> <a href="{{route('vecinos.error') }}" class="btn btn-danger mr-4 mt-3">Debe crear la comunidad primero</a> <?php } else {
?>
        <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                    <h5 class="card-title">Nuevo</h5>
                    <form class="bg_white shadow rounded" method="POST" action="{{ route('vecinos.store') }}">
                      @csrf
                      <div class="form-row">
                        <div class="form-group col-md-3">
                         <label for="calles" class="card-text">Nombre</label>
                         <input id="calles" type="text" class="form-control " name="nombre">
                         </div>
                         <div class="form-group col-md-3">
                         <label for="num" class="card-text">Apellidos</label>
                         <input id="num" type="text" class="form-control " name="apellidos">
                        </div>
                        <div class="form-group col-md-3">
                         <label for="muna" class="card-text">DNI</label>
                         <input id="muna" type="text" class="form-control " name="dni">
                       </div>
                       <div class="form-group col-md-3">
                         <label for="munaa" class="card-text">Cargo</label>
                         <input id="munaa" type="text" class="form-control " name="cargo">
                       </div>
                     </div>
                     <div class="form-row">
                      <div class="form-group col-md-4">
                         <label for="mun1" class="card-text">Telefono</label>
                         <input id="mun1" type="text" class="form-control " name="telefono">
                       </div>
                       <div class="form-group col-md-4">
                         <label for="mun2" class="card-text">Movil</label>
                         <input id="mun2" type="text" class="form-control " name="movil">
                       </div>
                       <div class="form-group col-md-4">
                         <label for="mun3" class="card-text">Correo-e</label>
                         <input id="mun3" type="text" class="form-control " name="email">
                       </div>
                     </div>
                     <div class="form-row">
                       <div class="form-group col-md-4">
                         <label for="mun4" class="card-text">Escalera</label>
                         <input id="mun4" type="text" class="form-control " name="escalera">
                       </div>
                        <div class="form-group col-md-4">
                         <label for="mun5" class="card-text">Piso</label>
                         <input id="mun5" type="text" class="form-control " name="piso">
                       </div>
                        <div class="form-group col-md-4">
                         <label for="mun6" class="card-text">Letra</label>
                         <input id="mun6" type="text" class="form-control " name="letra">
                       </div>
                     </div>
                        <label for="inputState">Comunidad</label>
                          <select id="inputState" class="form-control mb-3" name="comu">
                            @forelse($com as $co)
                            <option value="{{$co['id']}}">{{$co['calle']}} &nbsp {{$co['numero']}}</option>
                            @empty

                            @endforelse
                             </select>
                        <button type="submit" class="btn btn-primary mb-3 btn-block">Guardar</button>
                  </div>
              </div>
</form>
<?php } ?>