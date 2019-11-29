<?php use App\Comunidade;
      $comun = Comunidade::get();
?>
 <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                    <h5 class="card-title text-warning">MODIFICAR VECINO</h5>
                    <form class="bg_white shadow rounded" method="POST" action="{{ route('vecinos.update', $nota) }}">
                      @csrf
                      @method('PATCH')
                          <div class="form-row">
                        <div class="form-group col-md-3">
                         <label for="calles" class="card-text">Nombre</label>
                         <input id="calles" type="text" class="form-control " name="nombre" value="{{$nota->nombre}}">
                         </div>
                         <div class="form-group col-md-3">
                         <label for="num" class="card-text">Apellidos</label>
                         <input id="num" type="text" class="form-control " name="apellidos" value="{{$nota->apellidos}}">
                        </div>
                        <div class="form-group col-md-3">
                         <label for="mun" class="card-text">DNI</label>
                         <input id="mun" type="text" class="form-control " name="dni" value="{{$nota->dni}}">
                          </div>
                         <div class="form-group col-md-3">
                         <label for="munaa" class="card-text">Cargo</label>
                         <input id="munaa" type="text" class="form-control " name="cargo" value="{{$nota->cargo}}">
                       </div>
                     </div>
                     <div class="form-row">
                      <div class="form-group col-md-4">
                         <label for="mun1" class="card-text">Telefono</label>
                         <input id="mun1" type="text" class="form-control " name="telefono" value="{{$nota->telefono}}">
                       </div>
                       <div class="form-group col-md-4">
                         <label for="mun2" class="card-text">Movil</label>
                         <input id="mun2" type="text" class="form-control " name="movil" value="{{$nota->movil}}">
                       </div>
                       <div class="form-group col-md-4">
                         <label for="mun3" class="card-text">Correo-e</label>
                         <input id="mun3" type="text" class="form-control " name="email" value="{{$nota->email}}">
                       </div>
                     </div>
                     <div class="form-row">
                       <div class="form-group col-md-4">
                         <label for="mun4" class="card-text">Escalera</label>
                         <input id="mun4" type="text" class="form-control " name="escalera" value="{{$nota->escalera}}">
                       </div>
                        <div class="form-group col-md-4">
                         <label for="mun5" class="card-text">Piso</label>
                         <input id="mun5" type="text" class="form-control " name="piso" value="{{$nota->piso}}">
                       </div>
                        <div class="form-group col-md-4">
                         <label for="mun6" class="card-text">Letra</label>
                         <input id="mun6" type="text" class="form-control " name="letra" value="{{$nota->letra}}">
                       </div>
                     </div>
                        <label for="inputState">Comunidad</label>
                          <select id="inputState" class="form-control mb-3" name="comu">
                            <option selected value="{{$com->id}}">{{$com['calle']}} &nbsp {{$com['numero']}}</option>
                            @forelse($comun as $co)
                            <option value="{{$co['id']}}">{{$co['calle']}} &nbsp {{$co['numero']}}</option>
                            @empty
                            <option>No hay registros</option>
                            @endforelse
                          </select>
                        <button type="submit" class="btn btn-primary mb-3 btn-block">Guardar</button>
                  </div>
              </div>
</form>