@extends('layouts.user')
@section('center')
    <div class="d-flex justify-content-center ml-5 mb-2">
        <div>
            <h4>Add Task</h4>
        </div>
    </div>

    <div class="container-fluid">
        <form action="{{ route('task.add') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <select name="from_id" class="form-control" id="">
                        <option>task to whom</option>
                        @forelse ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ||
                                @if ($user->job == null)
                                    not written
                                @else
                                    {{ $user->job }}
                                @endif

                            </option>
                        @empty
                            <option>Users Not found</option>
                        @endforelse
                    </select>
                    @error('from_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    <div>
                        <input type="date" value="{{old('lifetime')}}" name="lifetime" class="form-control mt-2" placeholder="lifetime">
                        <b class="">lifeTime (Muddati)</b>
                        @error('lifetime')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div>
                        <input type="time" value="{{old('time')}}" name="time" class="form-control mt-2" placeholder="lifetime">
                        <b class="">lifeTime (Muddati)</b>
                    </div>
                    @error('time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="col-sm-4">
                    <input type="text" value="{{old('title')}}" name="title" class="form-control" placeholder="title">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    <input type="hidden" name="status" value="new" class="form-control" placeholder="title">
                    <button type="submit" class="btn btn-primary bordered shadow mt-2  px-5">Submit</button>
                    @if ($msg = Session::get('success'))
                        <div class="card bg-primary text-white shadow mt-5">
                            <div class="card-body ">
                                {{ $msg }}
                                <div class="text-white-50 small">#4e73df</div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-sm-4">
                    <textarea name="content" value={{old('content')}} id="" cols="30" rows="10" class="form-control" placeholder="tasks"></textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>
        </form>

    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            @forelse ($tasks as $task )
            <div class="col-sm-4 border border-primary m-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{$task->title}}</h6>
                    <div class="dropdown no-arrow">
                                @if($task->status == 'forwarded')
                                <a href="{{route('forwered.show' , $task->id)}}" class="btn btn-success">forwarded</a>
                                @elseif($task->status == 'new')
                                <button class="btn btn-primary">New</button>
                                @elseif($task->status == 'canceled')
                                <a href="{{route('task.canceled', $task->id)}}" class="btn btn-danger">Canceled</a>
                                @elseif($task->status == 'expected')
                                <a href="{{route('answer.show', $task->id)}}" class="btn btn-info">answer </a>
                                @elseif($task->status == 'done')
                                <a href="{{route('task.canceled', $task->id)}}" class="btn btn-primary">done    </a>
                                @endif

                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                         <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink" style="">
                            <div class="dropdown-header">From</div>
                            <a class="dropdown-item" href="#">From: {{$task->from->name}}</a>
                            <a class="dropdown-item" href="#">LifeTime: {{$task->lifetime}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Update</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  {{$task->content}}
                </div>
            </div>
            @empty
            <h3 class="text-center text-danger">You are not task</h3>
            @endforelse

        </div>
    </div>
@endsection
