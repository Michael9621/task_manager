@include('includes.layouts.head')
<?php use App\Task; ?>


    <!-- Main wrapper  -->
    
       
        <!-- header header  -->
        <div class="header">
            <div class="clearfix">
            <h2 class="float-left p-2"><b>Task Manager</b></h2>
            <h2 class="float-right"><a href="/login" class="btn btn-light">Click to login </a></h2>
          </div>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <!-- End Left Sidebar  -->


        <!-- Page wrapper  -->
        <div class="">
        @if (session('msg'))
      <div class="alert alert-success alert-dismissible" style="width: 20%; margin: auto; ">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
       <p style="color:#333;" class="p-4"><b> {{ session('msg') }} </b></p>
      </div>
      @endif
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30" style="background-color:#5FBBFF; color: #fff;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-briefcase f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <?php// $tasks=Task::count()?>
                                <?php $tasks=count(Task::all())?>
                                    <h2 style="color:#fff;">{{$tasks}}</h2>
                                    <p class="m-b-0" style="color:#fff;">All tasks</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30" style="background-color:#FFB768; color: #fff;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-briefcase f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <?php 
                                $Task2 =count(Task::where('due_date', '>=', date('Y-m-d'))
                                           ->where('status', '<', 100)->get());
                                ?>
                                     <h2 style="color:#fff;">{{$Task2}}</h2>
                                    <p class="m-b-0" style="color:#fff;">Pending tasks</p>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="col-md-3">
                        <div class="card p-30" style="background-color:#FF8B6F; color: #fff;">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-briefcase f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <?php 
                                $Task3 =count(Task::where('due_date', '<', date('Y-m-d'))
                                     ->where('status', '<', 100)->get());
                                ?>
                                     <h2 style="color:#fff;">{{$Task3}}</h2>
                                    <p class="m-b-0" style="color:#fff;">Overdue tasks</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <div class="card p-30" style="background-color:  #9DFF78; color: #fff;" >
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-briefcase f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <?php 
                                 $results =count(Task::where('status', '=', 100)->get());
                                ?>
                                <h2 style="color:#fff;">{{$results}}</h2>
                                <p class="m-b-0" style="color:#fff;">Completed tasks</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="container"><!--start of container-->
               <div class="row">
               <div class="col-md-9">
               <h2>Tasks</h2>
                   <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Job type</th>
                            <th>Client</th>
                            <th>Staff</th>
                            <th>Start date</th>
                            <th>Expected date</th>
                            <th>Due date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                        @if( $tasks>0)
                        <?php $tasks=Task::orderBy('due_date', 'asc')
                              ->paginate(2);
                        ?>
                        @foreach($tasks as $task)
                           <tr>

                                <td>{{$task->job_type}}</td>
                                <td>{{$task->client}}</td>
                                <td>{{$task->staff}}</td>
                                <td>{{$task->start_date}}</td>
                                <td>{{$task->expected_completion_date}}</td>
                                <td>{{$task->due_date}}</td>
                                <!--<td>
                               
                                <form action="/task/{{$task->id}}">
                                    <button type="submit" name="edit" class="btn btn-light"><i class="fa fa-pencil-square-o"></i></button> 
                                 <button type="submit" name="delete" formmethod="POST" class="btn btn-light"><i class="fa fa-trash-o"></i></button>
                                    {{ csrf_field() }}
                                </form>
                                </td>--> 
                            <?php if($task->due_date >= date('Y-m-d')&& $task->status <100){ ?>
                            <td style="background-color: orange; color: white;">Pending</td>
                            <?php } elseif($task->status ==100){?>
                            <td style="background-color:green; color: white;">Completed</td>
                            <?php } elseif($task->due_date < date('Y-m-d') && $task->status < 90){ ?>
                            <td style="background-color:red ; color: white;">Overdue</td>
                            <?php }?>
                    
                                 
                           </tr>
                          @endforeach
                          {{$tasks->links()}} 
                          @else
                            <td><b>No tasks yet<b></td>
                          </tbody> 
                          @endif        
                    </table>
                    
                </div>
                 
                <div class="col-md-3"> 
                    <h2>Completion</h2>
                       <div class="card">
                            <div class="card-body browser m-t-30">
                                <?php $tasks=Task::orderBy('due_date', 'asc')
                                ->paginate(2);
                                 ?>
                                @foreach($tasks as $task)
                                @if($task->status==0)
                                <p class="f-w-600">{{$task->job_type}}-{{$task->client}}<span class="pull-right">{{$task->status}}%</span></p>
                                <div class="progress ">
                                    <div role="progressbar" style="width:0%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only"</span> </div>
                                </div>
                                @elseif($task->status==10)
                                <p class="m-t-10 f-w-600">{{$task->job_type}}-{{$task->client}}<span class="pull-right">{{$task->status}}%</span></p>
                                <div class="progress ">
                                    <div role="progressbar" style="width:10%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only"</span> </div>
                                </div>
                                @elseif($task->status==20)
                                <p class="m-t-10 f-w-600">{{$task->job_type}}-{{$task->client}}<span class="pull-right">{{$task->status}}%</span></p>
                                <div class="progress ">
                                    <div role="progressbar" style="width: 20%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only"</span> </div>
                                </div>
                                @elseif($task->status==30)
                                <p class="m-t-10 f-w-600">{{$task->job_type}}-{{$task->client}}<span class="pull-right">{{$task->status}}%</span></p>
                                <div class="progress ">
                                    <div role="progressbar" style="width: 30%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only"</span> </div>
                                </div>
                                @elseif($task->status==40)
                                <p class="m-t-10 f-w-600">{{$task->job_type}}-{{$task->client}}<span class="pull-right">{{$task->status}}%</span></p>
                                <div class="progress ">
                                    <div role="progressbar" style="width: 40%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only"</span> </div>
                                </div>
                                @elseif($task->status==50)
                                <p class="m-t-10 f-w-600">{{$task->job_type}}-{{$task->client}}<span class="pull-right">{{$task->status}}%</span></p>
                                <div class="progress ">
                                    <div role="progressbar" style="width: 50%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only"</span> </div>
                                </div>
                                @elseif($task->status==60)
                                <p class="m-t-10 f-w-600">{{$task->job_type}}-{{$task->client}}<span class="pull-right">{{$task->status}}%</span></p>
                                <div class="progress ">
                                    <div role="progressbar" style="width: 60%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only"</span> </div>
                                </div>
                                @elseif($task->status==70)
                                <p class="m-t-10 f-w-600">{{$task->job_type}}-{{$task->client}}<span class="pull-right">{{$task->status}}%</span></p>
                                <div class="progress ">
                                    <div role="progressbar" style="width:70%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only"</span> </div>
                                </div>
                                @elseif($task->status==80)
                                <p class="m-t-10 f-w-600">{{$task->job_type}}-{{$task->client}}<span class="pull-right">{{$task->status}}%</span></p>
                                <div class="progress ">
                                    <div role="progressbar" style="width: 80%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only"</span> </div>
                                </div>
                                @elseif($task->status==90)
                                <p class="m-t-10 f-w-600">{{$task->job_type}}-{{$task->client}}<span class="pull-right">{{$task->status}}%</span></p>
                                <div class="progress ">
                                    <div role="progressbar" style="width: 90%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only"</span> </div>
                                </div>
                                @else
                                <p class="m-t-10 f-w-600">{{$task->job_type}}-{{$task->client}}<span class="pull-right">{{$task->status}}%</span></p>
                                <div class="progress ">
                                    <div role="progressbar" style="width: 100%; height:8px;" class="progress-bar bg-danger wow animated progress-animated"> <span class="sr-only"</span> </div>
                                </div>
                                @endif
                                @endforeach
                                
                            </div>
                        </div>
                </div>
                </div> <!--end of the row--> 

            </div><!--end of container-->  
               
        </div>
                    <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
@include('includes.layouts.footer')     