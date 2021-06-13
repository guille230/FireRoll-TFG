@include('header')
@php
    $us = session('user');
@endphp
<div class="container">
    <div class="row my-3 mx-3 d-flex">
        <div class="col-12 bg-white">
            <form action="{{route('crearPartida')}}" method="POST">
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4 my-3 mx-3 ml-3">
                  <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombre" name="name" placeholder="La venganza del Mago" required>
                        <label for="nombre">Nombre</label>
                      </div>
                  </div>
                  <div class="col-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="max" name="max" placeholder="5" required>
                        <label for="max">Maximo jugadores</label>
                    </div>
                  </div>
                  
                </div>
              
                <!-- Text input -->
                <div class="row mb-4">
                
            <div class="col-6 d-flex justify-content-end">
                <div class="form-outline mb-4 mx-3 w-100" style="position: relative;left: 2%;">
                    <select class="form-outline anchoEntero" name="tipo" aria-label="Tipo Partida" style="margin: 0 auto;" required>
                        <option value=0>{{$type[0]}}</option>
                        <option value=1>{{$type[1]}}</option>
                        <option value=2>{{$type[2]}}</option>
                      </select>
                </div>
            </div>
                <div class="col-6">
                <div class="form-outline mb-4 mx-3 ">
                    <select class="form-outline w-100" name="sistema" aria-label="Sistema" style="position: relative;right: 2%;"required>
                        <option value="{{$sistemas[0]}}">{{$sistemas[0]}}</option>
                        <option value="{{$sistemas[1]}}">{{$sistemas[1]}}</option>
                        <option value="{{$sistemas[3]}}">{{$sistemas[3]}}</option>
                        <option value="{{$sistemas[4]}}">{{$sistemas[4]}}</option>
                        <option value="{{$sistemas[5]}}">{{$sistemas[5]}}</option>
                        <option value="{{$sistemas[6]}}">{{$sistemas[6]}}</option>
                        <option value="{{$sistemas[7]}}">{{$sistemas[7]}}</option>
                      </select>
                </div></div></div>
            
                <div class="row mb-4 my-3 mx-3 ml-3">
                    <div class="col-6">
                      <div class="form-floating mb-3">
                          <input type="number" class="form-control" name="duracion" id="duracion" required>
                          <label for="tags">Nº Sesiones</label>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="form-floating">
                        <input type="text" class="form-control " id="tags" name="tags" placeholder="DnD,Homebrew" required>
                        <label for="max">Tags</label>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row my-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="desc" placeholder="El Rey creo las 5 piedras divinas y entrego una a cada uno de los magos" id="desc" style="height: 100px"></textarea>
                            <label for="desc">Descripcion</label>
                          </div>
                    </div>
                </div>
                <input type="hidden" name="idus" value="{{$us->id}}">
                <button type="submit" class="enviar rounded mb-4">Crear Partida</button>
            </div>
              </form>
        </div>
    </div>
</div>

@include('footer')