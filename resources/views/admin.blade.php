@include('includes.layouts.head')


<?php use App\User; ?>
<?php use App\staff; ?>
<?php use App\Task; ?>
<?php use App\Client; ?>
<?php use App\Job; ?>
@if (Auth::check())
    <!-- Main wrapper  -->
   @if (auth()->user()->verified()) 
    <div id="main-wrapper">
       
        <!-- header header  -->
        <div class="header">
            @include('includes.header')
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
           @include('includes.sidebar_admin')
        </div>
        <!-- End Left Sidebar  -->


        <!-- Page wrapper  -->
        <div class="page-wrapper">
           
       @if (session('status'))
      <div class="alert alert-danger alert-dismissible" style="width: 20%; margin: auto; ">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p style="color: #333;" class="p-4">{{ session('status') }}</p>
      </div>
      @endif

      @if (session('msg'))
      <div class="alert alert-success alert-dismissible" style="width: 20%; margin: auto; ">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
       <p style="color:#333;" class="p-4"><b> {{ session('msg') }} </b></p>
      </div>
      @endif
          <!--dashboard cards-->  
          <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card p-30" style="background-color:#ff9999; color: #fff;">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-briefcase f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                            <?php $tasks=Task::count()?>
                                <h2 style="color:#fff;">{{$tasks}}</h2>
                                <p class="m-b-0" style="color:#fff;"> All tasks</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30" style="background-color: #b3b3ff; color: #fff;">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-user f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                            <?php $staff=staff::count()?>
                                <h2 style="color:#fff;">{{$staff}}</h2>
                                <p class="m-b-0" style="color:#fff;">Staff</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-2.4">
                    <div class="card p-30" style="background-color: #d9ff66; color: #fff;">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-user f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                            <?php //$users=User::count()?>
                                <h2 style="color:#fff;">{{}}</h2>
                                <p class="m-b-0" style="color:#fff;">Users</p>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="col-md-3">
                    <div class="card p-30" style="background-color: #ffb366; color: #fff;">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-user f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                            <?php $clients=Client::count()?>
                                <h2 style="color:#fff;">{{$clients}}</h2>
                                <p class="m-b-0" style="color:#fff;">Clients</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-30" style="background-color:#80bfff; color: #fff;">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-user f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                            <?php $jobs=Job::count()?>
                                <h2 style="color:#fff;">{{$jobs}}</h2>
                                <p class="m-b-0" style="color:#fff;">Job type</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <!--end of dashboard--> 
          <!--users tables-->
          <div class="container m-3">  
                <h2>Users</h2>            
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined</th>
                      </tr>
                    </thead>
                    <?php $users=User::paginate(10); ?>
                    @foreach($users as $user)
                    <tbody>
                      <tr>
                        <td>{{$user->name}}</td> 
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>  
                      </tr>
                    </tbody>@endforeach
                  </table>
                  {{$users->links()}} 
              </div>
              <div class="container">
                <h2>Tasks</h2>            
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Posted by</th>
                        <th>Job type</th>
                        <th>Client</th>
                        <th>Staff</th>
                        <th>Start date</th>
                        <th>Expected completion date</th>
                        <th>Due date</th>
                        <th>Edit/Delete</th>
                        <th>Manage tasks</th>
                      </tr>
                    </thead>
                    <?php $tasks=Task::paginate(10);?>
                    @foreach($tasks as $task)
                    <tbody>
                      <tr>
                      <td>{{$task->user->name}}</td>
                      <td>{{$task->job_type}}</td>
                      <td>{{$task->client}}</td>
                      <td>{{$task->staff}}</td>
                      <td>{{$task->start_date}}</td>
                      <td>{{$task->expected_completion_date}}</td>
                      <td>{{$task->due_date}}</td>
 
                        
                        <td>
                                   
                              <form action="/task/{{$task->id}}">
                               <button type="submit" name="edit" class="btn btn-light"><i class="fa fa-pencil-square-o"></i></button> 
                               <button type="submit" name="delete" formmethod="POST" class="btn btn-light"><i class="fa fa-trash-o"></i></button>
                                  {{ csrf_field() }}
                              </form>
                        </td> 
                          <td>
                                 
                              <form action="/status/{{$task->id}}">
                               <button type="submit" name="manage" class="btn btn-light"><i class="fa fa-pencil-square-o"></i>manage</button> 
                                  {{ csrf_field() }}
                              </form>
                            
                        </td>
                      </tr>
                    </tbody>@endforeach
                  </table>
                {{$tasks->links()}} 
          </div>

          <!--job,staff,client table-->
            <div class="container">
              <div class="row">
                <div class="col-xs-6 m-2">
                  <h2>Staff</h2>            
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Joined</th>
                        <th>Edit/Delete</th>
                      </tr>
                    </thead>
                    <?php $staffs=staff::paginate(5); ?>
                    @foreach($staffs as $staff)
                    <tbody>
                      <tr>
                        <td>{{$staff->name}}</td> 
                        <td>{{$staff->created_at}}</td> 
                        <td>
                                   
                              <form action="/staff/{{$staff->id}}">
                               <button type="submit" name="edit" class="btn btn-light"><i class="fa fa-pencil-square-o"></i></button> 
                               <button type="submit" name="delete" formmethod="POST" class="btn btn-light"><i class="fa fa-trash-o"></i></button>
                                  {{ csrf_field() }}
                              </form>
                        </td>  
                      </tr>
                    </tbody>@endforeach
                  </table>
                  {{$staffs->links()}} 
                </div>

                <div class="col-xs-6 m-2">
                  <h2>Clients</h2>
                    <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Location</th>
                        <th>Edit/Delete</th>
                      </tr>
                    </thead>
                    <?php $clients=Client::paginate(5); ?>
                    @foreach($clients as $client)
                    <tbody>
                      <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->location}}</td>    
                        <td>
                                   
                              <form action="/client/{{$client->id}}">
                               <button type="submit" name="edit" class="btn btn-light"><i class="fa fa-pencil-square-o"></i></button> 
                               <button type="submit" name="delete" formmethod="POST" class="btn btn-light"><i class="fa fa-trash-o"></i></button>
                                  {{ csrf_field() }}
                              </form>
                        </td>  
                      </tr>
                    </tbody>@endforeach
                  </table>
                    {{$clients->links()}}
                </div> 

                <div class="col-xs-6 m-2">
                  <h2>Job Type</h2>
                    <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Edit/Delete</th>
                      </tr>
                    </thead>
                    <?php $jobs=Job::paginate(5); ?>
                    @foreach($jobs as $job)
                    <tbody>
                      <tr>
                        <td>{{$job->name}}</td>
                        <td>{{$job->created_at}}</td>    
                        <td>
                                   
                              <form action="/job/{{$job->id}}">
                               <button type="submit" name="edit" class="btn btn-light"><i class="fa fa-pencil-square-o"></i></button> 
                               <button type="submit" name="delete" formmethod="POST" class="btn btn-light"><i class="fa fa-trash-o"></i></button>
                                  {{ csrf_field() }}
                              </form>
                        </td>  
                      </tr>
                    </tbody>@endforeach
                  </table>
                    {{$jobs->links()}}
                </div> 
              </div>
            </div>

            <!--tables-->


     </div>
    <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
                      @else

                       @include('verification_error')
                  
                     @endif

     @else
       @include('welcome')
     @endif

@include('includes.layouts.footer')     