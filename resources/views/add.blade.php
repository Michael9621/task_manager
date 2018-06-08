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
          @if (session('status'))
      <div class="alert alert-danger alert-dismissible" style="width: 20%; margin: auto; ">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
       <p style="color:#333;" class="p-4"><b> {{ session('status') }} </b></p>
      </div>
      @endif
           @include('includes.page_content')
                
       </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
     @else
     <h3>You have not verified your account... check your e-mail to verify</h3>
     @endif

    @else

    <p>You need to login</p>

    @endif

@include('includes.layouts.footer')     