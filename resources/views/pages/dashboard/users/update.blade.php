@extends('layouts.dashboard')
@section('content')
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
            </div>
            <form method="POST" action="{{ route('dashboard.security.users_management.update') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name"
                            value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                            placeholder="Phone Number" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn w-100 btn-success my-4 mb-2">{{ __('Update user') }}</button>
            </form>
        </div>
    </div>
@endsection
