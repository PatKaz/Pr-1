@extends('template')

@section('title')
	@if (isset($title))
		- {{$title}}
	@endif
	
@endsection

@section('content')
<div class="container">
<h2>Pacjenci</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imię Nazwisko</th>
	  
      <th scope="col">Email</th>
	  <th scope="col">Nr tel</th>
	 
	  
    </tr>
  </thead>
  <tbody>
  @foreach ($patientsList as $patient)
  
  
    <tr>
      <th scope="row">{{ $patient->id }}</th>
      <td><a href="{{URL::to('patients/' . $patient->id)}}"> {{ $patient->name }} </a></td>
	  
	 
	  
		
       <td>{{ $patient->email }}</td>
    
	   <td>{{ $patient->phone }}</td>
	      
		 
		 
    </tr>
	
	@endforeach
	
  </tbody>
</table>
 
</div>
@endsection('content')



