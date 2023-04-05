<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskAddRequest;
use App\Models\Done;
use App\Models\Forward;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public $sortResult;
    public function index()
    {
        $users = User::where('role' , '!=' , 0)->where('id' , '!=' , Auth::user()->id)->select('id' , 'name' , 'job')->get();
        $tasks = Tasks::where('user_id' , Auth::user()->id)->get();

        return view('user.tasks.add-task' , compact('users' , 'tasks'));
    }
    public function addTask(TaskAddRequest $request)
    {
        $add = Tasks::create([
            'user_id'      => Auth::user()->id,
            'from_id'      => $request->from_id,
            'title'        => $request->title,
            'content'      => $request->content,
            'lifetime'     => $request->lifetime . ' '  . $request->time ,
            'status'       => 'new'
        ]);
        return redirect()->back()->with('success' , 'All good task created');
    }
    public function myTask()
    {
        $my_forward = Forward::where('from_id' , Auth::user()->id)->get();
        $tasks= Tasks::where('from_id' , Auth::user()->id)->get();
        $taskCount = count($tasks);
        $task= Tasks::where('status' ,'new')->get();
        $newCount = count($task);
        $done= Tasks::where('status' ,'done')->get();
        $doneCount = count($done);
        $expected = Tasks::where('status' ,'expected')->get();
        $exCount = count($expected);
        $forwarded = Tasks::where('status' ,'forwarded')->get();
        $forCount = count($forwarded);
        $true = Tasks::where('status' ,'True')->get();
        $trueCount = count($true);
        $false = Tasks::where('status' ,'False')->get();
        $falseCount = count($false);

        return view('user.tasks.my-task' , compact('tasks' , 'my_forward' , 'taskCount' , 'newCount' ,'doneCount' , 'exCount' , 'forCount' , 'trueCount' , 'falseCount'));

    }
    public function sort($status)
    {
        if($status == 'True' || $status == 'False' || $status == 'expected'){
            $this->sortResult = Done::where('result' , $status)->get();
            $result = $this->sortResult;
            return view('user.tasks.show' , compact('result' , 'status'));
        }elseif($status == 'done' || $status == 'canceled' || $status == 'forwarded' || $status == 'New'){
            $this->sortResult = Tasks::where('from_id' , Auth::User()->id)->where('status', $status)->get();
            $result = $this->sortResult;
            return view('user.tasks.show' , compact('result' , 'status'));

        }

    }

}
