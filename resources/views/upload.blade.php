<!--@extends('layouts.app', ['activePage' => 'upload', 'title' => 'Upload Excel File', 'navName' => 'Upload File', 'activeButton' => 'laravel'])

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="section-image">
    <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".xlsx, .xls">
        <button type="submit">Upload</button>
    </form>
            </div>
        </div>
</div>
@endsection -->
