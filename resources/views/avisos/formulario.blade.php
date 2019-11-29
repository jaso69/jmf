
<?php
use App\Proovedore;
use App\Vecino;
use App\Comunidade;
      $com = Comunidade::get();
      $pro = Proovedore::get();
      if(request('comu') != null){
        $vec = Vecino::where('comunidades_id', request('comu'))->get();
      } else{
      $vec = Vecino::get();}
   /*  if(Empty($pro[0])){ ?> <a href="{{route('proovedores') }}" class="btn btn-danger mr-4 mt-3">Debe crear la comunidad primero</a> <?php }
     else if(Empty($vec[0])){ ?> <a href="{{route('vecinos') }}" class="btn btn-danger mr-4 mt-3">Debe crear primero los vecinos</a> <?php } else {b*/
?>

            <div class="card mt-5">
                  <div class="card-body">
                    <h5 class="card-title">Nuevo Aviso</h5>
                    <div class="d-flex justify-content-between">
                    <a href="{{ route('comunidades.create') }}">
                     @php Session::flash('edit','1'); @endphp
                    <button type="button" class="btn btn-outline-primary"><span class="oi oi-home">&nbsp Nueva comunidad</span></button>
                  </a>
                    <button type="button" class="btn btn-outline-secondary ml-3"><span class="oi oi-person">&nbsp Nuevo Vecino</span></button>
                    <button type="button" class="btn btn-outline-success ml-3"><span class="oi oi-wrench">&nbsp Nuevo proovedor</span></button>
                    </div>
                        <div class="form-group mb-3 mt-3">
                        <form method = "GET" action="{{ route('avisos.create') }}" class="mb-3">
                         @csrf
                      <label id="pio" class="card-text mr-3 ml-3">Comunidad</label>
                      @if(session()->has('edit'))
                        @if(session()->get('edit1') == 2)
                        <input class="form-control" type="text" placeholder="Readonly input here..." value="{{$com->last()->calle}} &nbsp {{$com->last()->numero}}" readonly>

                        @endif
                      @else
                      <select id="pio"  name="comu" class="form-control mr-3">
                        @forelse($com as $co)
                            <option value="{{$co['id']}}">{{$co['calle']}} &nbsp {{$co['numero']}}</option>
                            @empty
                         @endforelse
                          </select>
                          <button  class="btn btn-primary mt-3 btn-block">Seleccionar</button>
                        </form>
                      </div>
                      @endif
                       <form class="bg_white shadow rounded" method="POST" action="{{ route('avisos.store') }}">
                      @csrf
                          <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputState" class="card-text mt-3 mr-3 ml-3">Vecino</label>
                          <select id="inputState" class="form-control mr-3" name="vec">
                            <option selected value="null">Selecciona</option>
                            @forelse($vec as $veci)
                            <option value="{{$veci['id']}}">{{$veci['nombre']}} &nbsp {{$veci['apellidos']}}</option>
                            @empty
                            @endforelse
                             </select>
                         </div>
                         <div class="form-group col-md-6">
                          <label for="inputState1" class="card-text mt-3 mr-3 ml-3">Proovedor</label>
                          <select id="inputState1" class="form-control mr-3" name="pro">
                            <option select value="null" >Elige</option>
                            @forelse($pro as $proo)
                            <option value="{{$proo['id']}}">{{$proo['profesion']}} &nbsp {{$proo['nombre']}}</option>
                            @empty
                            @endforelse

                             </select>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-10">
                         <label for="muna" class="card-text mr-3 ml-3">Incidencia</label>
                         <input id="muna" type="text" class="form-control form-control-lg mr-3 ml-3" name="incidencia">
                       </div>
                       <div class="form-group col-md-12">
                         <label for="munaa" class="card-text mr-3 ml-3">Descripcion</label>
                         <textarea id="munaa" rows="5" class="form-control form-control-lg mr-3 ml-3" name="descripcion"></textarea>
                       </div>
                     </div>
                     <div class="form-row">
                      <div class="form-group col-md-6">
                         <label for="mun1" class="card-text mr-3 ml-3">Accion</label>
                         <input id="mun1" type="text" class="form-control mr-3 ml-3 form-control-lg" name="accion">
                       </div>
                       <div class="form-group col-md-6">
                         <label for="mun2" class="card-text mr-3 ml-3">Tipo de contato</label>
                         <input id="mun2" type="text" class="form-control form-control-lg mr-3 ml-3" name="tipo_contacto">
                       </div>
                     </div>
                        <button type="submit" class="btn btn-primary mb-3 btn-block">Guardar</button>

              </div>
            </div>

</form>


<?php //}  ?>