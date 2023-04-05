@extends('layouts.user')
@section('center')
<h1>Sizning Profilingiz</h1>
<form action="{{route('profile.update' , $user->id)}}" class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-4 ">
            <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Name">
        </div>
        <div class="col-sm-4 ">
            <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="email">
        </div>
        <div class="col-sm-4 ">
            <input type="password" name="password" value="{{$user->password}}" class="form-control" placeholder="password">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <input type="text" name="job" value="{{$user->job}}" class="form-control" placeholder="job">
        </div>
        <div class="col-sm-4">
            <input type="number" value="{{$user->age}}" name="age" class="form-control" placeholder="age">
        </div>
        <div class="col-sm-4">
            <input type="submit" class="form-control btn btn-primary" value="submit" >
        </div>
    </div>
</form>
@endsection
