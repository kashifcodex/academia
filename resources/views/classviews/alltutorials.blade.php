@extends('layouts.header')
@section('content')

<!doctype html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body >


	<!-- form start -->

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List for all Classes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            	<div class="row">
            		<div class="col-sm-6">
            			<div class="dataTables_length" id="example1_length">
            				<label>Show Entries<select name="example1_length" aria-controls="example1" class="form-control input-sm">
            					<option value="10">10</option>
            					<option value="25">25</option>
            					<option value="50">50</option>
            					<option value="100">100</option>
            				</select> 
            			</label>
            			</div>
            		</div>
            		<div class="col-sm-6">
            			<div id="example1_filter" class="dataTables_filter">
            				<label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
            				</label>
            			</div>
            		</div>
            	</div>





              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Class Name</th>
                  <th>Description</th>
                  <th>ID Type</th>
                  <th>Class Year</th>
                 
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1st Year</td>
                  <td>This is first year class.
                  </td>
                  <td>001</td>
                  <td> 2018</td>
                  
                </tr>
                <tr>
                  <td>Matric</td>
                  <td>This is matric class.
                  </td>
                  <td>002</td>
                  <td>2005</td>
                  
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Win 95+</td>
                  <td>5.5</td>
                  
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 6
                  </td>
                  <td>Win 98+</td>
                  <td>6</td>
                
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet Explorer 7</td>
                  <td>Win XP SP2+</td>
                  <td>7</td>
                  
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>AOL browser (AOL desktop)</td>
                  <td>Win XP</td>
                  <td>6</td>
                  
                </tr>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Class Name</th>
                  <th>Description</th>
                  <th>ID Type</th>
                  <th>Class Year</th>
                  
                </tr>

                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
				</div> 
			</div>
		</div>
	</section>


	<!--*************************************************************-->



</body>
</html>
@endsection