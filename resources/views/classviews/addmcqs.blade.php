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
                  <option selected="selected">Alaska</option>
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
                <label>Select Chapter</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
          	</div>
              <!-- /.form-group -->
              
           
            <!-- /.col -->
          </div>


  <div><br></div>

               				 <div class="form-group">
                				  <label for="mcqsstatement">Mcq's Statement</label>
              					    <textarea class="form-control" rows="3" name="mcqsstatement" placeholder="Enter ..." required="required"></textarea>
              				  </div>
							<div class="form-group">
								<label for="option1">Option 1</label>
								<input type="text" class="form-control" name="option1" placeholder="Option 1" required="required">
							</div>
							<div class="form-group">
								<label for="option2">Option 2</label>
								<input type="text" class="form-control" name="option2" placeholder="Option 2" required="required">
							</div>
							<div class="form-group">
								<label for="option3">Option 3</label>
								<input type="text" class="form-control" name="option3" placeholder="Option 3" required="required">
							</div>
							<div class="form-group">
								<label for="option4">Option 4</label>
								<input type="text" class="form-control" name="option4" placeholder="Option 4" required="required">
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