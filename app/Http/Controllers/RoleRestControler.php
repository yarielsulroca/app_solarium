<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleRestControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Role::all();
        return response()->json($model, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $model)
    {
        $model = new Role([
            'name'=>$request['name'],
            'guard_name'=>$request['guard_name']
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
        $model= Role::find($model);

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
    public function destroy($model)
    {
        if($model= Role::find($model))
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
    public function showRolesToUser ($user)
    {
        $user= User::find($user);
        if(!$user)
        {
            return response()->json([
                'mensage'=> "Don't exist this user",
                Response::HTTP_BAD_REQUEST]);
        }
        return response()->json([
            'mensage'=> "the list of roles is:",
            'roles'=> $user->roles()->get(),
            Response::HTTP_OK]);
    }
    public function storeRoleToUser($roles,$user)
    {
    //$roles = array(); de tipo role, tambien le puedo pasar array numerico.
    // ejemplo:$roles=[1,2] ,
    //roles{{"id"=>1,"name=>"admin","guard_name"=>"web"},{"id"=>2,"name=>"trabajdor","guard_name"=>"web"}}
        $user= User::find($user);
        if (!$user){
            return response()->json([
                'mensage'=> "Don't exist this user",
                Response::HTTP_BAD_REQUEST]);
        }
        else
        {
            $user->assignRole($roles);
            return response()->json([
                'mensage'=>"the roles was assigneds",
                Response::HTTP_OK]);
        }
    }
    public function updateRoleToUser($roles,$user)
    {
        $user= User::find($user);
        if(!$user){
            return response()->json([
                'mensage'=> "Don't exist this user",
                Response::HTTP_BAD_REQUEST]);
        }
        else {
            $user->syncRoles($roles);
            return response()->json([
                'mensage'=>"the roles was sync",
                Response::HTTP_OK]);
        }
    }
    public function destroyRoleToUser($user,$roles){
        $user= User::find($user);
        if(!$user){
            if(!$user){
                return response()->json([
                    'mensage'=> "Don't exist this user",
                    Response::HTTP_BAD_REQUEST]);
            }
        else{
            $user->removeRole($roles);
            return response()->json([
                'mensage'=>"the roles was removed successfully",
                Response::HTTP_OK]);
            }
        }
    }


}
