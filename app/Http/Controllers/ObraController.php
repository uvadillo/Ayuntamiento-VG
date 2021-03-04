<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ObraCambioEstado;
use App\Models\Obra;
use App\Models\Trabajador;
use App\Models\User;
use App\Models\Comentario;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        switch (auth()->user()->role) {
            case 'coordinador':
                $obras = Obra::query()->withCount('comentarios');
                break;
            case 'tecnico':
                $obras = Obra::query()->where("worker_id","=",auth()->user()->id)->withCount('comentarios');
                break;
            case 'solicitante':
                $obras = Obra::query()->where("requestor_id","=",auth()->user()->id)->withCount('comentarios');
                break;
        }

        //Filtro estado
        $selState = null;
        if (isset($_GET["state"])){
            $selState = $_GET["state"];
                if ($selState!="all"){
                    $obras->where("state", $selState);
                }
        }

        //Ordenar
        if (isset($_GET["order"])){
            $selOrder = $_GET["order"];
        } else {
            $selOrder = "created";
        }

        if (isset($_GET["desc"])){
            $obras->orderBy($selOrder."_at", "desc");
        } else {
            $obras->orderBy($selOrder."_at", "asc");
        }

        //Datos de los filtros
        $states = ["all", "created", "pending", "denied", "authorized"];
        $orderBy = ["created", "updated"];

        $obras = $obras->orderBy("created_at", "asc")->paginate(15);
        
        return view("obra.index", compact("obras","states","selState","orderBy","selOrder"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposObras = DB::table("tipos_obras")->get();
        $tiposEdificios = DB::table("tipos_edificios")->get();

        return view("obra.create", compact("tiposObras","tiposEdificios"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $path = $request->file('blueprint')->store('public\blueprints');

        Obra::create ([
            "requestor_id" => auth()->user()->id,
            "building_type" => $request->tipoEdificio,
            "construction_type"=> $request->tipoObra,
            "worker_id" => null,
            'postal_code' => $request->postal_code,
            'street_name' => $request->street_name,
            'number' => $request->number,
            'floor' => $request->floor,
            'door' => $request->door,
            'city' => $request->city,
            'province' => $request->province,
            "latitude" => $request->latitude,
            "longitude" => $request->longitude,
            "description" => $request->description,
            "blueprint" =>  basename($path)
        ]);

        return back()->with("status", "Obra creada");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Obra $obra)
    {
        switch (auth()->user()->role) {
            case 'tecnico':
                if (auth()->user()->id!=$obra->worker_id){
                    abort(403);
                }
                break;
            case "solicitante": 
                if (auth()->user()->id!=$obra->requestor_id){
                    abort(403);
                }
            break;
        }

        $trabajadores = [];
        if (!isset($obra->worker_id)){
            $trabajadores = Trabajador::withCount("obra_asignada")
            ->where("role","=","tecnico")
            ->orderByRaw('obra_asignada_count ASC')
            ->get();
        }

        //TODO QUE ES ESTO?
        "storage/blueprints/".$obra->blueprint;
    	$headers = ['Content-Type: application/pdf'];
        $fileName = time().'.pdf';

        return view("obra.show", compact("obra","trabajadores"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obra $obra)
    {
        $this->validateState($request->all())->validate();
        $obra->update([
            "state" => $request->state,
        ]);

        $this->emailCambioEstado($obra);

        return back();
    }

    //funcion para asignar un trabajador a una obra
    public function trabajador(Request $request, Obra $obra)
    {
        $this->validateTecnico($request->all())->validate();

        $obra->update([
            "worker_id" => $request->tecnico,
            "state" => "pending"
        ]);

        $this->emailCambioEstado($obra);

        return back()->with("status","Tecnico asignado");
    }

    public function updateDates(Request $request, Obra $obra){
        
        //TODO validat datos?
        $obra->start_date = $request->start_date;
        $obra->end_date = $request->end_date;

        $obra->save();

        return back()->with("status","Fechas establecidas");
    }

    private function emailCambioEstado($obra){
        Mail::to($obra->solicitante->email)->send(new ObraCambioEstado($obra));
    }

    protected function validator(array $request)
    {
        return Validator::make($request, [
            "tipoEdificio" => ["required", "exists:tipos_edificios,id"],
            "tipoObra"=> ["required", "exists:tipos_obras,id"],
            'postal_code' => ["required"],
            'street_name' => ["required"],
            'number' => ["required"],
            'floor' => ["required"],
            'door' => ["required"],
            'city' => ["required"],
            'province' => ["required"],
            "description" => ["required"],
            "blueprint" => ["required"],
            "latitude" => ["required"],
            "longitude" => ["required"],
        ]);
    }

    protected function validateState(array $request){
        return Validator::make($request, [
            "state" => ["required", "in:authorized,denied"]
        ]);
    }
    
    protected function validateTecnico(array $request){
        return Validator::make($request, [
            "tecnico" => ["required", "exists:users,id"]
        ]);
    }
}
