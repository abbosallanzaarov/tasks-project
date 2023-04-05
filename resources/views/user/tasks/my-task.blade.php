@extends('layouts.user')
@section('center')
<div class="container-fluid">
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <a href="{{route('sort' , 'New')}}" class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                New Task Title</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$newCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- Earnings (Monthly) Card Example -->
        <a href="{{route('sort' , 'expected')}}" class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               expected Task title</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$exCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{route('sort', 'forwarded')}}" class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               Forwarded Task title</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$forCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        
        <a href="{{route('sort', 'True' )}}" class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                true Task Title</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$trueCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- Earnings (Monthly) Card Example -->
        <a href="{{route('sort' , 'False')}}" class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               False Task title</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$falseCount}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        @forelse ($tasks as $task )
        <div class="col-sm-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{$task->title}}</h6>
                    @if($task->status !== 'forwarded' && $task->status !== 'canceled'  && $task->status !== 'True'  && $task->status !== 'False'  )
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item border rounded border-success bg-success text-white mb-2" href="{{route('forwered' , $task->id)}}">Forwored</a>
                            <a class="dropdown-item border rounded border-primary bg-primary text-white" href="{{route('done.task' ,$task->id)}}">
                                Done</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item border border-danger rounded bg-danger text-white" href="{{route('canceled.task' , $task->id)}}" >Canceled</a>
                        </div>
                    </div>
                    @else

                    @endif
                </div>
                <!-- Card Body -->
                <div class="card-body d-flex justify-content-between">
                    <button type="button" class="btn btn-primary p my-0">
                        {{ $task->user->name }} <span class="badge badge-light"></span>
                        {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                     @if($task->status == 'forwarded')
                     <button type="button" class="btn btn-success my-0">
                        {{ $task->status }} <span class="badge badge-primary"></span>
                        {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                      </button>
                     @endif
                     @if($task->status == 'done')
                     <button type="button" class="btn btn-warning my-0">
                        {{ $task->status }} <span class="badge badge-primary"></span>
                        {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                      </button>
                      @endif
                      @if($task->status == 'expected')
                      <button type="button" class="btn btn-info my-0">
                        <i class="fas fa-info-circle"></i>
                         {{ $task->status }} <span class="badge badge-primary"></span>
                         {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                       </button>
                     @endif
                     @if($task->status == 'False')

                     <button type="button" class="btn btn-danger my-0">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ $task->status }} <span class="badge badge-primary"></span>
                        {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                      </button>
                    @endif
                    @if($task->status == 'True')
                    <button type="button" class="btn btn-info my-0">
                        <i class="fas fa-check"></i>
                       {{ $task->status }} <span class="badge badge-primary"></span>
                       {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                     </button>
                   @endif
                     @if($task->status == 'new')
                     <button type="button" class="btn btn-primary my-0">
                        {{ $task->status }} <span class="badge badge-primary"></span>
                        {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                      </button>
                     @endif
                </div>
                <hr>
                <div class="card-body">
                 {{$task->content}}
                </div>
            </div>
        </div>
        @empty
        <h3>Sizga Task Yoq</h3>
        @endforelse
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        @forelse ($my_forward as $forward )
        <div class="col-sm-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{$forward->task->title}}</h6>
                    @if( $forward->task->status !== 'canceled'  && $forward->task->status !== 'True'  && $forward->task->status !== 'False'  )
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item border rounded border-success bg-success text-white mb-2" href="{{route('forwered' , $forward->task->id)}}">Forwored</a>
                            <a class="dropdown-item border rounded border-primary bg-primary text-white" href="{{route('done.task' ,$forward->task->id)}}">
                                Done</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item border border-danger rounded bg-danger text-white" href="{{route('canceled.task' , $forward->task->id)}}" >Canceled</a>
                        </div>
                    </div>
                    @else

                    @endif
                </div>
                <!-- Card Body -->
                <div class="card-body d-flex justify-content-between">
                    <button type="button" class="btn btn-primary p my-0">
                        {{ $forward->task->user->name }} <span class="badge badge-light"></span>
                        {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                     @if($task->status == 'forwarded')
                     <button type="button" class="btn btn-success my-0">
                        <i class="fas fa-arrow-right"></i>
                        My {{ $forward->task->status }} <span class="badge badge-primary"></span>
                        {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                      </button>
                     @endif
                     @if($forward->task->status == 'done')
                     <button type="button" class="btn btn-warning my-0">
                        {{ $forward->task->status }} <span class="badge badge-primary"></span>
                        {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                      </button>
                      @endif
                      @if($forward->task->status == 'expected')
                      <button type="button" class="btn btn-info my-0">
                        <i class="fas fa-info-circle"></i>
                         {{ $forward->task->status }} <span class="badge badge-primary"></span>
                         {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                       </button>
                     @endif
                     @if($forward->task->status == 'False')

                     <button type="button" class="btn btn-danger my-0">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ $forward->task->status }} <span class="badge badge-primary"></span>
                        {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                      </button>
                    @endif
                    @if($forward->task->status == 'True')
                    <button type="button" class="btn btn-info my-0">
                        <i class="fas fa-check"></i>
                       {{ $forward->task->status }} <span class="badge badge-primary"></span>
                       {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                     </button>
                   @endif
                     @if($forward->task->status == 'new')
                     <button type="button" class="btn btn-primary my-0">
                        {{ $forward->task->status }} <span class="badge badge-primary"></span>
                        {{-- <span class="sr-only">{{ $task->user_id }}</span> --}}
                      </button>
                     @endif
                </div>
                <hr>
                <div class="card-body">
                    <span> Task Content </span>
                 {{$forward->task->content}}
                </div>
            </div>
        </div>
        @empty

        @endforelse
    </div>
</div>

@endsection
