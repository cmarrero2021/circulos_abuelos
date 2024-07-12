<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\DB;
use App\Models\UserState;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Circulo;
use App\Models\Participante;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $estado_id;
     public function __construct()
    {
        $this->middleware('auth');
        $this->estado_id= null;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $usuarios = User::count();
        if (UserState::where('user_id', $user->id)->exists()) {
            $ambito = 1;
            session(['estado_id' => UserState::where('user_id','=',
            $user->id)->pluck('estado_id')[0]]);
            $this->estado_id = session('estado_id');
            $prom = DB::table('participantes as a')
            ->join('circulos as b', 'a.circulo_id', '=', 'b.id')
            ->join('cne_estados as c', 'b.estado_id', '=', 'c.estado_id')
            ->where('b.estado_id', '07')
            ->selectRaw('b.estado_id, ROUND(AVG(EXTRACT(YEAR FROM AGE(a.fecha_nacimiento)))) AS edad_promedio')
            ->groupBy('b.estado_id')
            ->orderBy('b.estado_id')
            ->get();
            $promedio = intval($prom[0]->edad_promedio);
            $prom_sexo = DB::select("SELECT * FROM vest_sex_prom WHERE estado_id = '$this->estado_id'");
            $promedio_sexo = $prom_sexo[0];
            $top_cir_mun = DB::select("SELECT municipio,count FROM vcir_mun WHERE estado_id = '$this->estado_id' LIMIT 10");
            $top_part_mun= DB::select("SELECT municipio,cantidad_participantes FROM vpart_mun  WHERE estado_id = '$this->estado_id' LIMIT 10");
            $cir_mun = DB::select("SELECT municipio,count FROM vcir_mun WHERE estado_id = '$this->estado_id'");
            $part_mun = DB::select("SELECT municipio,cantidad_participantes FROM vpart_mun  WHERE estado_id = '$this->estado_id'");
            $circulos = Circulo::where('estado_id','=',$this->estado_id)->whereNull('deleted_at')->count();
            $subquery = Circulo::select('id', 'estado_id', 'circulo');
            $participantes = Participante::selectRaw('count(*)')
                ->leftJoinSub($subquery, 'b', function ($join) {
                    $join->on('b.id', '=', 'participantes.circulo_id');
                })
                ->where('b.estado_id','=',$this->estado_id)
                ->count();
                return view('home', compact(['ambito','circulos','participantes','top_cir_mun','top_part_mun','cir_mun','part_mun','promedio','promedio_sexo']));

        } else {
            $ambito = 2;
            $promedio = Participante::selectRaw('ROUND(AVG(EXTRACT(YEAR FROM AGE(fecha_nacimiento)))) AS edad_promedio')
            ->value('edad_promedio');
            $promedio_sexo = Participante::selectRaw(
                '(SELECT COUNT(*) FROM participantes WHERE sexo = \'F\') AS cant_fem,(SELECT ROUND(AVG(EXTRACT(YEAR FROM AGE(fecha_nacimiento)))) AS promedio_fem FROM participantes WHERE sexo = \'F\') AS prom_fem,(SELECT COUNT(*) FROM participantes WHERE sexo = \'M\') AS cant_masc,(SELECT ROUND(AVG(EXTRACT(YEAR FROM AGE(fecha_nacimiento)))) AS promedio_masc FROM participantes WHERE sexo = \'M\') AS prom_masc')->first();
            $top_cir_est = DB::select('SELECT * FROM vcir_est LIMIT 10');
            $top_part_est = DB::select('SELECT * FROM vpart_est LIMIT 10');
            $cir_est = DB::select('SELECT * FROM vcir_est');
            $part_est = DB::select('SELECT * FROM vpart_est');
            $circulos = Circulo::whereNull('deleted_at')->count();
            $participantes = Participante::whereNull('deleted_at')->count();
            return view('home', compact(['ambito','circulos','participantes','top_cir_est','top_part_est','cir_est','part_est','promedio','promedio_sexo']));
        }
    }
    public function top_cir_est() {
        return json_encode(DB::select('SELECT * FROM vcir_est LIMIT 10'));
    }
    public function top_part_est() {
        return json_encode(DB::select('SELECT * FROM vpart_est LIMIT 10'));
    }
    public function cir_est() {
        return json_encode(DB::select('SELECT * FROM vcir_est'));
    }
    public function part_est() {
        return json_encode(DB::select('SELECT * FROM vpart_est'));
    }
///////////////////////
    public function top_cir_mun() {
        $this->estado_id = session('estado_id');
        return json_encode(DB::select("SELECT * FROM vcir_mun WHERE estado_id = '$this->estado_id' LIMIT 10"));
    }
    public function top_part_mun() {
        $this->estado_id = session('estado_id');
        return json_encode(DB::select("SELECT * FROM vpart_mun WHERE estado_id = '$this->estado_id' LIMIT 10"));
    }
    public function cir_mun() {
        $this->estado_id = session('estado_id');
        return json_encode(DB::select("SELECT * FROM vcir_mun WHERE estado_id = '$this->estado_id'"));
    }
    public function part_mun() {
        $this->estado_id = session('estado_id');
        return json_encode(DB::select("SELECT * FROM vpart_mun WHERE estado_id = '$this->estado_id'"));
    }    
}

