@extends('layouts.header')
@section('content')

        <!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="col-lg-10">
        <h2 class="text-center">Class Table Data</h2>
        <br>
        <table id="user_table" class="table table-striped table-hover table-bordered">
            <tr class="bg-aqua text-black">

                <th class="text-center">Id</th>
                <th class="text-center">Class Name</th>
                <th class="text-center">Description</th>
                <th class="text-center">Type ID</th>
                <th class="text-center">Year</th>
                <th class="text-center">Update</th>
                <th class="text-center">Delete</th>
            </tr>
            @foreach ($degrees as $degree)
                <tr class="text-center">
                    <td>{{ $degree->id }}</td>
                    <td>{{ $degree->name }}</td>
                    <td>{{ $degree->description }}</td>
                    <td>{{ $degree->typeId }}</td>
                    <td>{{ $degree->year }}</td>
                    <td><span><button type="button" class="btn btn-primary"> Update</button></span></td>
                    <td><a class="btn btn-danger" href="delete/{{ $degree->id }}" >Delete</a></td>
                </tr>
            @endforeach
        </table>
        <a class="btn btn-success" href="/testing/public/index" ><span class="glyphicon glyphicon-arrow-left"></span>  Back to Main Menu</a>
    </div>
</div>

</body>
</html>

<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Record</h4>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-4" >Class Name: </label>
                        <div class="col-md-8">
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Description: </label>
                        <div class="col-md-8">
                            <input type="text" name="description" id="description" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" >Type ID:</label>
                        <div class="col-md-8">
                            <input type="text" name="typeId" id="typeId" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" >Year: </label>
                        <div class="col-md-8">
                            <input type="text" name="year" id="year" class="form-control" />
                        </div>
                    </div>

                    <br />
                    <div class="form-group" align="center">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        $('#form_result').html('');
        $.ajax({
            url:"/classtable"+ida,
            dataType:"json",
            success:function(html){
                $('#name').val(html.data.name);
                $('#description').val(html.data.description);
                $('#typeId').val(html.data.typeId);
                $('#year').val(html.data.year);

                $('#hidden_id').val(html.data.id);
                $('.modal-title').text("Edit New Record");
                $('#action_button').val("Edit");
                $('#action').val("Edit");
                $('#formModal').modal('show');
            }
        })
    });

</script>
@endsection