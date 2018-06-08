@include('includes.layouts.head')

@if (Auth::check())
    @if (auth()->user()->verified()) 
    <!-- Main wrapper  -->
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

<h2 class="task">Create a client</h2>
<form method="POST" action="/client">
    <div class="panel panel-default">   
        <div class="form-group">
          <input type="text" name="name" class="form-control" id="usr" required placeholder="enter name">
        </div>
         <div class="form-group">
          <input type="email" name="email" class="form-control" id="usr" required placeholder="enter email">
        </div>
        <div class="form-group">
          <input type="text" name="location" class="form-control" id="usr" required placeholder="enter location">
        </div>
        <button type="submit" class="btn btn-default">
          <i class="fa fa-save "></i> Save
        </button>
    </div>
    {{ csrf_field() }}
</form>
                
       </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    
     @else
     <h3>You have not verified your account... check your e-mail to verify</h3>
     @endif

    @else
     <h3>You need to log in. <a href="/login">Click here to login</a></h3>

    @endif

@include('includes.layouts.footer')     