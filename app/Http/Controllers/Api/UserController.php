<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function GetAllUsers()
    {
        $users = User::all();
        return response()->json([
            'status'=> true,
            'data'=> $users,
        ]);
    }
}
