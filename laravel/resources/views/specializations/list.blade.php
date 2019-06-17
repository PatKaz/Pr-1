@extends('template')

@section('title')
	@if (isset($title))
		- {{$title}}
	@endif
	
@endsection

@section('content')
<div class="container">
<h2>Specializacje</h2>
<a href="{{ URL::to('specializations/create')}}">Dodaj nową specializację</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Specializacja</th>  
      
    </tr>
  </thead>
  <tbody>
  @foreach ($specializations as $specialization)
  
  
    <tr>
      <th scope="row">{{ $specialization->id }}</th>
      <td><a href="{{ URL::to('doctors/specializations/' . $specialization->id) }}">{{ $specialization->name }}</a></td>
      
      
    </tr>
	
	@endforeach
  </tbody>
</table>
</div>
@endsection('content')



