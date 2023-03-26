@extends('layouts.dashboard')
@section('content')
    <div class="row mb-2">
        <a href="{{ route('dashboard.catalogue.devices.create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create Device</a>
    </div>
    <main>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Devices with pending repairs</h4>
                    <p class="card-description">
                        Select device to revil more information
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Brand</th>
                                    <th>Issues</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($devices as $device)
                                    <tr>
                                        <td>
                                            <a href="{{ route('dashboard.catalogue.devices.show', $device) }}">
                                                {{ $device->name }}
                                            </a>
                                        </td>
                                        <td>{{ $device->brand->name }}</td>
                                        <td class="text-danger">
                                            {{ $device->issues_count }} <i class="fa fa-arrow-down"></i>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 0%"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <label class="badge badge-danger">{{ $device->status }}</label>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary">
                                                <a href="{{ route('dashboard.catalogue.issues.create', $device) }}">
                                                    Create issues
                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
