
<?php use App\staff; ?>
<?php use App\Task; ?>
<?php use App\Client; ?>
<?php use App\Job; ?>
<style type="text/css">
	.panel{
		width: 50%;
		margin:auto;
	}
	.btn{
		float: right;
	}
	.task{
		text-align:center;
		padding: 1em;
	}
	.col-xs-4{
		padding:3px;
	}
</style>

<h2 class="task">Create a Task</h2>
<form method="POST" action="/task">
	<div class="panel panel-default">	
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
       
	    <div class="container p-10">
	        <div class="row">
                <div class="col-xs-4">
			     <label>start date</label>
		            <input type="date" class="form-control" name="date1" required="">
		        </div>

		        <div class="col-xs-4">
			     <label>Expected completion date</label>
		            <input type="date" class="form-control" name="date2" required="">
		        </div>

		        <div class="col-xs-4">
			     <label>Due date</label>
		            <input type="date" class="form-control" name="date3" required="">
		        </div>


		    </div>
	    </div>

	    <script type="text/javascript">
           var today = new Date().toISOString().split('T')[0];
           document.getElementsByName("date1")[0].setAttribute('min', today);
           document.getElementsByName("date2")[0].setAttribute('min', today);
           document.getElementsByName("date3")[0].setAttribute('min', today);
        </script>
        
	    <button type="submit" class="btn btn-primary">
		  <i class="fa fa-save "></i> Save
		</button>
	</div>
	{{ csrf_field() }}
</form>
