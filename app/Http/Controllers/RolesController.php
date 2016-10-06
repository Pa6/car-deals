<?php

namespace App\Http\Controllers;

use Bican\Roles\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;

class RolesController extends Controller
{
    public function index(){
        return JsonResponse::create(Role::all());
    }
}
