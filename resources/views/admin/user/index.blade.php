@extends('layouts.admin')
@section('center')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Users</h1>
        <p class="mb-4">Bu is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Total :  {{$count}}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row d-flex ">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="dataTable_length">
                                        {{$users->links()}}
                                    </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="dataTable_filter" class="dataTables_filter ">
                                    <label>Search:
                                        <input type="search" name="search"
                                            class="form-control form-control-sm" placeholder=""
                                            aria-controls="dataTable">
                                        </label>
                                        </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending" style="width: 68px;">
                                                Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 84px;">Email</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 55px;">Password</th> --}}
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 31px;">Role</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 31px;">age</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 31px;">Job</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 70px;">created_At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user )
                                        <tr class="even">
                                            <td class="sorting_1">{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            {{-- <td>{{$user->password}}</td> --}}
                                            <td>
                                                @if($user->role == 0)
                                                <a href="#" class="btn btn-primary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-flag"></i>
                                                    </span>
                                                    <span class="text">Admin</span>
                                                </a>
                                                @elseif ($user->role == 1)
                                                <a href="#" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-flag"></i>
                                                    </span>
                                                    <span class="text">User</span>
                                                </a>
                                                @endif
                                            </td>
                                            <td>{{$user->age}}</td>
                                            <td>{{$user->job}}</td>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                                        @empty

                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
