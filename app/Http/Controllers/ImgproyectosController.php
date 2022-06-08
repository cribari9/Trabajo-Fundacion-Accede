<?php

namespace App\Http\Controllers;

use App\Models\Imgproyectos;
use Illuminate\Http\Request;
use App\Http\Requests\StoreImgproyectosRequest;

class ImgproyectosController extends Controller
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
    public function store(StoreImgproyectosRequest $request)
    {
        
        $imagen= new Imgproyectos();
        $datos = $request->file('txtImagen');
        $nombreImagen = $request->txtID_proyecto .  '_' . $datos->getClientOriginalName();
        $datos->move(public_path('images/galeria_proyectos'), $nombreImagen);
        $imagen->nombre = $nombreImagen;
        $imagen->formato=$datos->getClientOriginalExtension();
        $imagen->id_proyecto=$request->txtID_proyecto;

        $imagen->save();
        
        return redirect(url('proyectos/ver_galeria', [$imagen->id_proyecto]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imgproyectos  $imgproyectos
     * @return \Illuminate\Http\Response
     */
    public function show(Imgproyectos $imgproyectos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imgproyectos  $imgproyectos
     * @return \Illuminate\Http\Response
     */
    public function edit(Imgproyectos $imgproyectos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imgproyectos  $imgproyectos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imgproyectos $imgproyectos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imgproyectos  $imgproyectos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_proyecto=Imgproyectos::where('id',$id)->first()->id_proyecto;
        $nombre_imagen=Imgproyectos::where('id',$id)->first()->nombre;
        unlink(public_path('images/galeria_proyectos/'.$nombre_imagen));
      //  Storage::disk('public/images/galeria_proyectos')->delete($nombre_imagen); 
        Imgproyectos::where('id',$id)->delete();
        return redirect(url('proyectos/ver_galeria', $id_proyecto));
    }
}
