<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServicioRestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Servicio::all();
        return response()->json($model, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new Servicio([
            'name'=>$request['name'],
            'description'=>$request['description'],
            'negocio_id'=>$request['negocio_id'],
            'status'=>$request['status'],
        ]);
        $model->save();
        return response()->json([
            'mensaje' => "The model was stored successfully",
            'model' => $model
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($model)
    {
        $model= Servicio::find($model);

        if (!$model)
        {
            return response()->json(['mensage' => 'Do not find this model'],
        Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return response()->json([
            'mensage'=>"The Model finder returned",
            'model'=>$model
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $model)
    {
        $model= Servicio::find($model);
        $model->update($request->only(
        'name',
        'description',
        'status',
        'negocio_id'
        ));
        return response()->json([
            'mensaje' => "The Model was update successfully",
            'model' => $model
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($model)
    {
        if($model= Servicio::find($model))
    {
        $model->delete();
        return response()->json([
            'mensaje' => "The model was delete successfully"
        ],Response::HTTP_OK);
    }
        else
        return response()->json([
        'mensaje' => "Do not finded this model",
        ],Response::HTTP_CONFLICT);
    }

}
