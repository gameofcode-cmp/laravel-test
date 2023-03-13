@extends('../layout')

@section('content')
    <div class="container">
        <h1 class="mb-4">Add Profile</h1>
        <form method="post" action="{{ route('profiles.store') }}" class="border border-2 rounded p-4">
            @csrf
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name:</label>
                <input type="text" name="firstname" id="firstname" class="form-control form-control-small">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Surname:</label>
                <input type="text" name="surname" id="surname" class="form-control form-control-small">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control form-control-small">
            </div>
            <div class="form-group">
                <label for="school_id">School:</label>
                <select name="school_id" id="school_id" class="form-control form-control-med">
                    @foreach ($schools as $school)
                        <option value="{{ $school->schoolID }}">{{ $school->Name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Profile</button>
        </form>
    </div>
@endsection
