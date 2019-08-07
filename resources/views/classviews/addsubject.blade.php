@extends('layouts.header') 
@section('content')

<!doctype html>
<html lang="en">

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>

<div class="container">

	<h3 align="center">Data Table</h3>
	<br />
	<div align="right">
		<button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="user_table">
			<thead>
			<tr>
				<th width="3%">ID</th>
				<th width="5%">Class Name</th>
				<th width="10%">Description</th>
				<th width="3%">Type Id</th>
				<th width="3%">Year</th>
				<th width="5%">Action</th>
			</tr>
			</thead>
		</table>
	</div>
	<br />
	<br />
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
				<form method="post" id="sample_form" class="form-horizontal">
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
						<label class="control-label col-md-4">Type Id: </label>
						<div class="col-md-8">
							<input type="text" name="typeId" id="typeId" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Year: </label>
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
	$(document).ready(function(){

	$('#user_table').DataTable({
		processing: true,
		serverSide: true,
		ajax:{
		url: 'addsubject',
	},
	columns:[
	{
		data: 'id',
		name: 'id',
	},

	{
		data: 'name',
		name: 'name'
	},
	{
		data: 'description',
		name: 'description'
	},
		{
		data: 'typeId',
		name: 'typeId'
		},

		{
			data: 'year',
			name: 'year'
		},
	{
		data: 'action',
		name: 'action',
		orderable: false
	}
	]

	});

	$('#create_record').click(function(){
		$('.modal-title').text("Add New Record");
		$('#action_button').val("Add");
		$('#action').val("Add");
		$('#formModal').modal('show');
	});

	$('#sample_form').on('submit', function(event) {
		event.preventDefault();

		if ($('#action').val() == 'Add') {

			alert("On Add button click");

			$.ajax({
				url: "{{ route('store') }}",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				dataType: "json",
				success: function(data) {
					var html = '';
					if (data.errors) {
						html = '<div class="alert alert-danger">';
						for (var count = 0; count < data.errors.length; count++)
						{
							html += '<p>' + data.errors[count] + '</p>';
						}
						html += '</div>';
					}
					if (data.success) {
						html = '<div class="alert alert-success">' + data.success + '</div>';
						$('#sample_form')[0].reset();
						$('#user_table').DataTable().ajax.reload();
					}
					$('#form_result').html(html);
				}
			})
		}

		if($('#action').val() == "Edit")
		{
			$.ajax({
				url:'update',
				method:"POST",
				data:new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				dataType:"json",
				success:function(data)
				{
					var html = '';
					if(data.errors)
					{
						html = '<div class="alert alert-danger">';
						for(var count = 0; count < data.errors.length; count++)
						{
							html += '<p>' + data.errors[count] + '</p>';
						}
						html += '</div>';
					}
					if(data.success)
					{
						html = '<div class="alert alert-success">' + data.success + '</div>';
						$('#sample_form')[0].reset();
						$('#store_image').html('');
						$('#user_table').DataTable().ajax.reload();
					}
					$('#form_result').html(html);
				}
			});
		}
	});

	$(document).on('click', '.edit', function(){

		var id = $(this).attr('id');

		alert(id);
		$('#form_result').html('');
		$.ajax({
			url:"/update"+id+"/edit",
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
	});



</script>
	<!--*************************************************************-->
@endsection