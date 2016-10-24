@extends('app')

@section('content')

<script>
    function ConfirmDelete()
    {
      var x = confirm("Are you sure you want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>

<div><h1>Success!!!</h1></div>

@if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                List of all cases
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <tr>
                        <th>Case ID</th>
						<th>First Name</th>
						<th>Surname</th>
						<th>ID Number</th>
						<th>Nationality</th>
						<th>Arrest Record</th>
						<th>Crime Type</th>
						<th>Add Note</th>
						<th>Date created</th>
						<th>Date updated</th>
                        <!--<th>&nbsp;</th> -->
                    </tr>

                    <!-- Table Body -->
					
                    <tbody>
                        @foreach ($tasks as $task)
						
                            <tr>

                                <!-- Task Name -->
                                <td class="table-text"><div><a href="/public/welcome">{{ $task->id }} </a></div></td>
								<td class="table-text"><div>{{ $task->FIRST_NAME }}</div></td>
								<td class="table-text"><div>{{ $task->SURNAME }}</div></td>
								<td class="table-text"><div>{{ $task->ID_NUMBER }}</div></td>
								<td class="table-text"><div>{{ $task->NATIONALITY }}</div></td>
								<td class="table-text"><div>{{ $task->CRIME_TYPE }}</div></td>
								<td class="table-text"><div>{{ $task->ARREST_RECORD }}</div></td>
								<td class="table-text"><div>{{ $task->ADD_NOTE }}</div></td>
								<td class="table-text"><div>{{ $task->created_at }}</div></td>
								<td class="table-text"><div>{{ $task->updated_at }}</div></td>

                                <!-- View Button -->
								<td>
									<form action="/public/casedetail/{{ $task->id }}" method="GET">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">

										<button>View Case</button>
									</form>
								</td>
								
								<!-- Delete Button -->
								<td>
									<form action="/public/personaldetail/{{ $task->id }}" method="POST">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										
										<button class="btn btn-xs btn-danger" type="submit" Onclick="ConfirmDelete()" value="1">
											<i class="glyphicon glyphicon-trash"></i>Delete Case
										</button>
										
									</form>
								<td>
								
								

                            </tr>
                        @endforeach
                    </tbody>
					
                </table>
            </div>
        </div>
    @endif

@endsection