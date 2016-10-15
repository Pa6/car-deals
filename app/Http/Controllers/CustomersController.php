<?php

namespace App\Http\Controllers;

use App\Customer;
use App\IdModels;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Claims\Custom;

class CustomersController extends Controller
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
            return JsonResponse::create(Custom::All());
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
            'chasis_number' => 'chasis_number|required|unique:customers,chasis_number',
            'name' => 'required',
            'id_card' => 'required',
            'model_id' => 'required',
            'telephone' => 'required',
            'vehicle_reg_number'=> 'required',
            'chasis_number' => 'required',
            'engine_number' => 'required',
            'selling_price' => 'required',
        ];
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails()) {
            return response()->json($validation->messages(),422);
        }
        $model = IdModels::find(Input::get('model_id'));
        $request->merge(['model_id' => $model->id]);
        Customer::create($request->all());
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
        //
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
        //
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
