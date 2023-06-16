@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mb-2">
            <div class="col-md-12">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('admin.cases.create') }}" class="btn btn-primary">
                        Add Case
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Case Name</th>
                            <th scope="col">Officer Name</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cases as $case)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $case->case_name }}</th>
                                <th>
                                    @foreach ($case->officerNames() as $officer)
                                        {{ $officer->user->name }} <br>
                                    @endforeach
                                </th>
                                <th>{{ $case->notes }}</th>
                                <td class="d-flex justify-content-end" style="gap: 5px">
                                    <a href="{{ route('admin.suspects.index', $case->id) }}"
                                        class="btn btn-secondary mr-2 text-white">Suspects</a>
                                    <a href="{{ route('admin.history.show', $case->id) }}"
                                        class="btn btn-secondary mr-2 text-white">Case History</a>
                                    <a href="{{ route('admin.case-officer.create', $case->id) }}"
                                        class="btn btn-info mr-2 text-white">Add Officer</a>
                                    <a href="{{ route('admin.cases.edit', $case->id) }}"
                                        class="btn btn-warning mr-2 text-white">Edit</a>
                                    <form  id="deleteForm"  action="{{ route('admin.cases.destroy', $case->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('script')

<script>
    document.getElementById('deleteForm').addEventListener('submit', function(event) {
        var confirmed = confirm('Are you sure you want to delete this case?');
        if (!confirmed) {
            event.preventDefault(); // Prevent form submission if not confirmed
        }
    });
</script>


@endsection
