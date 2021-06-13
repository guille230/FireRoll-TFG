@include('header')

@php
  $me = session('user');
@endphp
<style>
    /* HIDE RADIO */
[type=radio] { 
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  border: 2px solid #f00;
  border-radius: 4rem;
}
</style>
<div class="container-fluid py-2">
<div class="row">
  @if ($user->id == $me->id)
  <i class="fas fa-pencil-alt bannerPencil" data-bs-toggle="modal" data-bs-target="#modalBanner"></i> 
  @endif
<img src="{{$user->bannerImage}}" class="bannerImage" alt="Banner">
</div>
<div class="row mt-4 mb-4">
    <div class="col-6 d-flex justify-content-center">
        <img class="ImagenPerfil" src="{{$user->iconImage}}" alt="Icon">
        @if ($user->id == $me->id)
        <i class="fas fa-pencil-alt" data-bs-toggle="modal" data-bs-target="#modalIcon"></i>   
        @endif
    </div>
    <div class="col-6 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col 12 d-flex justify-content-center my-2">
                    <h2 class="textoTitulo">Nombre: <span class="textoPerfil">{{$user->username}}</span></h2>
                </div>
            </div>
            <div class="row">
              <div class="col 12 d-flex justify-content-center my-2">
                <h2 class="textoTitulo">Sistema Favorito: <span class="textoPerfil">{{$user->preferences}}</span></h2> 
            </div>
            </div>
        </div>
    </div>
</div>
<div class="row border-top border-dark">
        <div class="col-4 d-flex justify-content-center border-end border-dark">
            <h2 class="textoTitulo">Partidas:</h2>
        </div>
        <div class="col-8 d-flex justify-content-center">
            <h2 class="textoTitulo">Biografia</h2>
            @if ($user->id == $me->id)
            <i class="fas fa-pencil-alt mx-2" data-bs-toggle="modal" data-bs-target="#modalBio" style="align-self: center"></i>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-4 justify-content-center border-end border-dark">
          <ul class="text-center">
              @foreach ($partidas as $partida )
              <li class="py-2">
                <form action="{{route('getPartida')}}" method="POST">
                  @csrf
                  <input type="hidden" name="idpart" value="{{$partida->id}}">
                  <button class="buttonLink hvr-sweep-to-right rounded" onclick="this.form.submit()"><span class="textoPerfil w-70 px-3 py-2">{{$partida->nombre}}</span></button>
                </form>
              </li>
              @endforeach
            </ul> 
        </div>
        <div class="col-8 d-flex justify-content-center">
            <div class="row d-flex align-content-center justify-content-center">
                <div class="col-12 text-center">
                    <p class="textoPerfil">{{$user->bio}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBio" tabindex="-1" aria-labelledby="Actualizar Biografia" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Biografia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('actuBio')}}" method="POST">
              @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <label for="bio-text" class="col-form-label">Biografia:</label>
                <textarea class="form-control" id="bio-text" name="bio">{{$user->bio}}</textarea>
                <input type="submit" value="Insertar" class="btn btn-success my-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </form> 
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Icono --}}
  <div class="modal fade" id="modalIcon" tabindex="-1" aria-labelledby="Cambiar Icono" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Iconos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('actuIcon')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                @foreach ($iconos as $icono )
                <label class="mx-2">
                    <input type="radio" name="icono" value="{{$icono->id}}">
                    <img src="{{$icono->iconImage}}" class="rounded-circle" height="80" width="80" alt="a">
                  </label>
                @endforeach
                <br><br>
                <input type="submit" value="Insertar" class="btn btn-success my-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </form> 
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Banner --}}
  <div class="modal fade" id="modalBanner" tabindex="-1" aria-labelledby="Cambiar Icono" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Banner</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('actuBanner')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                @foreach ($banners as $banner)
                <label class="my-2">
                    <input type="radio" name="banner" value="{{$banner->id}}">
                    <img src="{{$banner->bannerImage}}" alt="a">
                  </label>
                @endforeach
                <br><br>
                <input type="submit" value="Insertar" class="btn btn-success my-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </form> 
        </div>
      </div>
    </div>
  </div>

@include('footer');

<script>
    //Modal Bio
    var ModalBIo = document.getElementById('modalBio')
    var newBio = document.getElementById('newBio')

    myModal.addEventListener('shown.bs.modal', function () {
        newBio.focus()
    })
</script>