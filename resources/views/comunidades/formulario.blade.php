        <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                    <h5 class="card-title">Nueva comunidad</h5>
                    <form class="bg_white shadow rounded" method="POST" action="{{ route('comunidades.store') }}">
                      @csrf
                      @if(session()->has('edit'))
                        <input type="hidden" name="edit" value="1">
                        @endif
                         <label for="calles" class="card-text">Calle</label>
                         <input id="calles" type="text" class="form-control mb-3 mr-3 ml-3" name="calle">
                         <label for="num" class="card-text">Numero</label>
                         <input id="num" type="text" class="form-control mb-3 mr-3 ml-3" name="numero">
                         <label for="mun" class="card-text">Municipio</label>
                         <input id="mun" type="text" class="form-control mb-3 mr-3 ml-3" name="municipio" value="Torrejon de Ardoz">
                        <button type="submit" class="btn btn-primary mb-3 btn-block">Guardar</button>
                  </div>
              </div>

