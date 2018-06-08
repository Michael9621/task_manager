
@if (Auth::check())
	@extends('layouts.app')

		@section('content')
		   <h3>You are yet to verify your account <br> check e-mail to verify</h3>
		@endsection

 
@else
     @include('welcome')
@endif