<?php

namespace App\Http\Controllers;

use App\Models\Done;
use App\Models\Tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoneController extends Controller
{
    public function index($id)
    {
        $task = Tasks::find($id);

        return view('user.done.index' , compact('task'));
    }
    public function add(Request $request)
    {
        $add = Done::create([
            'task_id'=>$request->task_id,
            'answer'=> $request->answer,
            'user_id' => Auth::user()->id
        ]);
        if($add)
        {
            $task = Tasks::find($request->task_id)->update(['status' => 'expected']);
        }
        return redirect()->route('my.task');
    }
    public function answerShow($id)
    {
        $answer = Done::where('task_id' , $id)->first();
        $task = Tasks::find($id);
        return view('user.done.show' , compact('answer' , 'task'));
    }
    public function answerFalse(Request $request , $id)
    {
        $task = Tasks::find($request->task_id)->update(['status' => 'False']);
        $answer = Done::find($id)->update(['result' => 'true']);
        return redirect()->route('user.addtask');
    }
    public function answerTrue( Request $request , $id)
    {
        $task = Tasks::find($request->task_id)->update(['status' => 'True']);
        $answer = Done::find($id)->update(['result' => 'false']);
        return redirect()->route('user.addtask');


    }

}
