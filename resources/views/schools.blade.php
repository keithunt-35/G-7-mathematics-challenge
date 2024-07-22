@extends('layouts.app', ['activePage' => 'upload', 'title' => 'Add School', 'navName' => 'Schools', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="section-image">
            <form action="{{ route('Schools.store') }}" method="POST">
            @csrf
            <label for="name">School Name:</label>
            <input type="text" name="name" id="name" required>
            <br>
            <label for="district">District:</label>
            <input type="text" name="district" id="district" required>
            <br>
            <label for="registration_number">Registration Number:</label>
            <input type="text" name="registration_number" id="registration_number" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="representativeName">Representative Name:</label>
            <input type="text" name="representativeName" id="representativeName" required>
            <br>
            <label for="schoolId">School ID:</label>
            <input type="integer" name="schoolId" id="schoolId" required>
            <br>
            <button type="submit">Add School</button>
        </form>
</div>
</div>
</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Schools</h4>
                            <p class="card-category">Currently uploaded schools</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>School Name</th>
                                    <th>District</th>
                                    <th>Registration Number</th>
                                    <th>Email</th>
                                    <th>Representative Name</th>
                                    <th>School ID</th>
                                </thead>
                                <body>
                                    @if($schools->isEmpty())
                                    <p>No Schools found</p>
                                    @else
                                    @foreach($schools as $school)
                                     <tr>
                                        <td>{{ $school->name }}</td>
                                        <td>{{ $school->district }}</td>
                                        <td>{{ $school->registration_number }}</td>
                                        <td>{{ $school->email }}</td>
                                        <td>{{ $school->representativeName }}</td>
                                        <td>{{ $school->schoolId }}</td>
                                     </tr>
                                     @endforeach
                                     @endif
                                </body>
</table>
</div>
</div>
</div>
</div>
@endsection