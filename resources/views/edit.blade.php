@extends('layouts.app')
<?php use App\staff; ?>
<?php use App\Task; ?>
<?php use App\Client; ?>
<?php use App\Job; ?>

@section('content')


<div class="container">
<h1>Edit the Task</h1>
    <div class="row">
      <div class="col-sm-4">
			<h3>current</h3>
             <ul class="list-group">
             	<li class="list-group-item">
             	    <h4>job type</h4>
			        {{$task->job_type}}
                </li>
                <li class="list-group-item">
             	    <h4>client</h4>
			        {{$task->client}}
                </li>
                <li class="list-group-item">
             	    <h4>staff</h4>
			        {{$task->staff}}
                </li
             </ul>
	  </div>

	  <div class="col-sm-8">
		<form method="POST" action="/task/{{ $task->id }}">
		<div class="card p-2 m-4">

				<div class="form-group">
				  <select class="form-control" id="sel1" required="" name="job">
				   <option value="" disabled selected>Select job type</option>
				   <?php $jobs=Job::all(); ?>
		            @foreach($jobs as $job)
				    <option>{{$job->name}}</option>
				    @endforeach
				  </select>
				</div>
				<div class="form-group">
				 <select class="form-control" id="sel1" required="" name="client">
				    <?php $clients=Client::all(); ?>
				    <option value="" disabled selected>Select the client </option>
		            @foreach($clients as $client)
				    <option>{{$client->name}}</option>
				    @endforeach
				  </select>
				</div>
				<p>Select staff</p>
				<?php $staffs=Staff::paginate(5); ?>
				<div class="container p-b-10">
				@foreach($staffs as $staff)
					<div class="form-check">
						<label class="form-check-label">
						<input type="checkbox" class="form-check-input" value="{{$staff->name}}" name="staff[]"> {{$staff->name}}
						</label>
					</div>
				@endforeach
				</div> 
		       <?php echo $staffs->links(); ?>
		       
			    <div class="container m-3">
			        <div class="row">
		                <div class="col-xs-4">
					     <label>start date</label>
				            <input type="date" class="form-control" value="{{$task->start_date}}" name="date1">{{$task->date1}}
				        </div>

				        <div class="col-xs-4">
					     <label>Expected completion date</label>
				            <input type="date" class="form-control" value="{{$task->expected_completion_date}}" name="date2">{{$task->date2}}
				        </div>

				        <div class="col-xs-4">
					     <label>Due date</label>
				            <input type="date" class="form-control" value="{{$task->due_date}}" name="date3">{{$task->date3}}
				        </div>


				    </div>
			    </div>

			    <script type="text/javascript">
		           var today = new Date().toISOString().split('T')[0];
		           document.getElementsByName("date1")[0].setAttribute('min', today);
		           document.getElementsByName("date2")[0].setAttribute('min', today);
		           document.getElementsByName("date3")[0].setAttribute('min', today);
		        </script>
		        
			    <button type="submit" class="btn btn-default">
				  <i class="fa fa-save "></i> Edit
				</button>
			</div>

			<!--<div class="form-group">
				<textarea name="description" class="form-control">{{$task->description }}</textarea>	
			</div>


			<div class="form-group">
				<button type="submit" name="update" class="btn btn-primary">Update task</button>
			</div>-->
		{{ csrf_field() }}
		</form>
       </div>
    </div>


</div>

@stop


