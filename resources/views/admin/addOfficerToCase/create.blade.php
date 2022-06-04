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
                    <div class="card-header">{{ __('Add Officer') }}</div>
                    <form class="card-body" action="{{ route('admin.case-officer.store', $id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="officer" class="form-label">Enter Category:</label>
                            <select class="form-control" id="officer" name="officer" id="">
                                <option value="">Select</option>
                                @foreach ($officers as $officer)
                                    <option value="{{ $officer->id }}" {{ old('officer') == $officer->id }}>
                                        {{ $officer->name }}</option>
                                @endforeach
                            </select>
                            @error('officer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Add Officer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
