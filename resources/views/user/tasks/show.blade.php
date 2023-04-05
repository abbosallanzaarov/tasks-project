@extends('layouts.user')
@section('center')

<div class="container-fluid">
    <div class="row">
        @forelse ($result as $res )
        <div class="col-sm-4">
            <div class="card mb-4">
                <div class="card-header">
                    <span class="bg-success border rounded text-white">{{$res->status ?? $res->task}}</span>
                    title:
                    {{$res->title ?? 'null'}}
                </div>
                <div class="card ">
                    <span class="ml-3">Kimdan:</span>
                    <b class="ml-3">{{$res->user->name ?? 'null'}}</b>
                </div>
                <div class="card-body">
                    content:
                    {{$res->content ?? 'null'}}
                </div>
                <div class="card-header">
                    muddati:
                    {{$res->lifetime ?? 'null'}}
                </div>
            </div>
        </div>
        @empty
        <h2 class="text-center mt-5">Sizda {{$status}} tasklar yoq</h2>
        @endforelse

    </div>
</div>
@endsection
