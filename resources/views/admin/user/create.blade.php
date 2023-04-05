@extends('layouts.admin')
@section('center')
<div class="row">
    <h3 class=" col-sm-6">Add User</h3>

<span class="ml-2 text-primary mb-2">When creating a user, enter the information correctly and accurately</span>
<span class="col-lg-6">
    @if($message = Session::get('success'))
    <div class=" mb-4">
        <div class="card bg-success text-white shadow">
            <div class="card-body">
             {{$message}}
                {{-- <div class="text-white-50 small">#1cc88a</div> --}}
            </div>
        </div>
    </div>
    @endif
</span>
</div>
<div class="container-fluid">
<form action="{{route('user.add' )}}" method="post" class="container">
    @csrf
    <div class="row mb-2">
        <div class="col-sm-4">
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="col-sm-4">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="col-sm-4">
            <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <input type="number" value="{{ old('age') }}" name="age" class="form-control @error('age') is-invalid @enderror" placeholder="Age">
            @error('age')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="col-sm-4">
            <input type="text" value="{{ old('job') }}" name="job" class="form-control @error('job') is-invalid @enderror" placeholder="job">
            @error('job')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="col-sm-4">
            <select name="role" value="{{ old('role') }}" id="" class="form-control @error('role') is-invalid @enderror">
                <option >Select a role</option>
                <option value="0" >Admin</option>
                <option value="1" >Worker</option>
            </select>
            @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>

    </div>
    <div class="col-sm-4 mt-3 ">
        <button type="submit" class="btn btn-primary px-5 bordered shadow">Submit</button>
     </div>
</form>
</div>
@endsection
