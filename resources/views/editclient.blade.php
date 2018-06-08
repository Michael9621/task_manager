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
    <h1>Edit the client</h1>

   <form method="POST" action="/client/{{ $client->id }}">
        <div class="panel panel-default">
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="usr" value="{{$client->name}}" placeholder="enter name">
            </div>
             <div class="form-group">
              <input type="email" name="email" class="form-control" id="usr" value="{{$client->email}}" placeholder="enter email">
            </div>
            <div class="form-group">
              <input type="text" name="location" class="form-control" id="usr" value="{{$client->location}}" placeholder="enter location">
            </div>
            <button type="submit" class="btn btn-default">
              <i class="fa fa-save "></i> Save
            </button>
        </div>

{{ csrf_field() }}
</form>



</div>

@stop


