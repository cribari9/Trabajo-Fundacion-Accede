<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUsersRequest;
use App\Http\Requests\StoreUsersRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos['usuarios']=User::orderBy('id','DESC')->paginate(3);
        if($request->user()==null){
            return redirect('welcome')->with('success', 'Data Added successfully.');
        }
        if($request->user()->role_id==2){//admin es 2, usuario normal 1
            return view('fa_adm/usuarios',$datos);
        }
        else{
            return redirect('welcome')->with('success', 'Data Added successfully.');
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
    public function store(StoreUsersRequest $request)
    {
        $usuario= new User();

            $usuario->name = $request->name;
            $usuario->email=$request->email;
            $usuario->password=Hash::make($request->password);
      /*      if($request->rol=="administrador"){
            return redirect('welcome')->with('success', 'Data Added successfully.');
            }
            else{
                return redirect('welcome')->with('success', 'Data Added successfully.');
            }*/
            $usuario->role_id=$request->rol;

        $usuario->save();
        
 
        if($request->user()==null){
            return redirect('welcome')->with('success', 'Data Added successfully.');
        }
        if($request->user()->role_id==2){//admin es 2, usuario normal 1
            return redirect('usuarios')->with('success', 'Data Added successfully.');
        }
        else{
            return redirect('welcome')->with('success', 'Data Added successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Miembro  $miembro
     * @return \Illuminate\Http\Response
     */
    public function show(Miembro $miembro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Miembro  $miembro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=User::where('id',$id)->first();
        return view('fa_adm.editar_usuario',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Miembro  $miembro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        $datosUsuario=request()->except(['editar_usuario','id','_token','_method']);
        $datosUsuario['password']=Hash::make($request->password);
        User::where('id','=',$id)->update($datosUsuario);

        return redirect('usuarios')->with('success', 'Data Added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Miembro  $miembro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect('usuarios')->with('status','Usuario eliminado con éxito');
    }
}
