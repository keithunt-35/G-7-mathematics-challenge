@extends('layouts.app', ['activePage' => 'upload', 'title' => 'Current Participants', 'navName' => 'Participants', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="section-image">
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Participants</h4>
                            <p class="card-category">These are the registered participants</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>School ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>Participant ID</th>
                                    <th>Username</th>
                                    <th>Password</th>                                    
                                </thead>
                                <body>
                                    @if($participants->isEmpty())
                                    <p>No Participants registered yet</p>
                                    @else
                                    @foreach($participants as $participant)
                                     <tr>
                                        <td>{{ $participant->schoolId }}</td>
                                        <td>{{ $participant->firstName }}</td>
                                        <td>{{ $participant->lastName }}</td>
                                        <td>{{ $participant->email }}</td>
                                        <td>{{ $participant->dateOfBirth }}</td>
                                        <td>{{ $participant->participantId }}</td>
                                        <td>{{ $participant->username }}</td>
                                        <td>{{ $participant->password }}</td>
                                     </tr>
                                     @endforeach
                                     @endif
                                </body>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection