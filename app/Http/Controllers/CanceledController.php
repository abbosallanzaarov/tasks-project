<?php

namespace App\Http\Controllers;

use App\Models\Canceled;
use App\Models\Tasks;
use Illuminate\Http\Request;
uSE Illuminate\Support\Facades\Auth;

class CanceledController extends Controller
{
    public function index($id)
    {
        $task = Tasks::find($id)->update(['status' => 'canceled']);
        return redirect()->back();
    }
    public function show($id)
    {
        $cancel = Canceled::where('task_id' , $id)->first();
        return view('user.canceled.cancel' , compact('cancel'));

    }
}
