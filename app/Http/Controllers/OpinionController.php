<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opinion;
use Illuminate\Support\Facades\Auth;


class opinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    

        $datos['opiniones']=Opinion::orderBy('id_opinion','DESC')->paginate(6);
        if($request->user()==null){
            return view('opiniones',$datos);
        }
        if($request->user()->role_id==2){//admin es 2, usuario escritor 1
            return view('fa_adm/opiniones',$datos);
        }
        if($request->user()->role_id==1){//admin es 2, usuario escritor 1
          
            $datos_escritor['opiniones_escritor']=Opinion::where('id_autor',$request->user()->id)->paginate(6);
            return view('fa_adm/opiniones_escritor',$datos_escritor);
        }

        else{
            return view('opiniones',$datos);
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
    public function store(Request $request)
    {
        date_default_timezone_set("America/Santiago");
        $opinion= new Opinion();
        $imagen = $request->file('txtImagen');
        $portada = $request->file('txtPortada');
            
        if($imagen != '')
        { 
            if($portada != ''){

            $nombrePortada = $portada->getClientOriginalName();
            $portada->move(public_path('assets/img/opiniones'), $nombrePortada);

            $opinion->portada = $nombrePortada;
            
            }else{
            
            $opinion->portada = 'portadaDefecto.jpg';

            }
            
            $nombreImagen = $imagen->getClientOriginalName();
            $imagen->move(public_path('assets/img/opiniones'), $nombreImagen);

            $opinion->imagen = $nombreImagen;

        }else{

            if($portada != ''){

            $nombrePortada = $portada->getClientOriginalName();
            $portada->move(public_path('assets/img/opiniones'), $nombrePortada);

            $opinion->portada = $nombrePortada;
            
            }else{
            
            $opinion->portada = 'portadaDefecto.jpg';

            }
    
            $opinion->imagen = 'imagenDefecto.png';

        }

            $opinion->id_autor = $request->txtIdAutor;
            $opinion->autor = $request->txtAutor;
            $opinion->titulo=$request->txtTitulo;
            $opinion->contenido=$request->txtContenido;
            $opinion->descripcion=$request->txtDescripcion;
            $opinion->fecha= new \DateTime();
            $opinion->hora = date('H:i:s');
            $posicion_pivote=strpos($request->txtVideo, "=");
            $opinion->video=substr($request->txtVideo, $posicion_pivote+1);
        
        $opinion->save();
        
        return redirect('opiniones')->with('success', 'Data Added successfully.');
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

          $opinion=Opinion::where('id_opinion',$id)->first();
          $fecha = substr($opinion['fecha'], 0, 10);
          $mes = date('F', strtotime($fecha));

         $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
          $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
          $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

          $hora  = substr($opinion['hora'], 0, 5);
          

        if($request->user()==null){
            return view('ver_opinion',compact('opinion','nombreMes','hora'));
        }
        if($request->user()->role_id==2){//admin es 2, usuario escritor 1
            return view('fa_adm/ver_opinion',compact('opinion','nombreMes','hora'));
        }
        if($request->user()->role_id==1){//admin es 2, usuario escritor 1
            return view('fa_adm/ver_opinion_escritor',compact('opinion','nombreMes','hora'));
        }

        else{
            return view('ver_opinion',compact('opinion','nombreMes'));
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $opinion=Opinion::where('id_opinion',$id)->first();

        if($request->user()->role_id==2){//admin es 2, usuario escritor 1
            return view('fa_adm.editar_opinion',compact('opinion'));
        }
        if($request->user()->role_id==1){//admin es 2, usuario escritor 1
            return view('fa_adm/editar_opinion_escritor',compact('opinion'));
        }   
       
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
        $imagen = $request->file('imagen');
        $portada = $request->file('portada');

        $datosOpinion=request()->except(['editar_opinion','id_opinion','_token','_method']);
        $posicion_pivote=strpos($datosOpinion['video'], "=");
        $datosOpinion['video']=substr($datosOpinion['video'], $posicion_pivote+1);

        if($imagen != '')
        {
            $nombreImagen = $imagen->getClientOriginalName();
            $imagen->move(public_path('assets/img/opiniones'), $nombreImagen);
            $datosOpinion['imagen']=$nombreImagen;

        }

        if($portada != '')
        {
            $nombrePortada = $portada->getClientOriginalName();
            $portada->move(public_path('assets/img/opiniones'), $nombrePortada);
            $datosOpinion['portada']=$nombrePortada;

        }


        Opinion::where('id_opinion','=',$id)->update($datosOpinion);

        return redirect('opiniones')->with('success', 'Data Added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Opinion::where('id_opinion',$id)->delete();
        return redirect('opiniones')->with('status','Opinión eliminada con éxito');
    }
}
