<?php

namespace App\Http\Controllers\Productos;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::all();
        return view('modules.producto.index')->with(['productos'=>$productos]);
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
        $response = response();
        $rules = [
            'nombre' => 'required',
            'referencia' => 'required',
            'precio' => 'required',
            'peso' => 'required',
            'categoria' => 'required',
            'stock' => 'required',
        ];
        $messages = [
            'nombre.required' => 'We need to know your email address!',
            'referencia.required' => 'referencia required',
            'precio.required' => 'precio required',
            'peso.required' => 'peso required',
            'categoria.required' => 'categoria required',
            'stock.required' => 'stock required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            //dd('fail', $validator->errors());
            $errors = $validator->errors();
            foreach ($errors->all() as $message) {
                // ...
                return response()->json(['success'=>false,'message'=>$message]);
            }

        }else{
            //dd('no fail');
            try{
                Producto::create(request()->all());
                $response = response()->json(['success'=>true,'message'=>'Producto registrado correctamente']);
            }catch (QueryException $queryException) {
                $response = response()->json(['success'=>false,'message'=>$queryException->getMessage()]);
            }catch (Throwable $exception) {
                $response = response()->json(['success'=>false,'message'=>$exception->getMessage()]);
            }

        }
        return $response;
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
        //dd($request->all(), $id);
        $response = response();
        $rules = [
            'nombre' => 'required',
            'referencia' => 'required',
            'precio' => 'required',
            'peso' => 'required',
            'categoria' => 'required',
            'stock' => 'required',
        ];
        $messages = [
            'nombre.required' => 'Requieres el nombre para actualizar!',
            'referencia.required' => 'referencia required',
            'precio.required' => 'precio required',
            'peso.required' => 'peso required',
            'categoria.required' => 'categoria required',
            'stock.required' => 'stock required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            //dd('fail', $validator->errors());
            $errors = $validator->errors();
            foreach ($errors->all() as $message) {
                // ...
                return response()->json(['success'=>false,'message'=>$message]);
            }

        }else{
            //dd('no fail');
            try{
                //Producto::create(request()->all());
                $producto = Producto::where('id', $id)->delete();
                $producto->nombre = $request->nombre;
                $producto->referencia = $request->referencia;
                $producto->precio = $request->precio;
                $producto->peso = $request->peso;
                $producto->categoria = $request->categoria;
                $producto->stock = $request->stock;
                $producto->save();

                $response = response()->json(['success'=>true,'message'=>'Producto registrado correctamente']);
            }catch (QueryException $queryException) {
                $response = response()->json(['success'=>false,'message'=>$queryException->getMessage()]);
            }catch (Throwable $exception) {
                $response = response()->json(['success'=>false,'message'=>$exception->getMessage()]);
            }

        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        //dd($id);
        $response = response();
        try{

            Producto::where('id', $id)->delete();
            $response = response()->json(['success'=>true,'message'=>'Producto eliminado correctamente']);

        }catch (QueryException $queryException) {
            $response = response()->json(['success'=>false,'message'=>$queryException->getMessage()]);
        }catch (Throwable $exception) {
            $response = response()->json(['success'=>false,'message'=>$exception->getMessage()]);
        }
        return $response;
    }


    public function data_producto_mayor_stock()
    {
        //
        $mayor = Producto::query()->selectRaw('MAX(stock)')->get();
        $producto = Producto::query()
                    ->select('id','nombre')
                    ->where('stock', $mayor[0]['MAX(stock)'])
                    ->take(1)
                    ->get();

        return response()->json(['success'=>true, 'data'=>$producto]);
    }


    public function data_producto_mayor_venta()
    {
        //
        //$ventas = Ventas::all();
        //return view('modules.producto.index')->with(['productos'=>$ventas]);
        return response()->json(['success'=>true, 'data'=>'']);
    }


}
