@extends('template')

@section('title')
	@if (isset($title))
		- {{$title}}
	@endif
	
@endsection

@section('content')
<div class="container">
@if ($errors->any())
	<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)
		<li> {{ $error }} </li>
	@endforeach
	</ul>
	</div>

@endif

<h2>Dodawanie Lekarza</h2>
<form action="{{ action ('doctorController@store')}}" method="POST" role="form">
<input type="hidden" name="_token" value="{{ csrf_token()}}" />
<div class="form-group">
<label for="name">Imię i Nazwisko</label>
<input type="text" class="form-control" name="name" />
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="text" class="form-control" name="email" />
</div>
<div class="form-group">
<label for="password">Hasło</label>
<input type="password" class="form-control" name="password" />
</div>
<div class="form-group">
<label for="phone">Nr telefonu</label>
<input type="phone" class="form-control" name="phone" />
</div>
<div class="form-group">
<label for="address">Adres</label>
<input type="address" class="form-control" name="address" />
</div>
<div class="form-group">
<label for="pesel">Pesel</label>
<input type="text" class="form-control" name="pesel" />
</div>
<div class="form-group">
<label for="specialization">Specializacja</label><br>
@foreach($specializations as $specialization)

<input type="checkbox" class="form-control" name="specializations[]" value="{{ $specialization->id }}" />
<p align="center">{{ $specialization->name }}</p>
@endforeach
</div>


<input type="hidden" name="status" value="Active" />
<input type="submit" value="Dodaj" class="btn btn-primary" />
</from>

</div>
@endsection('content')



