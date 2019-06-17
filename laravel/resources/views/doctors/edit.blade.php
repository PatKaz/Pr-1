@extends('template')

@section('title')
	@if (isset($title))
		- {{$title}}
	@endif
	
@endsection

@section('content')
<div class="container">
<h2>Edycja Lekarza</h2>
<form action="{{ action ('doctorController@editStore')}}" method="POST" role="form">
<input type="hidden" name="_token" value="{{ csrf_token()}}" />
<input type="hidden" name="id" value="{{ $doctor->id }}" />

<div class="form-group">
<label for="name">Imię i Nazwisko</label>
<input type="text" class="form-control" name="name" value="{{ $doctor->name }}"/>
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="text" class="form-control" name="email" value="{{ $doctor->email }}"/>
</div>

<div class="form-group">
<label for="phone">Nr telefonu</label>
<input type="phone" class="form-control" name="phone" value="{{ $doctor->phone }}"/>
</div>
<div class="form-group">
<label for="address">Adres</label>
<input type="address" class="form-control" name="address" value="{{ $doctor->address}}" />
</div>
<div class="form-group">
<label for="pesel">Pesel</label>
<input type="text" class="form-control" name="pesel" value="{{ $doctor->pesel }}" />
</div>
<div class="form-group">
<label for="specialization">Specializacja</label><br>
@foreach($specializations as $specialization)
@if($doctor->specializations->contains($specialization->id))
<input type="checkbox" class="form-control" name="specializations[]" value="{{ $specialization->id }}" checked/>{{ $specialization->name }}
@else
	<input type="checkbox" class="form-control" name="specializations[]" value="{{ $specialization->id }}" />{{ $specialization->name }}
@endif
<p align="center">{{ $specialization->name }}</p>
@endforeach
</div>

<div class="form-group">
<label for="status">Status</label>
@if($doctor->status  == 'Active')
Aktywny<input type="radio" class="form-control" name="status" value="Active"  checked="checked"/>
Nieaktywny<input type="radio" class="form-control" name="status" value="Inactive" />
@else
Aktywny<input type="radio" class="form-control" name="status" value="Active"  />
Nieaktywny<input type="radio" class="form-control" name="status" value="Inactive" checked="checked"/>
@endif
</div>

<input type="submit" value="Edytuj" class="btn btn-primary" />
</from>

</div>
@endsection('content')



