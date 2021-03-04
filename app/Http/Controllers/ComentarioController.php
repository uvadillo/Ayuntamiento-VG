<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Comentario;
use App\Models\Obra;

class ComentarioController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Obra $obra)
    {
        $this->validator($request->all())->validate();

        $comentario = Comentario::create([
            "text" => $request->text,
            "worker_id" => auth()->user()->id,
            "obra_id" => $obra->id
        ]);

        if ($request->file("photo")){
            $path = $request->file('photo')->store('public\imagenes\comentarios');
            $comentario->update([
                "photo" => basename($path)
            ]);            
        }
        
        return back();
    }

    protected function validator(array $request){
        return Validator::make($request,[
            "text" => ["required", "string"],
            "photo" => ["image"]
        ]);
    }
}
