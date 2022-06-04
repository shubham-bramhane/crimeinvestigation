@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('admin.cases.index') }}" class="btn btn-primary">
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
                    <div class="card-header">{{ __('Update ' . $case->case_name . ' case') }}</div>
                    <form class="card-body" action="{{ route('admin.cases.update', $case->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="case_name" class="form-label">Enter Case Name:</label>
                            <input type="text" class="form-control" id="case_name" name="case_name"
                                value="{{ $case->case_name }}">
                            @error('case_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes:</label>
                            <textarea class="form-control" id="notes" rows="3" name="notes">{{ $case->notes }}</textarea>
                            @error('notes')
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
