@extends('layouts.app', ['activePage' => 'upload', 'title' => 'Register Representative', 'navName' => 'Representatives', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="section-image">
        <form action="{{ route('representatives.store') }}" method="POST">
            @csrf
            <label for="school_id">School:</label>
            <select name="school_id" id="school_id" required>
                @foreach ($schools as $school)
                <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach            
            </select>
            <br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="representativeName">Representative Name:</label>
            <input type="text" name="representativeName" id="representativeName" required>
            <br>
            <label for="representativeid">Representative ID:</label>
            <input type="text" name="representativeid" id="representativeid" required>
            <br>
            <button type="submit">Register Representative</button>
        </form>
</div>
</div>
</div>
<div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Representatives</h4>
                            <p class="card-category">Currently Registered Representatives</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Email</th>
                                    <th>Representative Name</th>
                                    <th>Representative ID</th>                                                                      
                                </thead>
                                <body>
                                @if(isset($representatives) && count($representatives) == 0)
                                <p>No Representatives registered</p>
                                @elseif(isset($representatives))                                    
                                    @foreach($representatives as $representative)
                                     <tr>
                                        <td>{{ $representative->email }}</td>
                                        <td>{{ $representative->representativeName }}</td>
                                        <td>{{ $representative->representativeid }}</td>                                        
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