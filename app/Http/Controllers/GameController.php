<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Search;
use App\Models\Partidas;
use Carbon\Carbon;
use Barryvdh\Debugbar\Facade as Debugbar;

class GameController extends Controller
{
    public function index()
    {
        $partidas = DB::table('partidas')->get();
        return view('Games.GameList',['partidas' => $partidas]);
    }

    public function getPartida(Request $request){
        $id = request('id');
        
        $partida = DB::table('partidas')->where('id',$id)->first();
        $creator = $partida->creator;        
        $usuarios = DB::table('usuarios')->where('id',$creator)->first();
        Debugbar::info($usuarios);
        $usupa = DB::table('usuarios_partidas')->where('id_usuarios',$id)->first();

        return view('Games.gamesDetail',['partidas' => $partida,'usuarios'=>$usuarios,'usuarios_partidas'=>$usupa]);
        
    }

    public function filtradoPartidas(Request $request){
        $type = $request->type;
        $system = $request->system;
        $order = $request->order;

        $query = DB::table('partidas');
        if ($type != "x") $query->where("type",$type);
        if ($system != "x") $query->where("system",$system);
        //$query->orderBy('creationdate', $order);
        $partidas = $query->get();

        return view('Games.GameList',['partidas' => $partidas]);
    }

    public function formulario(){

        $systems = array();
        $systems[0] = "DnD";
        $systems[1] = "Anima";
        $systems[2] = "Aquelarre";
        $systems[3] = "BurnBryte";
        $systems[4] = "Fate";
        $systems[5] = "Pathfinder";
        $systems[6] = "Chulu";
        $systems[7] = "Otro";

        $type = array();
        $type[0] = "Campaña";
        $type[1] = "Oneshot";
        $type[2] = "Iniciacion";

        return view('Games.formularioCrear',['sistemas' => $systems, 'type' => $type]);
    }

    public function crearPartida(Request $request){
        $idus = request('idus');
        $name = request('name');
        $max = request('max');
        $sistema = request('sistema');
        $tipo = request('tipo');
        $duracion = request('duracion');
        $descripcion = request('desc');
        $tags = request('tags');
        $fecha = Carbon::now();
        $fecha = $fecha->toDateString();

        Partidas::create([
            'nombre' => $name,
            'creator' => $idus,
            'max' => $max,
            'system' => $sistema,
            'type' => $tipo,
            'duration' => $duracion,
            'creationdate' => $fecha,
            'description' => $descripcion,
            'tags' => $tags,
        ]);
    
        $partidas = DB::table('partidas')->get();
        return view('Games.GameList',['partidas' => $partidas]);
    }
}
