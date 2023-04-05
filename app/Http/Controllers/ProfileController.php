<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('user.profile.profile' , compact('user'));
    }
    public function update(Request $request , $id)
    {
        dd($id);
    }
}
