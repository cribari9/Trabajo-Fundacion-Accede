<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Imgproyectos;
use App\Http\Requests\UpdateProyectosRequest;
use App\Http\Requests\StoreProyectosRequest;

class proyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos['proyectos']=Proyecto::orderBy('id_proyecto','DESC')->paginate(6);
        if($request->user()==null){
            return view('proyectos',$datos);
        }
        if($request->user()->role_id==2){//admin es 2, usuario normal 1
            return view('fa_adm/proyectos',$datos);
        }
        else{
            return view('proyectos',$datos);
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
    public function store(StoreProyectosRequest $request)
    {  $proyecto= new Proyecto();
        $imagen = $request->file('txtImagen');
        if($imagen != '')
        {  
            $nombreImagen = $request->txtNombre .  '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('assets/img/proyectos'), $nombreImagen);

            $proyecto->nombre = $request->txtNombre;
            $proyecto->descripcion=$request->txtDescripcion;
            $proyecto->imagen=$nombreImagen;
            $posicion_pivote=strpos($request->txtVideo, "=");
            $proyecto->video=substr($request->txtVideo, $posicion_pivote+1);
            $proyecto->lugar=$request->txtLugar;
            $proyecto->fecha=$request->txtFecha;
        }else{
            $proyecto->nombre = $request->txtNombre;
            $proyecto->descripcion=$request->txtDescripcion;
            $posicion_pivote=strpos($request->txtVideo, "=");
            $proyecto->video=substr($request->txtVideo, $posicion_pivote+1);
            $proyecto->lugar=$request->txtLugar;
            $proyecto->fecha=$request->txtFecha;
        }
        $proyecto->save();
        
        return redirect('proyectos')->with('success', 'Data Added successfully.');
//    return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $datos['imagenes']=Imgproyectos::where('id_proyecto',$id)->paginate(10);
        $proyecto=Proyecto::where('id_proyecto',$id)->first();
    
          $fecha = substr($proyecto['fecha'], 0, 10);
          $mes = date('F', strtotime($fecha));

        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
          $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
          $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

        if($request->user()==null){
            return view('ver_proyecto',compact('proyecto','nombreMes'),$datos);
        }
        if($request->user()->role_id==2){//admin es 2, usuario normal 1
            return view('fa_adm/ver_proyecto',compact('proyecto','nombreMes'),$datos);
        }
        else{
            return view('ver_proyecto',compact('proyecto','nombreMes'),$datos);
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
        $proyecto=Proyecto::where('id_proyecto',$id)->first();
        //Transformación del formato de fecha
        $fecha_inicio = $proyecto['fecha'];
        $anio_inicio = substr($fecha_inicio, -19, 4);
        $mes_inicio =substr($fecha_inicio, -14, 2);
        $dia_inicio = substr($fecha_inicio, -11, 2);
        $datos_fecha=$anio_inicio.'-'.$mes_inicio;
        return view('fa_adm.editar_proyecto',compact('proyecto','datos_fecha'));
    }

    /**
     * Para crear galería de imágenes al proyecto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ver_galeria($id)
    {   
        $proyecto=Proyecto::where('id_proyecto',$id)->first();
        $datos['imagenes']=Imgproyectos::where('id_proyecto',$proyecto->id_proyecto)->paginate(10);
        return view('fa_adm/ver_galeria_proyecto',compact('proyecto'),$datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProyectosRequest $request, $id)
    {
        $datosImagen = $request->file('imagen');
        if($datosImagen != '')
        {  
            $nombreImagen = $request->nombre .  '.' . $datosImagen->getClientOriginalExtension();
            $datosImagen->move(public_path('assets/img/proyectos'), $nombreImagen);
            $datosProyecto=request()->except(['editar_proyecto','id_proyecto','_token','_method']);
            $datosProyecto['imagen']=$nombreImagen;
            $datosProyecto['fecha']=$datosProyecto['fecha'].'-01';
            $posicion_pivote=strpos($datosProyecto['video'], "=");
            $datosProyecto['video']=substr($datosProyecto['video'], $posicion_pivote+1);

        }else{
            $datosProyecto=request()->except(['editar_proyecto','id_proyecto','_token','_method']);
            $datosProyecto['fecha']=$datosProyecto['fecha'].'-01';
            $posicion_pivote=strpos($datosProyecto['video'], "=");
            $datosProyecto['video']=substr($datosProyecto['video'], $posicion_pivote+1);
        }
        
        Proyecto::where('id_proyecto','=',$id)->update($datosProyecto);

        return redirect('proyectos')->with('success', 'Data Added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proyecto::where('id_proyecto',$id)->delete();
        return redirect('proyectos')->with('status','Proyecto eliminado con éxito');
    }
}
