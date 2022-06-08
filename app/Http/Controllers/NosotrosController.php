<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Miembro;
use App\Http\Requests\UpdateMiembrosRequest;
use App\Http\Requests\StoreMiembrosRequest;


class nosotrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos['miembros']=Miembro::all();
        if($request->user()==null){
            return view('nosotros',$datos);
        }
        if($request->user()->role_id==2){//admin es 2, usuario normal 1
            $data['miembros']=Miembro::orderBy('rut_miembro','DESC')->paginate(3);
            return view('fa_adm/nosotros',$data);
        }
        else{
            return view('nosotros',$datos);
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
    public function store(StoreMiembrosRequest $request)
    {
        $miembro= new Miembro();
        $foto = $request->file('txtImagen');
        if($foto != '')
        {  
            $nombreImagen = $request->txtRut_Miembro . '_' . $request->txtApellido_Paterno .  '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('assets/img/nosotros'), $nombreImagen);
            $miembro->rut_miembro = $request->txtRut_Miembro;
            $miembro->nombre = $request->txtNombre;
            $miembro->apellido_paterno = $request->txtApellido_Paterno;
            $miembro->apellido_materno = $request->txtApellido_Materno;
            $miembro->telefono = $request->txtTelefono;
            $miembro->cargo = $request->txtCargo;
            $miembro->foto=$nombreImagen;
            $miembro->correo=$request->txtCorreo;
            $miembro->descripcion=$request->txtDescripcion;
            $miembro->facebook=$request->txtFacebook;
            $miembro->twitter=$request->txtTwitter;
            $miembro->linkedin=$request->txtLinkedin;
            $miembro->instagram=$request->txtInstagram;
            $miembro->email=$request->txtCorreo;            
        }else{
            $miembro->rut_miembro = $request->txtRut_Miembro;
            $miembro->nombre = $request->txtNombre;
            $miembro->apellido_paterno = $request->txtApellido_Paterno;
            $miembro->apellido_materno = $request->txtApellido_Materno;
            $miembro->telefono = $request->txtTelefono;
            $miembro->cargo = $request->txtCargo;
            $miembro->correo=$request->txtCorreo;
            $miembro->descripcion=$request->txtDescripcion;
            $miembro->facebook=$request->txtFacebook;
            $miembro->twitter=$request->txtTwitter;
            $miembro->linkedin=$request->txtLinkedin;
            $miembro->instagram=$request->txtInstagram;
            $miembro->email=$request->txtCorreo;  
        }
        $miembro->save();
        
        return redirect('nosotros')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $miembro=Miembro::where('rut_miembro',$id)->first();

        if($request->user()==null){
            return view('ver_miembro',compact('miembro'));
        }
        if($request->user()->role_id==2){//admin es 2, usuario normal 1
            return view('fa_adm/ver_miembro',compact('miembro'));
        }
        else{
            return view('ver_miembro',compact('miembro'));
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
        $miembro=Miembro::where('rut_miembro',$id)->first();
        return view('fa_adm.editar_miembro',compact('miembro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMiembrosRequest $request, $id)
    {
        $datosFoto = $request->file('foto');
        if($datosFoto != '')
        {  
            $nombreFoto = $id . '_' . $request->apellido_paterno .  '.' . $datosFoto->getClientOriginalExtension();
            $datosMiembro=request()->except(['editar_miembro','rut_miembro','_token','_method']);
            $datosMiembro['foto']=$nombreFoto;
            $datosFoto->move(public_path('assets/img/nosotros'), $nombreFoto);

        }else{
            $datosMiembro=request()->except(['editar_miembro','rut_miembro','_token','_method']);
        }
        
        Miembro::where('rut_miembro','=',$id)->update($datosMiembro);

        return redirect('nosotros')->with('success', 'Data Added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Miembro::where('rut_miembro',$id)->delete();
        return redirect('nosotros')->with('status','Miembro eliminado con éxito');
    }
}
