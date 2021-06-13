<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade as Debugbar;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::all();

        return view('adminCreate.shop.productosIndex', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminCreate.shop.productosCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'cost' => 'required|numeric',
            'stock' => 'required|numeric',
            'dealer' => 'required',
            'description' => 'required',
            'tags' => 'required',
        ]);

        $input = $request->all();

        Productos::create($input);


        return redirect()->route('gestionProductos.index');
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
        $producto = Productos::find($id);
        return view('adminCreate.shop.productosEdit', compact('producto','producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {        
        $producto = Productos::findOrFail($id);
        
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'cost' => 'required|numeric',
            'stock' => 'required|numeric',
            'dealer' => 'required',
            'description' => 'required',
            'tags' => 'required',
        ]);

        $input = $request->all();

        $producto->fill($input)->save();
        
        return redirect()->route('gestionProductos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $producto = Productos::findOrFail($id);

        $producto->delete();

        return redirect()->route('gestionProductos.index');
    }
}
