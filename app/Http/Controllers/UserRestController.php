<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class UserRestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = User::all();
        return response()->json($model, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new User([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'dni'=>$request['dni'],
            'phone'=>$request['phone'],
            'birthday'=>$request['birthday'],
            'status'=>$request['status'],
            'password'  => bcrypt($request['password']),
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
        $model= User::find($model);

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
        $model= User::find($model);

        if(!$model)
        {
            return response()->json(['mensage'=>"can not find this model"],
            Response::HTTP_BAD_REQUEST);
        }
        else {
            $model->name     = $request->get('name');
            $model->email    = $request->get('email');
            $model->dni      = $request->get('dni');
            $model->phone    = $request->get('phone');
            $model->status   = $request->get('status');
            $model->birthday = $request->get('birthday');
            $model->password = bcrypt($request['password']);
            $model->save();
            return response()->json([
                'mensaje' => "The Model was update successfully",
                'model' => $model
            ],Response::HTTP_CREATED);  }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($model)
    {
        if($model= User::find($model))
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
