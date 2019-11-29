
 <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                    <h5 class="card-title">Editar comunidad</h5>
                    <form class="bg_white shadow rounded" method="POST" action="{{ route('comunidades.update', $nota) }}">
                      @csrf
                      @method('PATCH')
                         <label for="calles" class="card-text">Calle</label>
                         <input id="calles" type="text" class="form-control mb-3 mr-3 ml-3" name="calle" value="{{$nota->calle}}">
                         <label for="num" class="card-text">Numero</label>
                         <input id="num" type="text" class="form-control mb-3 mr-3 ml-3" name="numero" value="{{$nota->numero}}">
                         <label for="mun" class="card-text">Municipio</label>
                         <input id="mun" type="text" class="form-control mb-3 mr-3 ml-3" name="municipio" value="{{$nota->municipio}}">
                        <button type="submit" class="btn btn-primary mb-3 mt-4 btn-block">Actualizar</button>
                  </div>
              </div>

