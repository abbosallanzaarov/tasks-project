<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Done;
use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class DoneController extends Controller
{
    public function doneTaskAdd(Request $request)
    {
        try{
            $validateDone = Validator::make($request->all() , [
                'task_id' =>'required',
                'answer' => 'required',
            ]);
            if($validateDone->fails()){
                return response()->json(
                    [
                        'status'=>false,
                        'error'=>$validateDone->errors()
                    ] , 401
                    );
            }
            $add = Done::create([
                'task_id'=>$request->task_id,
                'answer'=> $request->answer,
                'user_id' => auth()->user()->id
            ]);
            if($add)
            {
                Tasks::find($request->task_id)->update(['status' => 'expected']);
            }
            return response()->json(
                [
                    'status'=> true,
                    'data'=>   $add
                ], 200
            );
        }catch(\Throwable $th){
            return response()->json([
                'status'=> false,
                'error'=> $th->getMessage()
            ], 500);
        }
    }
    public function taskAnswerShow($taskId)
    {
        try {
            $answer = Done::where('task_id', $taskId)->first();
            if($answer){
                return response()->json(
                    [
                        'status' => true,
                        'answer' => $answer,
                    ] , 200
                );
            }else{
                return response()->json(
                    [
                        'status'=>false,
                        'message'=> 'answer not found'
                    ] , 404
                    );
            }
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status'=>false,
                    'error'=> $th->getMessage()
                ]
                );
        }
    }
    public function answerTrueOrFalse(Request $request , $taskId)
    {
        try {
            $validateReq = Validator::make($request->all() , [
                'status'=>'required'
            ]);
            if($validateReq->fails()){
                return response()->json(
                    [
                        'status'=>false,
                        'msg' => 'validator error',
                        'err'=>$validateReq->errors()
                    ] , 401
                    );
            }
            if($request->status == 0){
                    Tasks::find($taskId)->update(['status' => 'False']);
            }elseif($request->status == 1){
                    Tasks::find($taskId)->update(['status' => 'True']);
            }
            return response()->json([
                'status'=>true,
                'msg'=> 'the answer to the question has been saved'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'error'=>$th->getMessage()
            ], 500);
        }
    }
}
