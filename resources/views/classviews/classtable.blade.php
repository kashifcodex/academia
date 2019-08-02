@extends('layouts.header')
@section('content')

        <!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="col-lg-10">
        <h2 class="text-center">Display Table Data</h2>
        <br>
        <table id="tabledata" class="table table-striped table-hover table-bordered">
            <tr class="bg-dark text-center text-white">
                <th>Id</th>
                <th>Class Name</th>
                <th>Description</th>
                <th>Type ID</th>
                <th>Year</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach ($degrees as $degree)
                <tr>
                    <td>{{ $degree->id }}</td>
                    <td>{{ $degree->name }}</td>
                    <td>{{ $degree->description }}</td>
                    <td>{{ $degree->typeId }}</td>
                    <td>{{ $degree->year }}</td>
                    <td><button type="button" class="btn btn-primary">Update</button></td>
                    <td><a class="btn btn-danger" href="delete/{{ $degree->id }}" >Delete</a></td>
                </tr>
            @endforeach
        </table>
        <a class="btn btn-success" href="/testing/public/index" >Back to Main Menu</a>
    </div>
</div>

</body>
</html>
@endsection