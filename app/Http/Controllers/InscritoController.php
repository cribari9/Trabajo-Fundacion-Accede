<?php

namespace App\Http\Controllers;

use App\Models\Inscrito;
use Illuminate\Http\Request;
use App\Models\Evento;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InscritosExport;


class InscritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $evento=Evento::where('id_evento','=',$request->txtId_evento)->first();
        $evento->inscritos=$evento->inscritos+1;
        Evento::where('id_evento','=',$request->txtId_evento)->update(['inscritos'=>$evento->inscritos]);

        $inscrito= new Inscrito();
        $inscrito->id_evento= $request->txtId_evento;
        $inscrito->nombre = $request->txtNombre;
        $inscrito->apellido_paterno = $request->txtApellido_Paterno;
        $inscrito->apellido_materno = $request->txtApellido_Materno;
        $inscrito->telefono = $request->txtTelefono;
        $inscrito->correo=$request->txtCorreo;
        
        $inscrito->save();
        
 
        return redirect(url('eventos', [$inscrito->id_evento]))->with('success', 'Te haz inscrito satisfactoriamente a este evento.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inscrito  $inscrito
     * @return \Illuminate\Http\Response
     */
    public function show(Inscrito $inscrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inscrito  $inscrito
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscrito $inscrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscrito  $inscrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscrito $inscrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inscrito  $inscrito
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_evento=Inscrito::where('id_inscrito',$id)->first()->id_evento;
        Inscrito::where('id_inscrito',$id)->delete();
        return redirect(url('eventos/ver_inscritos', $id_evento));
    }

    public function exportExcel()
    {
        return Excel::download(new InscritosExport, 'lista_inscritos.xlsx');
    }
}
