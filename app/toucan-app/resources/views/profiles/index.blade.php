@extends('../layout')

@section('content')
    <div class="container">
        <h1>Profiles</h1>
        @if (!request()->has('download'))
        <form method="GET" action="{{ route('profiles.index', ['school_id' => $selectedSchoolId]) }}">
            @csrf
            <input type="hidden" name="schoolId" value="{{ $selectedSchoolId }}">
            <div class="form-group">
                <label for="school_id">Select a school:</label>
                <select class="form-control" id="school_id" name="school_id" onchange="this.form.submit()">
                    <option value="">-- Select a school --</option>
                    @foreach($schools as $school)
                        <option value="{{ $school->schoolID }}" @if($selectedSchoolId == $school->schoolID) selected @endif>{{ $school->Name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        @endif
        <hr>

        <table class="table">
            <thead>
            <tr>
                <th>Firstname</th>
                <th>Surname</th>
            </tr>
            </thead>
            <tbody>
            @foreach($profiles as $profile)
                <tr>
                    <td>{{ $profile->Firstname }}</td>
                    <td>{{ $profile->Surname }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <a href="{{ route('profiles.download.csv') }}" class="btn btn-primary">Download CSV</a>
        </div>
    </div>
@endsection
