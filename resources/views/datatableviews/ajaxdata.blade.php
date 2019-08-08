@extends('layouts.header')
@section('content')

        <!DOCTYPE html>
<html>
<head>
    <title>Data table </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.css')}}">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container" >
    <h3 align="center">Data Table of Classes</h3>
    <div class="col-md-offset-10">
        <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Add New Class</button>
    </div>
    <br />
    <table id="student_table" class="table table-bordered table-hover table-striped" style="width: 95%;">
        <thead>
        <tr>
            <th width="3%">ID</th>
            <th width="13%">Class Name</th>
            <th width="20%">Description</th>
            <th width="8%">Type Id</th>
            <th width="8%">Year</th>
            <th width="10%">Action</th>
        </tr>
        </thead>
    </table>
</div>

<div id="studentModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="student_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Data</h4>
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                    <div class="form-group">
                        <label>Class Name</label>
                        <input type="text" name="name" id="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" id="description" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Type Id</label>
                        <input type="text" name="typeId" id="typeId" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" name="year" id="year" class="form-control" />
                    </div>
                </div>


                <div class="modal-footer">
                    <input type="hidden" name="student_id" id="student_id" value="" />
                    <input type="hidden" name="button_action" id="button_action" value="insert" />
                    <input type="submit" name="submit" id="action" value="Add" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#student_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('ajaxdata.getdata') }}",
            "columns":[
                { "data": "id" },
                { "data": "name" },
                { "data": "description" },
                { "data": "typeId" },
                { "data": "year" },
                { "data": "action", orderable:false, searchable: false}
            ]
        });

        $('#add_data').click(function(){
            $('#studentModal').modal('show');
            $('#student_form')[0].reset();
            $('#form_output').html('');
            $('#button_action').val('insert');
            $('#action').val('Add');
            $('.modal-title').text('Add Data');
        });

        $('#student_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url:"{{ route('ajaxdata.postdata') }}",
                method:"POST",
                data:form_data,
                dataType:"json",
                success:function(data)
                {
                    if(data.error.length > 0)
                    {
                        var error_html = '';
                        for(var count = 0; count < data.error.length; count++)
                        {
                            error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                        }
                        $('#form_output').html(error_html);
                    }
                    else
                    {
                        $('#form_output').html(data.success);
                        $('#student_form')[0].reset();
                        $('#action').val('Add');
                        $('.modal-title').text('Add Data');
                        $('#button_action').val('insert');
                        $('#student_table').DataTable().ajax.reload();
                    }
                }
            })
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr("id");
            $('#form_output').html('');
            $.ajax({
                url:"{{route('ajaxdata.fetchdata')}}",
                method:'get',
                data:{id:id},
                dataType:'json',
                success:function(data)
                {
                    $('#name').val(data.name);
                    $('#description').val(data.description);
                    $('#typeId').val(data.typeId);
                    $('#year').val(data.year);
                    $('#student_id').val(id);
                    $('#studentModal').modal('show');
                    $('#action').val('Edit');
                    $('.modal-title').text('Edit Data');
                    $('#button_action').val('update');
                }
            })
        });
        $(document).on('click', '.delete', function(){
            var id = $(this).attr('id');
            if(confirm("Are you sure you want to Delete this data?"))
            {
                $.ajax({
                    url:"{{route('ajaxdata.removedata')}}",
                    mehtod:"get",
                    data:{id:id},
                    success:function(data)
                    {
                        alert(data);
                        $('#student_table').DataTable().ajax.reload();
                    }
                })
            }
            else
            {
                return false;
            }
        });
    });
</script>
</body>
</html>
@endsection