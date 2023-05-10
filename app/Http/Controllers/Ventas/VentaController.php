<?php

namespace App\Http\Controllers\Ventas;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$productos = Producto::all();
        return view('modules.ventas.index')->with([]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'id' => 'required',
            'cantidad' => 'required',
        ];
        $messages = [
            'id.required' => 'Ingresa el id del producto',
            'cantidad.required' => 'Ingresa la cantidad a vender',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors->all() as $message) {
                return response()->json(['success'=>false,'message'=>$message]);
            }
        }else{

            try{
                $producto = Producto::find($request->id);
                $stockActual = $producto->stock;
                if($stockActual<$request->cantidad){
                    return response()->json(['success'=>false,'message'=>'Stock insuficiente para realizar la venta, actuamente contamos con '.$stockActual.' Exis.']);
                }else{
                    $producto->stock = ($stockActual-$request->cantidad);
                    $producto->update();
                    return response()->json(['success'=>true,'message'=>'Venta realizada correctamente']);
                }
            }catch (QueryException $queryException) {
                return response()->json(['success'=>false,'message'=>$queryException->getMessage()]);
            }catch (Throwable $exception) {
                return response()->json(['success'=>false,'message'=>$exception->getMessage()]);
            }

        }






    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
