<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fundacion;
use App\Http\Requests\UpdateFundacionRequest;
use App\Models\Opinion;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos_opiniones['opiniones']=Opinion::orderBy('fecha','DESC')->paginate(3);
        $fundacion=Fundacion::where('id_fundacion',1)->first();
        if($request->user()==null){
            return view('welcome',compact('fundacion'),$datos_opiniones);
        }
        if($request->user()->role_id==2){//admin es 2, usuario normal 1
            return view('fa_adm/welcome',compact('fundacion'));
        }
        if($request->user()->role_id==1){//admin es 2, usuario normal 1
            return view('fa_adm/opiniones_escritor');
        }
        else{
            return view('welcome',compact('fundacion'),$datos_opiniones);
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
        //
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
        $fundacion=Fundacion::where('id_fundacion',$id)->first();
        return view('fa_adm.editar_fundacion',compact('fundacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFundacionRequest $request, $id)
    {
        $datosFundacion=request()->except(['editar_fundacion','id_fundacion','_token','_method']);
        $imagen_portada1 = $request->file('imagen1');
        $imagen_portada2 = $request->file('imagen2');
        $imagen_aporte = $request->file('imagen3');
        if($imagen_portada1 != ''){
            $nombrePortada1 = 'portada_1' .  '.' . $imagen_portada1->getClientOriginalExtension();
            $imagen_portada1->move(public_path('assets/img/inicio'), $nombrePortada1);
            $datosFundacion['imagen1']=$nombrePortada1;
        }

        if($imagen_portada2 != ''){
            $nombrePortada2 = 'portada_2' .  '.' . $imagen_portada2->getClientOriginalExtension();
            $imagen_portada2->move(public_path('assets/img/inicio'), $nombrePortada2);
            $datosFundacion['imagen2']=$nombrePortada2;
        }

        if($imagen_aporte != ''){
                $nombreAporte = 'aporte' .  '.' . $imagen_aporte->getClientOriginalExtension();
                $imagen_aporte->move(public_path('assets/img/inicio'), $nombreAporte);
                $datosFundacion['imagen3']=$nombreAporte;
        }
        
        Fundacion::where('id_fundacion','=',$id)->update($datosFundacion);

        return redirect('welcome')->with('success', 'Data Added successfully.');
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
