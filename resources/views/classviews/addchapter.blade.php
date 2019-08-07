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
					
					<form action="/testing/public/insertclass" method="post">
						{{ csrf_field() }}
						<div class="box-body">


<div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Select Class</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">California</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
          	</div>

          	            <div class="col-md-4">
              <div class="form-group">
                <label>Select Subject</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">California</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
          	</div>
          	
          </div>

  <div><br></div>


							<div class="form-group">
								<label for="name">Chapter Name</label>
								<input type="text" class="form-control" name="chapter_name" placeholder="Chapter Name" required="required">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<input type="text" class="form-control" name="chapter_description" placeholder="Chapter Description" required="required">
							</div>
							<div class="form-group">
								<label for="typeId">ID Type</label>
								<input type="text" class="form-control" name="chapter_typeId" placeholder="ID Type" required="required">
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