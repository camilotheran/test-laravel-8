<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $productos = Producto::all();
          $grantotal = $productos->sum('precio_total');

          return view('productos.index', compact('productos','grantotal'));

              #->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("productos.create");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
         'id' => 'required',
         'nombre' => 'required',
         'cantidad' => 'required',
         'precio_unitario' => 'required'
     ]);
     
 
     $campos = $request->all();
     $campos["precio_total"] = floatval($campos["precio_unitario"] * intval($campos["cantidad"]));
     Producto::create($campos);

     return redirect()->route('productos.index')
                     ->with('success','Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
         return view('productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
           'id' => 'required',
           'nombre' => 'required',
           'cantidad' => 'required',
           'precio_unitario' => 'required',
       ]);
        

       $campos = $request->all();
       $campos["precio_total"] = floatval($campos["precio_unitario"] * intval($campos["cantidad"]));
       $producto->update($campos);

        return redirect()->route('productos.index')
                        ->with('success','Producto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

       return redirect()->route('productos.index')
                       ->with('success','Productos eliminados exitosamente');
    }
}
