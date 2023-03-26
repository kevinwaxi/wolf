@extends('layouts.dashboard')
@section('content')
<div class="col-lg-12">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Create category</h1>
        </div>
        <form method="post" action="{{ route('dashboard.catalogue.categories.store') }}">
            @method('post')
            @csrf
            <div class="form-group">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Category Name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <textarea type="text" name="details" class="form-control @error('details') is-invalid @enderror"
                        placeholder="Category description">{{Request::old('details')}}</textarea>
                    @error('details')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn w-100 btn-success my-4 mb-2">{{ __('Create Category') }}</button>
            <a href="{{ route('dashboard.catalogue.categories.index') }}" class="btn btn-default">Back</a>
        </form>
    </div>
</div>
@endsection
