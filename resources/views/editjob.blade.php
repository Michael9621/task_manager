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
    <h1>Edit the job type</h1>

   <form method="POST" action="/job/{{ $job->id }}">
        <div class="panel panel-default">
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="usr" value="{{$job->name}}" placeholder="enter name">
            </div>
            <button type="submit" class="btn btn-default">
              <i class="fa fa-save "></i> Save
            </button>
        </div>

{{ csrf_field() }}
</form>



</div>

@stop


