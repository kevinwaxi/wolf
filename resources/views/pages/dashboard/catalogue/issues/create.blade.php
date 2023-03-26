@extends('layouts.dashboard')
@section('content')
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create Issue for this device</h1>
            </div>
            <form method="post" action="{{ route('dashboard.catalogue.issues.store', $device) }}">
                @method('post')
                @csrf
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                            placeholder="Description" autofocus>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name="pricing" class="form-control @error('pricing') is-invalid @enderror"
                            placeholder="Estimate Price" value="{{ old('pricing') }}"autofocus>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="isUrgent" value="1"
                            {{ old('isUrgent') == 1 ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck">Check this if urgent</label>
                        @error('isUrgent')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn w-100 btn-success my-4 mb-2">{{ __('Create Issue') }}</button>
                <a href="{{ route('dashboard.security.users_management.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>
@endsection
