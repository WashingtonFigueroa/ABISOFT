<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        $registros = Registro::get();
        return response()->json($registros,200);
    }

    public function store(Request $request)
    {
        $request->validate([
            "nombres" => "required",
            "edad" => "required",
            "fecha_nacimiento" => "required",
            "fecha_inscripcion" => "required",
            "costo" => "required"
        ]);
        $r = new Registro();
        $r->nombres = $request->nombres;
        $r->edad = $request->edad;
        $r->fecha_nacimiento = $request->fecha_nacimiento;
        $r->fecha_inscripcion = $request->fecha_inscripcion;
        $r->costo = $request->costo;
        $r->save();
        return response()->json(["mensaje" => "Registro Exitoso"]);
    }

    public function show($id)
    {
        $registro = Registro::find($id);
        return response()->json($registro);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "nombre" => "required",
            "edad" => "required",
            "fecha_nacimiento" => "required",
            "fecha_inscripcion" => "required",
            "costo" => "required"
        ]);
        $r = Registro::find($id);
        $r->nombre = $request->nombre;
        $r->edad = $request->edad;
        $r->fecha_nacimiento = $request->fecha_nacimiento;
        $r->fecha_inscripcion = $request->fecha_inscripcion;
        $r->costo = $request->costo;
        $r->save();
        return response()->json(["mensaje" => "Modificado Exitosamente"]);
    }

    public function destroy($id)
    {
        $r = Registro::find($id);
        $r->destroy();
        return response()->json(["mensaje" => "Registro Eliminado"]);
    }
}
