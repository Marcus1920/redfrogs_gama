@extends('app')

@section('content')



<div class="container-fluid">

	<div align="right">
		<a class="btn btn-default" href="/public/personaldetail">View all cases </a>
	</div>

	<h1>New case</h1>
	</br>
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/hometest') }}" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
					<div class="jumbotron">
						<div class="form-group">
							<label class="col-md-4 control-label">First Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="firstname">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Surname</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="surname">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">ID Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="idnumber">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Nationality</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nationality">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Arrest Record</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="arrestrecord">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Crime Type</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="crimetype">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Add Note</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="addnote">
							</div>
						</div>
						</br>
						<div class="form-group">
							<label class="col-md-4 control-label">Upload Picture</label>
							<div class="col-md-6">
								<input type="file" name="imagename" accept="jpg"></input>
							</div>
						</div>
						
						</br>
						
			
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Send Report</button>
							</div>
						</div>
					</div>
	</form>
</div>
@endsection
