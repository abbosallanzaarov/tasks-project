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
    </span>
    <span class="col-sm-6">
        to Whom :  <b> {{Auth::user()->name}}</b>
     </span>
</div>
<div class="row">
    <div class="col-12">
        <span>Answer::  </span>
        @if ($answer->answer)
       <b> {{$answer->answer}}</b>
        @else
        <h2>Javob yoq</h2>
        @endif
    </div>
    <form  action="{{route('answer.true' , $answer->id)}}" class="col-12 mb-2">
        @csrf
        <input type="hidden" name="task_id" value="{{$task->id}}">

        <button class="btn btn-success">True</button>
    </form>
    <form action="{{route('answer.false' , $answer->id)}}" class="col-12" >
        @csrf
        <input type="hidden" name="task_id" value="{{$task->id}}">
        <button class="btn btn-danger">False</button>
    </form>
</div>

</div>

@endsection

