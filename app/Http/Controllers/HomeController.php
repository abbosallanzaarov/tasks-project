<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        $user= User::where('id' , Auth::user()->id);
        if(Auth::user()->role == 0){
            return view('admin.dashboard' , compact('user'));
        }elseif(Auth::user()->role == 1){
            $user = Tasks::where('from_id' , Auth::User()->id)->where('status' , 'new')->get();
            return view('user.dashboard' , compact('user'));
        }
    }
}
