<?php
use App\user;
$com = User::get();
?>
        <div class="container">
            <div class="card mt-5">
                  <div class="card-body">
                    <h5 class="card-title">Nuevo Mensaje</h5>
                    <form class="bg_white shadow rounded" method="POST" action="{{route('mensajes.store') }}">
                      @csrf
                       <label for="inputState">Para:</label>
                          <select id="inputState" class="form-control mb-3" name="user">
                            @forelse($com as $co)
                            <option value="{{$co['id']}}">{{$co['name']}} &nbsp {{$co['email']}}</option>
                            @empty

                            @endforelse
                             </select>
                         <label for="Apunte" class="card-text">Mensaje</label>
                         <textarea rows="5" class="form-control" name="mensaje"></textarea>
                        <button type="submit" class="btn btn-primary mb-3 mt-3 btn-block">Guardar</button>
                  </div>
              </div>

