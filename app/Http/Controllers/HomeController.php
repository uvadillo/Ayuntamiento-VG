<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (auth()->user()->role) {
            case "coordinador":
                $createdCount = DB::table('obras')
                    ->where('state', "=", "created")
                    ->count();
                $pendingCount = DB::table('obras')
                    ->where('state', "=", "pending")
                    ->count();
                $aceptedCount = DB::table('obras')
                    ->where('state', "=", "authorized")
                    ->count();
                $deniedCount = DB::table('obras')
                    ->where('state', "=", "denied")
                    ->count();
                $cordenadas = DB::table('obras')->select("latitude","longitude","description")->get();
                $demolicion = Obra::all()->where('construction_type',"=",'1')->count("construcion_type");
                $reforma = Obra::all()->where('construction_type',"=",'2')->count("construcion_type");
                $construccion = Obra::all()->where('construction_type',"=",'3')->count("construcion_type");

                return view("homes.trabajador", compact("createdCount", "pendingCount", "aceptedCount", "deniedCount","cordenadas","demolicion","reforma","construccion"));
                break;
            case "tecnico";
                $createdCount = DB::table('obras')
                    ->where('state', "=", "created")
                    ->where("worker_id","=",auth()->user()->id)
                    ->count();
                $pendingCount = DB::table('obras')
                    ->where('state', "=", "pending")
                    ->where("worker_id","=",auth()->user()->id)
                    ->count();
                $aceptedCount = DB::table('obras')
                    ->where('state', "=", "authorized")
                    ->where("worker_id","=",auth()->user()->id)
                    ->count();
                $deniedCount = DB::table('obras')
                    ->where('state', "=", "denied")
                    ->where("worker_id","=",auth()->user()->id)
                    ->count();
                $cordenadas = DB::table('obras')
                    ->select("latitude","longitude","description")
                    ->where("worker_id","=",auth()->user()->id)
                    ->get();
                $demolicion = Obra::all()->where('construction_type',"=",'1')->where("worker_id","=",auth()->user()->id)->count("construcion_type");
                $reforma = Obra::all()->where('construction_type',"=",'2')->where("worker_id","=",auth()->user()->id)->count("construcion_type");
                $construccion = Obra::all()->where('construction_type',"=",'3')->where("worker_id","=",auth()->user()->id)->count("construcion_type");
                    return view("homes.trabajador", compact("createdCount", "pendingCount", "aceptedCount", "deniedCount", "cordenadas","demolicion","reforma","construccion"));
                break;
            case "solicitante":
                return redirect()->route("obra.index");
                break;
            default:
                return redirect()->route("login");
        }

        return view('home');
    }
}
