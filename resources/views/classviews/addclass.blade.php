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
	<!-- form start -->
	<section class="content">

			<div class="col-md-7" >
				<div class="box box-solid box-info">
					<div class="panel panel-info">
						<div class="panel-heading text-black text-bold">Add Class</div>		</div>

					<form action="/testing/public/insertclass" method="post">
						{{ csrf_field() }}
						<div class="box-body">
							<div class="form-group">
								<label for="name">Class Name</label>
								<input type="text" class="form-control" name="name" placeholder="class.." required="required">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<div class="form-group">
									<textarea class="form-control rounded-0" name="description" placeholder="Description..." required="required" rows="3"></textarea>
								</div>

							</div>
							<div class="form-group">
								<label for="typeId">ID Type</label>
								<input type="text" class="form-control" name="typeId" placeholder="ID" required="required">
							</div>
							<div class="form-group">
								<label for="year">Class Year</label>
								<input type="text" class="form-control" name="year" placeholder="Year" required="required">
							</div>

						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div> 
			</div>
		</div>
	</section>
</body>
</html>
@endsection