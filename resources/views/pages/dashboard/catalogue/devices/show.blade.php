@extends('layouts.dashboard')
@section('content')
    <div class="row flex-grow">
        <div class="col-md-6 col-lg-4 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body card-rounded">
                    <h4 class="card-title  card-title-dash">Device information</h4>
                    <div class="list align-items-center border-bottom py-2">
                        <div class="wrapper w-100">
                            <p class="mb-2 font-weight-medium">
                                Brand
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-calendar text-muted me-1"></i>
                                    <p class="mb-0 text-small text-muted">{{ $device->brand->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list align-items-center border-bottom py-2">
                        <div class="wrapper w-100">
                            <p class="mb-2 font-weight-medium">
                                Device name
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-calendar text-muted me-1"></i>
                                    <p class="mb-0 text-small text-muted">{{ $device->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list align-items-center border-bottom py-2">
                        <div class="wrapper w-100">
                            <p class="mb-2 font-weight-medium">
                                Device Owner
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="align-items text-black-50 ">
                                    <i class="mdi mdi-calendar text-muted me-1"></i>
                                    <p class="mb-0 text-small text-muted">{{ $device->user->name }}</p>
                                    <p class="mb-0 text-small text-muted">{{ $device->user->email }}</p>
                                    <p class="mb-0 text-small text-muted">{{ $device->user->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list align-items-center border-bottom py-2">
                        <div class="wrapper w-100">
                            <p class="mb-2 font-weight-medium">
                                Create on
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-calendar text-muted me-1"></i>
                                    <p class="mb-0 text-small text-muted">{{ $device->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="list align-items-center pt-3">
                        <div class="wrapper w-100">
                            <p class="mb-0">
                                <a href="#" class="fw-bold text-primary">Show all <i
                                        class="mdi mdi-arrow-right ms-2"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-8 grid-margin stretch-card">
            <div class="card card-rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h4 class="card-title card-title-dash">Issues</h4>
                        <p class="mb-0">Pending issues ({{ $device->issues->count() }})</p>
                    </div>
                    <ul class="bullet-line-list">
                        @foreach ($device->issues as $issue)
                            <li>
                                <div class="d-flex justify-content-between border-bottom-info py-2">
                                    <div>
                                        {{ $issue->description }} - Kes{{ $issue->pricing }}/=
                                    </div>
                                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Issue
                                        Fixed</button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
