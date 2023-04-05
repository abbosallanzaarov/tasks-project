<?php

namespace App\Http\Controllers;

use App\Models\Forward;
use App\Models\Tasks;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForwardController extends Controller
{
    public function index($id)
    {
        // forward INdex Page
        $users = User::where('role','!=','0')->where('id','!=',Auth::user()->id)->get();

        return view('user.forwered.index' , compact('id','users' ));
    }
    public function forwardTasks(Request $request,$id)
    {
        //forward task
        $store = Forward::create([
            'forward_comment' => $request->forward_comment,
            'to_id' => $request->to_user,
            'from_id' => Auth::user()->id,
            'task_id' => $id,
        ]);
        if($store){
            $task = Tasks::find($id)->update([
                'status' => 'forwarded'
            ]);
        }
        return redirect()->route('my.task');
    }
    public function forwardShow($id)
    {

        $forward = Forward::where('to_id' , $id)->first();
        return view('user.forwered.show' , compact('forward'));

    }
    public function forwardTMe()
    {
        $forwards = Forward::where('to_id' , Auth::user()->id)->get();
        return view('user.me-forward.index' , compact('forwards'));
    }
}
