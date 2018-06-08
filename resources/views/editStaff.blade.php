@extends('layouts.app')
<style type="text/css">
    .panel{
        width: 50%;
        margin:auto;
    }
    .btn{
        float: right;
    }
    .staff{
        text-align:center;
        padding: 1em;
    }
    .col-xs-4{
        padding:3px;
    }
    </style>
@section('content')


    <div class="container">
    <h1>Edit the staff</h1>

<form method="POST" action="/staff/{{ $staff->id }}">

<div class="panel panel-default">   
        <div class="form-group">
          <input type="text" name="name" class="form-control" id="usr" value="{{$staff->name}}" placeholder="enter name to edit">
        </div>  
        
        <button type="submit" class="btn btn-default">
          <i class="fa fa-save "></i> Edit
        </button>
    </div>

    <!--<div class="form-group">
        <textarea name="description" class="form-control">{{$staff->description }}</textarea>    
    </div>


    <div class="form-group">
        <button type="submit" name="update" class="btn btn-primary">Update staff</button>
    </div>-->
{{ csrf_field() }}
</form>



</div>

@stop


