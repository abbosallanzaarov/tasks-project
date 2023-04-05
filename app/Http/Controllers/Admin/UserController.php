<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        $count = count($users);
        return view('admin.user.index', compact('users', 'count'));
    }
    public function create()
    {
        return view('admin.user.create');
    }
    public function store(UserAddRequest $request)
    {
        $userAdd = User::create([
            'name' => $request->name,
            'email' =>   $request->email,
            'password' => Hash::make($request->password),
            'job'     => $request->job,
            'age'    =>  $request->age,
            'role' => 1,
        ]);
        return redirect()->back()->with('success', 'All Good User Created');
        if ($userAdd) {
        }
    }
}
