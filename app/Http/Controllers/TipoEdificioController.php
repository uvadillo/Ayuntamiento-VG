<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEdificio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TipoEdificioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposEdificios = DB::table("tipos_edificios")->get();

        return view("tipoEdificio.index", compact("tiposEdificios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tipoEdificio.create");
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
        
        TipoEdificio::create ([
            "name" => $request->tipoEdificio
        ]);
        return back()->with("status", "Tipo de obra creada");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tipoEdificio' => ['required', 'string', 'max:255', 'unique:tipos_edificios,name'],
        ]);
    }
}
