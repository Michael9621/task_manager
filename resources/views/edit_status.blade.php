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
        <h1>Update task status</h1>

            <form method="POST" action="">

            <div class="panel panel-default">   
                    <div class="form-group">
                      <select class="form-control" id="sel1" required="" name="status">
                       <option value="" disabled selected>Select percentage of completion</option>
                       <option>10</option>
                       <option>20</option>
                       <option>30</option>
                       <option>40</option>
                       <option>50</option>
                       <option>60</option>
                       <option>70</option>
                       <option>80</option>
                       <option>90</option>
                       <option>100</option>
                      </select>
                    </div>
            </div>  
                    
                    <button type="submit" class="btn btn-default">
                      <i class="fa fa-save "></i> Edit
                    </button>
                </div>
            {{ csrf_field() }}
            </form>
    </div>

@stop