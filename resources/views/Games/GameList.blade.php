@include('header')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-12 d-flex justify-content-center text-center">
            <div class="container">
                <div class="row" style="margin-bottom: 2rem">
                    <div class="col-12">
                        <h1 class="text-uppercase fs-1">Partidas</h1>
                    </div>
                </div>
                @auth
                <div class="row d-flex justify-content-center my-2">
                    <div class="col-12 col-md-5">
                        <a href="{{route('formularioPartida')}}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                @endauth
                <div class="row d-flex justify-content-evenly">
                    <div class="col-12 col-sm-2 d-flex align-items-center">
                        <form action="{{route('filterGames')}}" method="POST" class="d-flex">
                            @csrf
                        <label for="tipo" class="title mx-2">Tipo:</label>
                        <select class="form-select w-70" id="tipo" name="type" aria-label="Tipo" onchange="this.form.submit()">
                            <option value="x" selected>Escoja un tipo...</option>
                            <option value="0">Campaña</option>
                            <option value="1">OneShot</option>
                            <option value="3">Iniciación</option>
                        </select>
                    
                    </div>
                    <div class="col-12 col-sm-2 d-flex align-items-center">
                        <label for="system" class="title mx-2">Sistema:</label>
                        <select class="form-select w-70" name="system" id="system" aria-label="Sistema" onchange="this.form.submit()">
                            <option value="x" selected>Escoja un sistema...</option>
                            <option value="DnD">DnD</option>
                            <option value="Anima">Anima</option>
                            <option value="Pathfinder">PathFinder</option>
                            <option value="Aquelarre">Aquelarre</option>
                            <option value="Chulu">Call of Cthulhu</option>
                            <option value="BurnBryte">BurnBryte</option>
                            <option value="Fate">Fate</option>
                            <option value="Otro">Otro</option>
                        </select>
                   
                    </div>
                    <div class="col-12 col-sm-2 d-flex align-items-center ">
                        <label for="orden" class="title mx-2">Orden:</label>
                        <select class="form-select w-70" id="orden" name="order" aria-label="Orden" onchange="this.form.submit()">
                            <option value="desc" selected>Mas reciente</option>
                            <option value="asc">Mas antigua</option>
                        </select>
                    
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>
    <div class="mt-5"></div>
    @foreach ($partidas as $salas)
    <a href="{{route('getPartida')}}?id={{$salas->id}}" class="partidas">
        @if($loop->last)
        <div class="row fondoGradiente">
            @else
            <div class="row border border-top-0 border-end-0 border-start-0 border-dark fondoGradiente">
                @endif
                <div class="container-fluid">
                    <div class="row mb-3 mt-3 ">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <p>{{$salas->nombre}}</p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $original = $salas->description;
                        $cortado = substr($original, 0, 80) . "...";
                        ?>
                        <div class="col-md-4">
                            <p><?php echo $cortado; ?></p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p>Jugadores: {{$salas->max}}</p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Sistema: {{$salas->system}}</p>
                                </div>
                                <div class="col-md-4 ">
                                    <?php
                                    $tipo;
                                    switch ($salas->type) {
                                        case 0:
                                            $tipo = "Campaña";
                                            break;
                                        case 1:
                                            $tipo = "OneShot";
                                            break;
                                        case 3:
                                            $tipo = "Iniciacion";
                                            break;
                                    }
                                    ?>
                                    <p>Tipo: <?php echo $tipo; ?></p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <p>Duracion: {{$salas->duration}} sesiones</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </a>
    @endforeach
</div>
<style>
a {
  text-align: center;
}


</style>

@include('footer')