<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductoApiRequest;
use App\Http\Response\Api\JsonHttpResponse;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::get(); //ORM Eloquent
        return JsonHttpResponse::successResponse($productos, 'Success');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoApiRequest $request)
    {
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
        ]);

        return JsonHttpResponse::successResponse($producto, 'Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::where('id', $id)->first();
        return JsonHttpResponse::successResponse($producto, 'Success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoApiRequest $request, string $id)
    {
        $producto = Producto::where('id', $id)->update([
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'precio' => $request->precio,
        ]);

        return JsonHttpResponse::successResponse($producto, 'Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::where('id', $id)->delete();

        return JsonHttpResponse::successResponse($producto, 'Eliminado');
    }
}
