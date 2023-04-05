@extends('layouts.user')
@section('center')
<h3 class="text-center">Forwerd Reason</h3>
<div class="container-fluid mt-4">
    <span> Forwerd Comment </span>
    <div class="shadow bordered py-4 pl-2 mb-2">
        {{$forward->forward_comment}}
    </div>
    <span class="mt-2"> Forwerd Date </span>
    <div class="shadow bordered py-4 pl-2 mb-2">
        {{$forward->created_at}}
    </div>
    <span class="mt-2"> Who </span>

    <div class="shadow bordered py-4 pl-2 mb-2">
        {{$forward->from_id}}
    </div>
    <span class="mt-2"> to Who </span>

    <div class="shadow bordered py-4 pl-2">
        {{$forward->to_id}}
    </div>
</div>
@endsection
