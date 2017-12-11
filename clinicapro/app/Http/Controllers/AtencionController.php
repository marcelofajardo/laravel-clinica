<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atencion;
use App\Models\Tipo_Atencion;
use App\Models\Paciente;
use App\Models\Usuario;
use App\Http\Requests;
use Session;
use Redirect;
class AtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atenciones=Atencion::orderBy('fecha_atencion','desc')->Paginate(20);
        $tipo_atenciones=Tipo_Atencion::pluck('descripcion','id_tipo');
        $nombre_pac=Paciente::pluck('nombres','id_paciente');
        $nombre_users=Usuario::pluck('nick','id_usuario');
        return view('atencion.index',compact('atenciones','tipo_atenciones','nombre_pac','nombre_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $atencion =new Atencion();
        $atencion -> id_paciente =$request -> id_paciente;
        $atencion -> id_tipo =$request -> id_tipo;
        $atencion -> precio =$request -> precio;
        $atencion -> observaciones =$request -> observaciones;
        $atencion -> id_usuario =$request -> id_usuario;
        $atencion -> save();
        Session::flash('message','Atención creada Correctamente');
        return Redirect::to('/atencion');
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
}
