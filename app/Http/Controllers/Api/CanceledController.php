<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tasks;

class CanceledController extends Controller
{
    public function caceledTask($taskId)
    {
        try {
        $task = Tasks::find($taskId)->update(['status' => 'canceled']);
        return response()->json(
            [
                'status'=>true,
                'msg'=> 'task canceled success'
            ], 200
        );
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'error'=>$th->getMessage()
            ], 500);
        }
    }
}
