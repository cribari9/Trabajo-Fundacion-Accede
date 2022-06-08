<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voluntario;
use App\Http\Requests\UpdateVoluntariosRequest;
use App\Http\Requests\StoreVoluntariosRequest;

class VoluntarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos['voluntarios']=Voluntario::orderBy('rut_voluntario','DESC')->paginate(3);
        if($request->user()->role_id==2){//admin es 2, usuario normal 1
            return view('fa_adm/voluntarios',$datos);
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
    public function store(StoreVoluntariosRequest $request)
    {
        $voluntario= new Voluntario();

            $voluntario->rut_voluntario = $request->txtRut_Voluntario;
            $voluntario->nombre = $request->txtNombre;
            $voluntario->apellido_paterno = $request->txtApellido_Paterno;
            $voluntario->apellido_materno = $request->txtApellido_Materno;
            $voluntario->telefono = $request->txtTelefono;
            $voluntario->correo=$request->txtCorreo;
            $voluntario->edad = $request->txtEdad;
            $voluntario->region=$request->txtRegion;
            $voluntario->ocupacion=$request->txtOcupacion;
        
        $voluntario->save();
        
 
        if($request->user()==null){
            return redirect('welcome')->with('success', 'Data Added successfully.');
        }
        if($request->user()->role_id==2){//admin es 2, usuario normal 1
            return redirect('voluntarios')->with('success', 'Data Added successfully.');
        }
        else{
            return redirect('welcome')->with('success', 'Data Added successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voluntario  $voluntario
     * @return \Illuminate\Http\Response
     */
    public function show(Voluntario $voluntario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voluntario  $voluntario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voluntario=Voluntario::where('rut_voluntario',$id)->first();
        return view('fa_adm.editar_voluntario',compact('voluntario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVoluntariosRequest $request, $id)
    {
        $datosVoluntario=request()->except(['editar_voluntario','rut_voluntario','_token','_method']);
       
        Voluntario::where('rut_voluntario','=',$id)->update($datosVoluntario);

        return redirect('voluntarios')->with('success', 'Data Added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voluntario  $voluntario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Voluntario::where('rut_voluntario',$id)->delete();
        return redirect('voluntarios')->with('status','Voluntario eliminado con éxito');
    }
}
