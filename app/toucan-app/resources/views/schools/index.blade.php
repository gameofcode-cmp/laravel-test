@extends('../layout')

@section('content')
    <div class="container">
        <h1>Schools</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Country</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schools as $school)
                <tr>
                    <td>{{ $school->Name }}</td>
                    <td>{{ $school->Country }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
