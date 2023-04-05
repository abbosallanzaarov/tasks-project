<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Forward;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ForwardController extends Controller
{
    public function forwardUser($id)
    {
        try{
        $users = User::where('role','!=','0')->where('id','!=', $id)->get();
        return response()->json([
            'status'=> true,
            'message'=> 'success users',
            'data'=> $users
        ], 200);
        }catch(\Throwable $th){
            return response()->json([
                'status'=> false,
                'error'=> $th->getMessage()
            ], 500);
        }
    }
    public function ForwardTask(Request $request, $TaskId)
    {
        try{
            $validateForward = Validator::make($request->all() ,
            [
                'forward_comment'=> 'required|string',
                "to_id"=>"required|numeric",
                "task_id"=> "required|numeric"
            ]);
            if($validateForward->fails()){
                return response()->json(
                    [
                        'status'=>false,
                        'error'=>$validateForward->errors()
                    ] , 401
                    );
            }
        $store = Forward::create([
            'forward_comment' => $request->forward_comment,
            'to_id' => $request->to_user,
            'from_id' => auth()->user()->id,
            'task_id' => $TaskId,
        ]);
        if($store){
            $task = Tasks::find($TaskId)->update([
                'status' => 'forwarded'
            ]);
        }
        return response()->json([
            'status'=>true,
            'msg'=> 'forward success',
            'data'=> $store
        ] , 200);
        }catch(\Throwable $th){
        return response()->json([
            'status'=> false,
            'error'=>$th->getMessage()
        ], 500);
        }
    }
    public function forwardShow()
    {
        try{
        $forward = Forward::where('to_id' , auth()->user()->id)->first();
        return response()->json([
            'status'=>true,
            'data'=>$forward
        ], 200);
        }catch(\Throwable $th){
            return response()->json([
                'status'=>false,
                'error'=> $th->getMessage()
            ], 500);
        }
    }
    public function forwardTMe()
    {
        try{
            $forwards = Forward::where('to_id' ,auth()->user()->id)->get();
            return response()->json(
                [
                    'status'=>true,
                    'data'=>$forwards
                ]
                , 200 );
        }catch(\Throwable $th)
        {
            return response()->json([
                'status'=> false,
                'error'=>$th->getMessage()
            ] , 500);
        }
    }
}
