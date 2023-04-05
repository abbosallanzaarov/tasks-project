@extends('layouts.user')
@section('center')
<h3 class="text-center">Forwerd Reason</h3>
<div class="container-fluid mt-4">
    <span> Canceled Task </span>
    <div class="shadow bordered py-4 pl-2 mb-2">
        {{$cancel->task_id}}
    </div>
    <span class="mt-2"> canceled Date </span>
    <div class="shadow bordered py-4 pl-2 mb-2">
        {{$cancel->created_at}}
    </div>
    <span class="mt-2"> Who </span>

    <div class="shadow bordered py-4 pl-2 mb-2">
        {{$cancel->user_id}}
    </div>
</div>
@endsection
