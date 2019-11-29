        <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                    <h5 class="card-title">Nuevo usuario</h5>
                     @if($errors->any())
                    <ul>
                      @foreach($errors->all() as $error)
                      <div class="alert alert-danger" role="alert">
                       <li>{{$error}}</li>
                      </div>
                    </ul>
                      @endforeach
                    @endif
                    <form class="bg_white shadow rounded" method="POST" action="{{ route('usuarios.store') }}">
                      @csrf
                         <label for="calles" class="card-text">Nombre</label>
                         <input id="calles" type="text" class="form-control mb-3 mr-3 ml-3" name="name">
                         <label for="num" class="card-text">Correo-e</label>
                         <input id="num" type="text" class="form-control mb-3 mr-3 ml-3" name="email">
                         <label for="mun" class="card-text">Contraseña</label>
                         <input id="mun" type="password" class="form-control mb-3 mr-3 ml-3" name="password" >
                        <button type="submit" class="btn btn-primary mb-3 btn-block">Guardar</button>
                  </div>
              </div>

