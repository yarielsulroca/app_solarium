<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NegocioRestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salones = Negocio::all();
        return response()->json($salones, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $model)
    {
        $model = new Negocio([
            'name'=>$request['name'],
            'adresse'=>$request['adresse'],
            'phone'=>$request['phone'],
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
        $model= Negocio::find($model);

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
    public function update(Request $request,$model)
    {
        $model= Negocio::find($model);
        $model->update($request->only(
        'name',
        'adresse',
        'status',
        'phone'
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
        if($model= Negocio::find($model))
    {
        $model->delete();
        return response()->json([
            'mensaje' => "The Model was delete successfully"
        ],Response::HTTP_OK);
    }
        else
        return response()->json([
        'mensaje' => "Do not was finded this Model",
        ],Response::HTTP_CONFLICT);
    }
}
