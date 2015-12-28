@extends('app')

@section('content')
	
	<h1> Edit: {{ $article->title }}</h1>

	
	{!! Form::model($article,  [ 'method' => 'PATCH',  'url' => 'articles/' . $article->id ]  ) !!}
	
			@include('articles/parcials/form' , ['submitButtonText' => 'Update Article'])

	{!! Form::close() !!}
	

	@include('errors/list')


@stop