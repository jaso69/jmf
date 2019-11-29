<?php
use App\Proovedore;
use App\Vecino;
//use App\Comunidade;
  //    $com = Comunidade::get();
      $pro = Proovedore::get();
      $vec = Vecino::get();
      $vecino = Vecino::find($nota->id_vecinos);
  //    $comunidad = Comunidade::find($vecino->comunidades_id);
      $proovedor = Proovedore::find($nota->id_proovedores);
    ?>

            <div class="card mt-5">
                  <div class="card-body">
                    <h5 class="card-title text-warning">MOFICAR AVISO</h5>
                       <form class="bg_white shadow rounded" method="POST"
                       action="{{route('avisos.update', [$nota])  }}">
                      @csrf
                      @method('PATCH')
                          <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputState" class="card-text mt-3 mr-3 ml-3">Vecino</label>
                          <select id="inputState" class="form-control mr-3" name="vec">
                            <option value="{{$vecino['id']}}">{{$vecino['nombre']}} &nbsp {{$vecino['apellidos']}}</option>
                            @forelse($vec as $veci)
                            <option value="{{$veci['id']}}">{{$veci['nombre']}} &nbsp {{$veci['apellidos']}}</option>
                            @empty
                            @endforelse
                             </select>
                         </div>
                         <div class="form-group col-md-6">
                          <label for="inputState1" class="card-text mt-3 mr-3 ml-3">Proovedor</label>
                          <select id="inputState1" class="form-control mr-3" name="pro">
                            <option value="{{$proovedor['id']}}">{{$proovedor['profesion']}} &nbsp {{$proovedor['nombre']}}</option>
                            @forelse($pro as $proo)
                            <option value="{{$proo['id']}}">{{$proo['profesion']}} &nbsp {{$proo['nombre']}}</option>
                            @empty
                            @endforelse

                             </select>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-10">
                         <label for="muna" class="card-text mr-3 ml-3">Incidencia</label>
                         <input id="muna" type="text" class="form-control form-control-lg mr-3 ml-3" name="incidencia" value="{{$nota->incidenia}}">
                       </div>
                       <div class="form-group col-md-12">
                         <label for="munaa" class="card-text mr-3 ml-3">Descripcion</label>
                         <textarea id="munaa" rows="5" class="form-control form-control-lg mr-3 ml-3" name="descripcion">{{$nota->descripcion}}</textarea>
                       </div>
                     </div>
                     <div class="form-row">
                      <div class="form-group col-md-6">
                         <label for="mun1" class="card-text mr-3 ml-3">Accion</label>
                         <input id="mun1" type="text" class="form-control mr-3 ml-3 form-control-lg" name="accion" value="{{$nota->accion}}">
                       </div>
                       <div class="form-group col-md-6">
                         <label for="mun2" class="card-text mr-3 ml-3">Tipo de contato</label>
                         <input id="mun2" type="text" class="form-control form-control-lg mr-3 ml-3" name="tipo_contacto" value="{{$nota->tipo_contacto}}">
                       </div>
                     </div>
                        <button type="submit" class="btn btn-primary mb-3 btn-block">Guardar</button>

              </div>
            </div>

</form>
