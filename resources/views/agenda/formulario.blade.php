        <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                    <h5 class="card-title">Nuevo Apunte</h5>
                    <form class="bg_white shadow rounded" method="POST" action="{{ route('agenda.store') }}">
                      @csrf
                         <label for="Apunte" class="card-text">Apunte</label>
                         <textarea rows="5" class="form-control mr-3 ml-3" name="apunte"></textarea>
                         <label for="fecha" class="card-text">Fecha</label>
                         <input id="fecha" type="date" class="form-control mb-3 mr-3 ml-3" name="fecha" value="{{now()}}" >
                        <button type="submit" class="btn btn-primary mb-3 btn-block">Guardar</button>
                  </div>
              </div>

