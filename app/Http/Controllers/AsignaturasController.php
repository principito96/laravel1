<?php

namespace App\Http\Controllers;

use App\Models\Asignaturas;
use App\Models\Profesores;
use Illuminate\Http\Request;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignatura = Asignaturas::orderBy('nombre')->paginate(5);
        return view('asignaturas.index', compact('asignatura'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profes = Profesores::getArrayIdNombre();
        return view('asignaturas.create',compact('profes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //1.- Validamos
         $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:50'],
            'descripcion' => ['required', 'string', 'min:3', 'max:150'],
            'creditos' => ['required', 'integer', 'min:0', 'max:100'],
            'profesor_id'=>['required']
        ]);
        //2.- Procesar
        try {
            Asignaturas::create($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('asignaturas.index')->with("mensaje", "Error con la BBDD");
        }
            return redirect()->route('asignaturas.index')->with("mensaje", "¡¡¡Asignaturas creado correctamente!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignaturas  $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function show(Asignaturas $asignatura)
    {
        return view('asignaturas.show',compact('asignatura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignaturas  $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignaturas $asignatura)
    {
        $profes = Profesores::getArrayIdNombre();
        return view('asignaturas.edit',compact('asignatura','profes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignaturas  $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignaturas $asignatura)
    {
         //1.- Validamos
         $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:50'],
            'descripcion' => ['required', 'string', 'min:3', 'max:200'],
            'creditos' => ['required', 'integer', 'min:0', 'max:100'],
            'profesor_id'=>['required']
        ]);
        //2.- Procesar
        try {
            $asignatura->update($request->all());
        } catch (\Exception $ex) {
            return redirect()->route('asignaturas.index')->with("mensaje", "Error con la BBDD");
        }
            return redirect()->route('asignaturas.index')->with("mensaje", "¡¡¡Asignaturas editado correctamente!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignaturas  $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignaturas $asignatura)
    {
        try {
            $asignatura->delete();
        } catch (\Exception $ex) {
            return redirect()->route('asignaturas.index')->with("mensaje", "Error con la BBDD");
        }
        return redirect()->route('asignaturas.index')->with("mensaje", "¡¡¡Asignaturas borrado correctamente!!!");
    }
}
