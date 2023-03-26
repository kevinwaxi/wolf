@extends('layouts.dashboard')
@section('content')
    <div class="row mb-2">
        <a href="{{ route('dashboard.security.users_management.create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create Roles</a>
    </div>
    @foreach ($roles as $role)
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $role->name }}</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink" style="">
                        <div class="dropdown-header">More Actions:</div>
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Details</a>
                        <div class="dropdown-divider"></div>
                        <a class="text-danger dropdown-item" href="#">Delete</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                {{ $role->details }}
            </div>
        </div>
    @endforeach
@endsection
