@extends('template')

@section('title')
	@if (isset($title))
		- {{$title}}
	@endif
	
@endsection

@section('content')
<div class="container">
<h2>Dodawanie Specializacji</h2>
<form action="{{ action ('SpecializationController@store')}}" method="POST" role="form">
<input type="hidden" name="_token" value="{{ csrf_token()}}" />
<div class="form-group">
<label for="name">Nazwa specializacji</label>
<input type="text" class="form-control" name="name" />
</div>
<input type="submit" value="Dodaj" class="btn btn-primary" />
</from>

</div>
@endsection('content')



