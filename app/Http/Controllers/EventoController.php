<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Inscrito;
use App\Http\Requests\UpdateEventosRequest;
use App\Http\Requests\StoreEventosRequest;

class eventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
  
      $data['eventos']=Evento::orderBy('fecha_inicio','DESC')->paginate(3);
        if($request->user()==null){
            return view('eventos',$data);
        }
        if($request->user()->role_id==2){//admin es 2, usuario normal 1
            $data_admin['eventos']=Evento::orderBy('id_evento','DESC')->paginate(4);
            return view('fa_adm/eventos',$data_admin);
        }
        else{
            return view('eventos',$data);
        }
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
    public function store(StoreEventosRequest $request)
    {
        $evento= new Evento();
        $imagen = $request->file('txtImagen');
        if($imagen != '')
        {  
            $nombreImagen = $request->txtNombre .  '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('assets/img/eventos'), $nombreImagen);

            $evento->nombre = $request->txtNombre;
            $evento->descripcion=$request->txtDescripcion;
            $evento->responsable=$request->txtResponsable;
            $evento->email_contacto=$request->txtCorreo;
            $evento->fecha_inicio=$request->txt_fecha_inicio;
            $evento->fecha_termino=$request->txt_fecha_termino;
            $evento->hora_inicio=$request->txt_hora_inicio;
            $evento->hora_termino=$request->txt_hora_termino;
            if($request->txtLugar != ''){
                $evento->lugar= $request->txtLugar;
            }else{
               $evento->lugar='Virtual';
            }
            $evento->inscritos=$request->txtInscritos;
            $evento->capacidad=$request->txtCapacidad;
            $evento->imagen=$nombreImagen;
            $posicion_pivote=strpos($request->txtVideo, "=");
            $evento->video=substr($request->txtVideo, $posicion_pivote+1);
            
        }else{
            $evento->nombre = $request->txtNombre;
            $evento->descripcion=$request->txtDescripcion;
            $evento->responsable=$request->txtResponsable;
            $evento->email_contacto=$request->txtCorreo;
            $evento->fecha_inicio=$request->txt_fecha_inicio;
            $evento->fecha_termino=$request->txt_fecha_termino;
            $evento->hora_inicio=$request->txt_hora_inicio;
            $evento->hora_termino=$request->txt_hora_termino;
            if($request->txtLugar != ''){
                $evento->lugar= $request->txtLugar;
            }else{
               $evento->lugar='Virtual';
            }
            $evento->inscritos=$request->txtInscritos;
            $evento->capacidad=$request->txtCapacidad;
            $posicion_pivote=strpos($request->txtVideo, "=");
            $evento->video=substr($request->txtVideo, $posicion_pivote+1);
        }
        $evento->save();
        
        return redirect('eventos')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $evento=Evento::where('id_evento',$id)->first();

        if($request->user()==null){
            return view('ver_evento',compact('evento'));
        }
        if($request->user()->role_id==2){//admin es 2, usuario normal 1
            return view('fa_adm/ver_evento',compact('evento'));
        }
        else{
            return view('ver_evento',compact('evento'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento=Evento::where('id_evento',$id)->first();
        //Transformación del formato de fecha
        $fecha_inicio = $evento['fecha_inicio'];
        $anio_inicio = substr($fecha_inicio, -19, 4);
        $mes_inicio =substr($fecha_inicio, -14, 2);
        $dia_inicio = substr($fecha_inicio, -11, 2);
        $datos_fecha_inicio=$dia_inicio.'.'.$mes_inicio.'.'.$anio_inicio;

        $fecha_termino = $evento['fecha_termino'];
        $anio_termino = substr($fecha_termino, -19, 4);
        $mes_termino =substr($fecha_termino, -14, 2);
        $dia_termino = substr($fecha_termino, -11, 2);
        $datos_fecha_termino=$dia_termino.'.'.$mes_termino.'.'.$anio_termino;

        $hora_inicio = $evento['hora_inicio'];

        return view('fa_adm.editar_evento',compact('evento','datos_fecha_inicio','datos_fecha_termino'));
    }


 public function ver_inscritos($id)
    {   
        $evento=Evento::where('id_evento',$id)->first();
        $datos['inscritos']=Inscrito::where('id_evento',$evento->id_evento)->paginate(10);
        return view('fa_adm/ver_inscritos_evento',compact('evento'),$datos);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventosRequest $request, $id)
    {
        $datosImagen = $request->file('imagen');
        if($datosImagen != '')
        {  
            $nombreImagen = $request->nombre .  '.' . $datosImagen->getClientOriginalExtension();
            $datosImagen->move(public_path('assets/img/eventos'), $nombreImagen);
            $datosEvento=request()->except(['editar_evento','id_evento','_token','_method']);
            $datosEvento['imagen']=$nombreImagen;
            $posicion_pivote=strpos($datosEvento['video'], "=");
            $datosEvento['video']=substr($datosEvento['video'], $posicion_pivote+1);

        }else{
            $datosEvento=request()->except(['editar_evento','id_evento','_token','_method']);
            $posicion_pivote=strpos($datosEvento['video'], "=");
            $datosEvento['video']=substr($datosEvento['video'], $posicion_pivote+1);
        }
        //Transformación del formato de fecha
        $fecha_inicio = $request->fecha_inicio;
        $anio_inicio = substr($fecha_inicio, -4, 4);
        $mes_inicio =substr($fecha_inicio, -7, 2);
        $dia_inicio = substr($fecha_inicio, -10, 2);
        $datosEvento['fecha_inicio']=$anio_inicio.'-'.$mes_inicio.'-'.$dia_inicio;

        $fecha_termino = $request->fecha_termino;
        $anio_termino = substr($fecha_termino, -4, 4);
        $mes_termino =substr($fecha_termino, -7, 2);
        $dia_termino = substr($fecha_termino, -10, 2);
        $datosEvento['fecha_termino']=$anio_termino.'-'.$mes_termino.'-'.$dia_termino;

        Evento::where('id_evento','=',$id)->update($datosEvento);

        return redirect('eventos')->with('success', 'Data Added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evento::where('id_evento',$id)->delete();
        return redirect('eventos')->with('status','Evento eliminado con éxito');
    }
}
