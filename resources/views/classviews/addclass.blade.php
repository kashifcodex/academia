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

<div class="form-group">
    <form action="/testing/public/insertclass" method="post">
        {{ csrf_field() }}
        <h2  class="text-center text-white bg-black">Class Form</h2>
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Class Name" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="description" placeholder="Description..." required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="typeId" placeholder="ID Type" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="year" placeholder="Class Year" required="required">
        </div>
        <div  class="text-center">
            <button type="submit" class="btn btn-primary btn-lg" >Insert</button>
        </div>

    </form>

</div>
</body>
</html>
@endsection