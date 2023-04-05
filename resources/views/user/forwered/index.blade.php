@extends('layouts.user')
@section('center')

<div class="container-fluid">
    <form action="{{ route('forwardTasks',$id) }}" class="row">
        <input type="text" name="forward_comment" id="" placeholder="Forward Comment" class="form-control p-2 m-2">
        <select name="to_user" id="" class="form-control p-2 m-2" >
            <option value="">to whom</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <button class="btn btn-success outline m-2">Forward</button>
    </form>
</div>
@endsection
