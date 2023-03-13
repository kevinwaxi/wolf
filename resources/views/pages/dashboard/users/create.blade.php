@extends('layouts.dashboard')
@section('content')
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <form method="post" action="{{ route('dashboard.security.users_management.store') }}">
                @method('post')
                @csrf
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Full Name" value="{{ old('name') }}" required autocomplete="email" autofocus>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email Address" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                            placeholder="Phone Number" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @foreach ($roles as $role)
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="{{ $role->name }}" name="roles">
                            <label class="custom-control-label" for="{{ $role->name }}" value="{{ $role->name }}">
                                {{ $role->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn w-100 btn-success my-4 mb-2">{{ __('Create user') }}</button>
                <a href="{{ route('dashboard.security.users_management.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>
@endsection
