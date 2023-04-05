@extends('layouts.user')
@section('center')

<div class="container-fluid mt-5">
<div class="row mb-2">
    <div class="col-sm-6">
        <span>Task Title:  <b> {{$task->title}}</b></span>
    </div>
    <div class="col-sm-6">
        <span>Task content:  <b> {{$task->content}}</b></span>
    </div>
</div>
<div class="row mb-3">
    <span class="col-sm-6">
       from Whom :  <b> {{$task->user->name}}</b>
    </span>
    <span class="col-sm-6">
        to Whom :  <b> {{Auth::user()->name}}</b>
     </span>
</div>
    <form class="row" action="{{route('done.add' , $task->id)}}" method="post">
@csrf
<input type="hidden" name="task_id" value="{{$task->id}}">
        <div class="col-sm-4">
            <input type="text" name="answer" placeholder="answer" class="form-control">
        </div>
        <div class="col-sm-4">
           <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection

