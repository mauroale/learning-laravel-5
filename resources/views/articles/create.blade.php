@extends('app')

@section('content')
	
	<h1>Write new Article </h1>
	<hr>

	{!! Form::open( [  'url' => 'articles'  ]  ) !!}
			
		@include('articles/parcials/form' , ['submitButtonText' => 'Add Article'])


	{!! Form::close() !!}


	@include('errors/list')

@stop