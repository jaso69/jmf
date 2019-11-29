
        <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                    <h5 class="card-title">Nuevo</h5>
                    <form class="bg_white shadow rounded" method="POST" action="{{ route('proovedores.store') }}">
                      @csrf
                      <div class="form-row ml-3 mr-3">
                        <div class="form-group col-md-4">
                         <label for="calles" class="card-text">Nombre o Razòn Social</label>
                         <input id="calles" type="text" class="form-control " name="nombre">
                         </div>
                         <div class="form-group col-md-2">
                         <label for="num" class="card-text">CIF</label>
                         <input id="num" type="text" class="form-control " name="cif">
                        </div>
                        <div class="form-group col-md-3">
                         <label for="muna" class="card-text">Profesion</label>
                         <input id="muna" type="text" class="form-control " name="profesion">
                       </div>
                       <div class="form-group col-md-3">
                         <label for="munaa" class="card-text">Telefono</label>
                         <input id="munaa" type="text" class="form-control " name="telefono">
                       </div>
                     </div>
                     <div class="form-row ml-3 mr-3">
                      <div class="form-group col-md-4">
                         <label for="mun1" class="card-text">Correo-e</label>
                         <input id="mun1" type="text" class="form-control " name="email">
                       </div>
                       <div class="form-group col-md-4">
                         <label for="mun2" class="card-text">Direcciòn</label>
                         <input id="mun2" type="text" class="form-control " name="dir">
                       </div>
                       <div class="form-group col-md-4">
                         <label for="mun3" class="card-text">Poblaciòn</label>
                         <input id="mun3" type="text" class="form-control " name="poblacion">
                       </div>
                     </div>
                     <div class="form-row ml-3 mr-3">
                       <div class="form-group col-md-4">
                         <label for="mun4" class="card-text">Persona contacto</label>
                         <input id="mun4" type="text" class="form-control " name="p_contacto">
                       </div>
                        <div class="form-group col-md-4">
                         <label for="mun5" class="card-text">Telefono contacto</label>
                         <input id="mun5" type="text" class="form-control " name="t_contacto">
                       </div>
                        <div class="form-group col-md-4">
                         <label for="mun6" class="card-text">Correo-e contacto</label>
                         <input id="mun6" type="text" class="form-control " name="e_contacto">
                        </div>
                     </div>
                      <button type="submit" class="btn btn-primary mb-3 btn-block">Guardar</button>
                      </form>
                  </div>
              </div>

            </div>

