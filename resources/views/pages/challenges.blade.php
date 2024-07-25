@extends('layouts.app', ['activePage' => 'table', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Challenges', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
        <div class="section-image">
            <form action="{{ route('challenges.store') }}" method="POST">
            @csrf
            <label for="name">Challenge Name:</label>
            <input type="text" name="name" id="name" required>
            <br>
            <label for="challengeId">Challenge ID:</label>
            <input type="integer" name="challengeId" id="challengeId" required>
            <br>
            <label for="startDate">Start Date:</label>
            <input type="date" name="startDate" id="startDate" required>
            <br>
            <label for="endDate">End Date:</label>
            <input type="date" name="endDate" id="endDate" required>
            <br>
            <label for="duration">Duration:</label>
            <input type="integer" name="duration" id="duration" required>
            <br>
            <label for="noOfQuestions">Number Of Questions:</label>
            <input type="integer" name="noOfQuestions" id="noOfQuestions" required>
            <br>
            <button type="submit">Upload Challenge</button>


            <!--<div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <h4 class="card-title">Upload Challenges</h4>
                            <p class="card-category">Below are the Challenges</p> 
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Challenge</th>
                                    <th>Duration</th>
                                    <th>noOfQuestions</th>
                                    <th>startDate</th>
                                    <th>endDate</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Algebra</td>
                                        <td>3hours</td>
                                        <td>50</td>
                                        <td>01-01-2024</td>
                                        <td>03-01-2024<td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Calculus</td>
                                        <td>3hours</td>
                                        <td>50</td>
                                        <td>05-02-2024</td>
                                        <td>07-02-2024</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Vectors</td>
                                        <td>1hour</td>
                                        <td>10</td>
                                        <td>10-02-2024</td>
                                        <td>10-02-2024</td>
                                        <td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Shapes</td>
                                        <td>1hour</td>
                                        <td>10</td>
                                        <td>05-03-2024</td>
                                        <td>05-03-2024</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Area, Perimeter and Volume</td>
                                        <td>2hours</td>
                                        <td>25</td>
                                        <td>10-01-2024</td>
                                        <td>11-01-2024</td>
                                    </tr>                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
                
<br>
<br>
<div class="section-image">
<form action="{{ route('upload.questions') }}" method="POST" enctype="multipart/form-data">
@csrf
    <div>
        <label for="questions_file">Upload Questions Excel file:</label>
        <input type="file" name="questions_file" accept=".xlsx" required>
    </div>
    <div>
        <label for="answers_file">Upload Answers Excel file:</label>
        <input type="file" name="answers_file" accept=".xlsx" required>
    </div>
    <button type="submit">Upload Files</button>







    <!--</form>
            </div>
        </div>
                <div class="col-md-12">
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">Algebra</h4>
                            <p class="card-category">Below are the best students in Algebra</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Challenge</th>
                                    <th>Total</th>
                                    <th>Mark</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>11</td>
                                        <td>Thomas Jones</td>
                                        <td>Algebra</td>
                                        <td>40/50</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>21</td>
                                        <td>Grace Murungi</td>
                                        <td>Algebra</td>
                                        <td>30/50</td>
                                        <td>60%</td>
                                    </tr>                                 
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">Calculus</h4>
                            <p class="card-category">Best Students in Calculus</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Challenge</th>
                                    <th>Total</th>
                                    <th>Mark</th>
                                </thead>
                                <tbody>
                                <tr>
                                        <td>31</td>
                                        <td>Tom Brady</td>
                                        <td>Calculus</td>
                                        <td>45/50</td>
                                        <td>90%</td>
                                    </tr>                                    
                                    <tr>
                                        <td>41</td>
                                        <td>Josephine Nakato</td>
                                        <td>Calculus</td>
                                        <td>40/50</td>
                                        <td>80%</td>
                                    </tr>                                
                                </tbody>
                            </table>
                        </div>
                <div class="col-md-12">
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">Vectors</h4>
                            <p class="card-category">Best Students in Vectors</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Challenge</th>
                                    <th>Total</th>
                                    <th>Mark</th>
                                </thead>
                                <tbody>
                                <tr>
                                        <td>51</td>
                                        <td>Brandon Miller</td>
                                        <td>Vectors</td>
                                        <td>9/10</td>
                                        <td>90%</td>
                                    </tr>                                    
                                    <tr>
                                        <td>61</td>
                                        <td>Molly Anne</td>
                                        <td>Vectors</td>
                                        <td>9/10</td>
                                        <td>90%</td>
                                    </tr>                                
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">Shapes</h4>
                            <p class="card-category">Best Students in Shapes</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Challenge</th>
                                    <th>Total</th>
                                    <th>Mark</th>
                                </thead>
                                <tbody>
                                <tr>
                                        <td>71</td>
                                        <td>Mike Brown</td>
                                        <td>Shapes</td>
                                        <td>10/10</td>
                                        <td>100%</td>
                                    </tr>                                    
                                    <tr>
                                        <td>81</td>
                                        <td>Liz Natukunda</td>
                                        <td>Shapes</td>
                                        <td>9/10</td>
                                        <td>90%</td>
                                    </tr>                                
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                    <div class="card card-plain table-plain-bg">
                        <div class="card-header ">
                            <h4 class="card-title">Area, Perimeter and Volume</h4>
                            <p class="card-category">Best Students in Area, Perimeter and Volume.</p>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Challenge</th>
                                    <th>Total</th>
                                    <th>Mark</th>
                                </thead>
                                <tbody>
                                <tr>
                                        <td>91</td>
                                        <td>Paul George</td>
                                        <td>Area,Perimeter and Volume</td>
                                        <td>25/25</td>
                                        <td>100%</td>
                                    </tr>                                    
                                    <tr>
                                        <td>01</td>
                                        <td>Curtis Jones</td>
                                        <td>Area, Perimeter and Volume</td>
                                        <td>20/25</td>
                                        <td>80%</td>
                                    </tr>                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection