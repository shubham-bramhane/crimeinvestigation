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
                    <div class="card-header">{{ __('Add Result') }}</div>
                    <form class="card-body" action="{{ route('admin.result.store', $case->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="suspect_id" class="form-label">Suspect Name:</label>
                            <select class="form-control" id="suspect_id" name="suspect_id" id="">
                                <option value="">Select</option>
                                @foreach ($case->suspects as $suspect)
                                    <option value="{{ $suspect->id }}" @selected(old('suspect_id') == $suspect->id)>
                                        {{ $suspect->name }}</option>
                                @endforeach
                            </select>
                            @error('suspect_id')
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
                        <button class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
