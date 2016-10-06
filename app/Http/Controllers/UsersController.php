<?php

namespace App\Http\Controllers;

use App\User;
use Bican\Roles\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user){
            return JsonResponse::create(User::all());
        }else{
            return JsonResponse::create(['error' => 'access_denied'],401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'email' => 'email|required|unique:users,email',
            'username' => 'required',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4',
            'role_id' => 'required'
        ];
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return response()->json($validation->messages(),422);
        }

        $role = Role::where('id',$request['role_id'])->first();
        if(!$role){
            return JsonResponse::create(['error' => 'role_not_found'],404);
        }
        $request->merge(['role_id' => $role->id]);
        User::create($request->all());
        return JsonResponse::create(['message' => 'success'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        if($user){
            return JsonResponse::create(User::where('id',$id)->first());
        }
        else{
            return JsonResponse::create(['message' => 'access_denied'],401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userauth = Auth::user();
        $user = User::findOrFail($id);

        if($userauth->id == $user->id){
            $data = Input::all();
            if(Input::get('password')){

                exit("here");
                $user->password = Hash::make(Input::get('password'));
            }
            $user->update($data);
            return JsonResponse::create(['message' => 'success'],200);
        }else{
            return JsonResponse::create(['error' => 'access_denied'],401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
