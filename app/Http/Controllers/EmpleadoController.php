<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Turno;
use App\Departamento;
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $empleados=Empleado::paginate(8);
        //DB::table('empleados')->paginate(15);
       
       return view('empleados.index',['empleados'=>$empleados]); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado= new Empleado;
        $turnos=Turno::all()->pluck('descripcion','id');
        $sexos = array('HOMBRE' =>'HOMBRE' ,'MUJER'=>'MUJER' );
        $departamentos=Departamento::all()->pluck('descripcion','id');
        return view('empleados.create',['empleado'=>$empleado,
                                        'sexos'=>$sexos,
                                        'turnos'=>$turnos,
                                        'departamentos'=>$departamentos]);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $validatedData = $request->validate([
        'matricula' => 'required|unique:empleados|min:3|max:4',
        'paterno' => 'required',
        'materno' => 'required',
        'nombre' => 'required',
        'fecha_nacimiento' => 'required',
       ]);
       //dd($request->toArray());
       $empleado= new Empleado($request->all());
      
      /* $empleado->matricula=$request->input['matricula'];
       $empleado->nombre=$require->input['nombre'];
       $empleado->paterno=$request->input['paterno'];
       $empleado->materno=$request->input['materno'];
       $empleado->fecha_nacimiento=$request->input['fecha_nacimiento'];
       $empleado->sexos=$request->input['sexos'];
       $empleado->turnos=$request->input['turnos'];
       $empleado->departamentos=$request->input['departamentos'];*/

       $empleado->save();
       if($empleado){
        echo"Los datos se guardaron correctamente";
       }else
       echo "Los datos no se guardaron";
       //return $this->index();
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
       $empleados=Empleado::find($id);// 
 $turnos=Turno::all()->pluck('descripcion','id');
 $sexos = array('HOMBRE' =>'HOMBRE' ,'MUJER'=>'MUJER' );
        $departamentos=Departamento::all()->pluck('descripcion','id');
        return view('empleados.edit',compact('empleados','turnos','sexos','departamentos'));
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
        $empleados=Empleado::find($id);
//$empleados=$request->all();
       $empleados->matricula=$request->input('matricula');
       $empleados->nombre=$request->input('nombre');
       $empleados->paterno=$request->input('paterno');
       $empleados->materno=$request->input('materno');
       $empleados->fecha_nacimiento=$request->input('fecha_nacimiento');
       $empleados->sexo=$request->input('sexo');
       $empleados->id_turno=$request->input('id_turno');
       $empleados->id_departamento=$request->input('id_departamento');

       $empleados->save();//
       return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $empleado=Empleado::find($id);
      
       $empleado->delete();//
      return $this->index();
    }
}
