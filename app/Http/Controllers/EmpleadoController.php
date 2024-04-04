<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use http\Env\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['empleados'] = Empleado::all();//paginate(2);
        return view('empleado.index', $datos);//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre'=> 'required|string|max:255',
            'Apellido'=> 'required|string|max:255',
            'Telefono' => 'required|string|max:255',
            'Correo'=> 'required|email|max:255',
            'Foto'=> 'required|mimes:jpeg,png,jpg|max:9999999999'

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];

        $this->validate($request, $campos,$mensaje);

        //$datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        Empleado::insert($datosEmpleado);

        return redirect('empleado')->with('mensaje','Empleado agregado con exito');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit' , compact('empleado') );
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=> 'required|string|max:255',
            'Apellido'=> 'required|string|max:255',
            'Telefono' => 'required|numeric|max:9999999999',
            'Correo'=> 'required|email|max:255',
            'Foto'=> 'mimes:jpeg,png,jpg|max:10000'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos,$mensaje);

        $datoimagen = Empleado::findOrFail($id);
        $datosEmpleados = request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            Storage::delete('public/'.$datoimagen->Foto);
            $datosEmpleados['Foto'] = $request->file('Foto')->store('uploads','public');
        }
        Empleado::where('id','=',$id)->update($datosEmpleados);
        return redirect('empleado')->with('mensaje','Empleado Modificado');;
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datoimagen = Empleado::findOrFail($id);
        if(Storage::delete('public/'.$datoimagen->Foto)){

            Empleado::destroy($id);

        }else{
            Empleado::destroy($id);
        }

        return redirect('empleado')->with('mensaje','Empleado Borrado');
        //
    }
}
