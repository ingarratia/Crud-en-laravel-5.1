<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Crud;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empleados = Crud::all();
        return view('index', ['empleados' => $empleados]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('from');
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
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'Apellidop' => 'required',
            'Apellidom' => 'required',
            'rfc' => 'required',
            'fechanacimiento' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/empleado')
                        ->withErrors($validator)
                        ->withInput();
        }
        

        $crud = new Crud;
        $crud->nombre = $request->nombre;
        $crud->apellido_p = $request->Apellidop;
        $crud->apellido_m = $request->Apellidom;
        $crud->rfc = $request->rfc;
        $crud->fecha_nacimiento = $request->fechanacimiento;
        $crud->save();
        return redirect('/empleado')->with(['message' => 'Empleado agregado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Crud::find($id);
        return view('empleado', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Crud::find($id);
        return view('from' , ['empleado' => $empleado]);
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
        //
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'Apellidop' => 'required',
            'Apellidom' => 'required',
            'rfc' => 'required',
            'fechanacimiento' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/empleado/' . $id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }


        $empleado = Crud::find($id);
        $empleado->nombre = $request->nombre;
        $empleado->apellido_p = $request->Apellidop;
        $empleado->apellido_m = $request->Apellidom;
        $empleado->rfc = $request->rfc;
        $empleado->fecha_nacimiento = $request->fechanacimiento;
        $empleado->save();

        return redirect('/empleado')->with(['message' => 'Empleado editado']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $crud = Crud::find($id);
        $crud->delete();


        return redirect('/empleado')->with(['message' => 'Empleado eliminado']);
    }
}
