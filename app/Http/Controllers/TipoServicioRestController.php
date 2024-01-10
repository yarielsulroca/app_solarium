<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\TipoServicio;

class TipoServicioRestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = TipoServicio::all();
        return response()->json($model, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new TipoServicio([
            'name'=>$request['name'],
            'description'=>$request['description'],
            'servicio_id'=>$request['servicio_id'],
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
        $model= TipoServicio::find($model);

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
        $model= TipoServicio::find($model);

        if($model)
        {
            $model->update($request->only(
            'name',
            'description',
            'status',
            'servicio_id'
            ));
            return response()->json([
                'mensaje' => "The Model was update successfully",
                'model' => $model
            ],Response::HTTP_CREATED);  }
            else
            return response()->json(['mensage'=>"can not find this model"],
                Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($model)
    {
        if($model= TipoServicio::find($model))
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
