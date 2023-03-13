@extends('../layout')

@section('content')
    <div class="container">
        <h1>Profiles</h1>
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
    </div>
@endsection
