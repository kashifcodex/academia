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
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Quick Example</h3>
					</div>
					<form action="/testing/public/insertclass" method="post">
						{{ csrf_field() }}
						<div class="box-body">
							<div class="form-group">
								<label for="name">Subject Name</label>
								<input type="text" class="form-control" name="subject_name" placeholder="Subject Name" required="required">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<input type="text" class="form-control" name="subject_description" placeholder="Subject Description" required="required">
							</div>
							<div class="form-group">
								<label for="typeId">ID Type</label>
								<input type="text" class="form-control" name="subject_typeId" placeholder="ID Type" required="required">
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


	<!--*************************************************************-->



</body>
</html>
@endsection