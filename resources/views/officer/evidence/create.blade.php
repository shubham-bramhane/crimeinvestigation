@extends('layouts.userAdmin')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('officer.evidences.show', $id) }}" class="btn btn-primary">
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
                    <div class="card-header">{{ __('Add Evidence') }}</div>
                    <form class="card-body" action="{{ route('officer.evidences.store', $id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="suspect_id" class="form-label">Select Suspect:</label>
                            <select class="form-control" id="suspect_id" name="suspect_id" id="">
                                <option value="">Select</option>
                                @foreach ($suspects as $suspect)
                                    <option value="{{ $suspect->id }}" @selected(old('suspect_id') == $suspect->id)>
                                        {{ $suspect->name }}</option>
                                @endforeach
                            </select>
                            @error('suspect_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Evidence Type:</label>
                            <select class="form-control" id="type" name="type" id="">
                                <option value="">Select</option>
                                <option value="logical">Logical</option>
                                <option value="physical">Physical</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="evidence" class="form-label">Enter Evidence:</label>
                            <input type="text" class="form-control" id="evidence" name="evidence"
                                value="{{ old('evidence') }}">
                            @error('evidence')
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
                        <div class="mb-3">
                            <label for="points" class="form-label">Points:</label>
                            <select class="form-control" id="points" name="points" id="points">
                                <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                            @error('points')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Enter Evidence Picture:</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                            @error('image')
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
