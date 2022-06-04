@extends('layouts.userAdmin')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('officer.suspects.show', $suspect->crime_case_id) }}" class="btn btn-primary">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Edit Suspect') }}</div>
                    <form class="card-body" action="{{ route('officer.suspects.update', $suspect->id) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Enter Suspect Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $suspect->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Enter Suspect Mobile Number:</label>
                            <input type="number" class="form-control" id="mobile" name="mobile"
                                value="{{ $suspect->mobile }}">
                            @error('mobile')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Enter Suspect Address:</label>
                            <textarea class="form-control" id="address" rows="3" name="address">{{ $suspect->address }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="relation" class="form-label">Enter Suspect Relation:</label>
                            <input type="text" class="form-control" id="relation" name="relation"
                                value="{{ $suspect->relation }}">
                            @error('relation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes:</label>
                            <textarea class="form-control" id="notes" rows="3" name="notes">{{ $suspect->notes }}</textarea>
                            @error('notes')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="profile_pic" class="form-label">Enter Suspect Picture:</label>
                            <input type="file" class="form-control" id="profile_pic" name="profile_pic"
                                value="{{ old('profile_pic') }}">
                            @error('profile_pic')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
