<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskAddRequest;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    public function getUserTasks()
    {
        if (auth()->user()->id) {
            $user = User::where('role', '!=', 0)->where('id', '!=', auth()->user()->id)->select('id', 'name', 'job')->get();
            $tasks = Tasks::where('user_id', auth()->user()->id)->get();
            return response()->json([
                'status'=>true,
                'users'=> $user,
                'tasks'=> $tasks,
            ], 200);
        }else{
            return response()->json([
                'status'=> false,
                'msg'=> 'id not found',


            ]);
        }
    }
    public function addTask(Request $request)
    {

        try{
            // validate task
            $validateTask = Validator::make($request->all() , [
                'from_id' => 'numeric|required|max:10',
                'title' => 'string|required|min:3',
                'content'=> 'string|required',
                'lifetime'=>'required',
                'time'   => 'required',
            ]);
            if($validateTask->fails()){
                return response()->json([
                    'status'=>false,
                    'error'=>$validateTask->errors()
                ]);
            }
            $add = Tasks::create([
                'user_id'      => auth()->user()->id,
                'from_id'      => $request->from_id,
                'title'        => $request->title,
                'content'      => $request->content,
                'lifetime'     => $request->lifetime . ' '  . $request->time ,
                'status'       => 'new'
            ]);
            if($add){
                return response()->json([
                    'status'=> true,
                    'msg'=> 'task create success',
                    'data'=> $add,
                ], 201);
            }
        }catch(\Throwable $th){
            return response()->json([
                'status'=> false,
                'error' => $th->getMessage()
            ], 400);
        }
    }
    public function myTask()
    {
        try{
        $tasks= Tasks::where('from_id' ,auth()->user()->id)->get();
        return response()->json([
            'status'=> true,
            'msg'=> 'user tasks',
            'data'=> $tasks
        ]);
        }catch(\Throwable $th){
            return response()->json([
                'status'=> false,
                'error'=> $th->getMessage()
            ]);
        }
    }
    public function showTask($taskId)
    {
        try {
            $task = Tasks::find($taskId);
            if($task){
                return response()->json(
                    [
                        'status'=> true ,
                        'data'=>$task
                    ] , 200
                    );
            }
            else{
                return response()->json([
                    'status'=> false,
                    'msg'=> 'task not found'
                ] , 404);
            }
                } catch (\Throwable $th) {
                    return response()->json([
                        'status'=> false,
                        'error'=> $th->getMessage()
                    ]);
        }
    }
}
