@extends('layouts.user')
@section('center')
<h1 class="text-center">To Me forward </h1>
<div class="container-fluid mt-3">
    <div class="row">
        @forelse ($forwards as $forward )
        <div class="col-sm-4 shadow border border-primary rounded ml-2">
            <span> whom</span>
            <h5 class=" p-2 mb-1">{{$forward->from->name}}</h5>
            <span>Forward Comment</span>
            <h5 class=" p-2 mb-1">{{$forward->forward_comment}}</h5>
            <span>Forward Time</span>
            <h5 class=" p-2 mb-1">{{$forward->created_at}}</h5>
            <span>Task Title </span>
            <h5 class=" p-2 mb-1">{{$forward->task->title}}</h5>
            <span>Task </span>
            <h5 class=" p-2 mb-1">{{$forward->task->content}}</h5>
            <span>Task LifeTime </span>
            <h5 class=" p-2 mb-1">{{$forward->task->lifetime}}</h5>

        </div>
        @empty
        <h2 class="text-center mt-5">To me forward not found</h2>
        @endforelse

    </div>
</div>
@endsection
