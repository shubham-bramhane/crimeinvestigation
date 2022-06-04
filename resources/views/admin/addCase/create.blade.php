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
                    <div class="card-header">{{ __('Add Case') }}</div>
                    <form class="card-body" action="{{ route('admin.cases.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="case_name" class="form-label">Enter Case Name:</label>
                            <input type="text" class="form-control" id="case_name" name="case_name"
                                value="{{ old('case_name') }}">
                            @error('case_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="officer_id" class="form-label">Select Officer Name:</label>
                            <select class="form-control" id="officer_id" name="officer_id" id="">
                                <option value="">Select</option>
                                @foreach ($officers as $officer)
                                    <option value="{{ $officer->id }}" @if (old('officer_id') == $officer->id) selected @endif>
                                        {{ $officer->name }}</option>
                                @endforeach
                            </select>
                            @error('officer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes:</label>
                            <textarea class="form-control" id="notes" rows="3" name="notes">{{ old('notes') }}</textarea>
                            @error('notes')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
