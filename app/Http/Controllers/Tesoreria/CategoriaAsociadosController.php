<?php

namespace App\Http\Controllers\Tesoreria;

use App\Http\Controllers\Controller;
use App\Models\Accounting\CategoriaGastosAsociados;
use Illuminate\Http\Request;

class CategoriaAsociadosController extends Controller
{
    public function index() {

        return view('tesoreria.gastos-asociados-categories.index');
    }

    public function create(){
        return view('tesoreria.gastos-asociados-categories.create');
    }

    public function store(Request $request){
        $rules = [
            'nombre' => 'required|string|max:255',
        ];

        // Validar los datos del formulario
        $validatedData = $request->validate($rules);
        $banco = CategoriaGastosAsociados::create($validatedData);

        return redirect()->route('gastos-asociados-categories.index')->with('status', 'Categoria de gastos asociado creado con éxito!');

    }
    public function edit(CategoriaGastosAsociados $categoria){

        return view('tesoreria.gastos-asociados-categories.edit', compact('categoria'));
    }

    public function update(Request $request, CategoriaGastosAsociados $categoria){
        $rules = [
            'nombre' => 'required|string|max:255',
        ];

        // Validar los datos del formulario
        $validatedData = $request->validate($rules);
        $categoria->update([
            'nombre' => $validatedData['nombre']
        ]);

        return redirect()->route('gastos-asociados-categories.index')->with('status', 'Categoria de gastos asociado actualizado con éxito!');

    }
    public function destroy(Request $request){
        $categoria = CategoriaGastosAsociados::find($request->id);
        $categoria->delete();
        return redirect()->route('gastos-asociados-categories.index')->with('status', 'Categoria de gastos asociado eliminada con éxito!');
    }
}
