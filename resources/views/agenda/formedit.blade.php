
 <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                    <h5 class="card-title">Editar Apunte</h5>
                    <form class="bg_white shadow rounded" method="POST" action="{{ route('agenda.update', $nota) }}">
                      @csrf
                      @method('PATCH')
                         <label for="Apunte" class="card-text">Apunte</label>
                         <textarea rows="5" class="form-control mr-3 ml-3" name="apunte" >{{$nota->notas}}</textarea>
                        <button type="submit" class="btn btn-primary mb-3 mt-4 btn-block">Actualizar</button>
                  </div>
              </div>
</form>
