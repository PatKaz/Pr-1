@extends('template')

@section('title')
	@if (isset($title))
		- {{$title}}
	@endif
	
@endsection

@section('content')
<div class="container">
<h2>Lekarze</h2>
 <a href="{{URL::to('doctors/create' )}}">Dodaj Lekarza </a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imię Nazwisko</th>
	  <th scope="col">Specializacja</th>
      <th scope="col">Email</th>
	  <th scope="col">Nr tel</th>
	 
	  <th scope="col">Status</th>
	  <th scope="col">Operacje</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($doctorsList as $doctor)
  
  
    <tr>
      <th scope="row">{{ $doctor->id }}</th>
      <td><a href="{{URL::to('doctors/' . $doctor->id)}}"> {{ $doctor->name }} </a></td>
	  
	  <td>
			<ul>
		
	
		@foreach ($doctor->specializations as $specialization)
		<li>{{ $specialization->name }}</li>
		
		@endforeach
		
		
		</ul>
		</td>
		
	  
		
       <td>{{ $doctor->email }}</td>
    
	   <td>{{ $doctor->phone }}</td>
	      
		 <td>{{ $doctor->status }}</td>
		 <td><a href="{{URL::to('doctors/delete/' . $doctor->id )}}" onclick="return confirm('Czy napewno usunąć lekarza?')">Usuń Lekarza </a><p>
		 <a href="{{URL::to('doctors/edit/' . $doctor->id )}}" >Edycja Lekarza </a></td>
		 
		 
    </tr>
	
	@endforeach
	
  </tbody>
</table>
 	@foreach ($statistics as $stat)
		@if ($stat->status=="Active")
			Liczba lekarzy dostępnych: {{ $stat->user_count }}
		@endif 
		@if ($stat->status=="Inactive")
			Liczba lekarzy niedostępnych: {{ $stat->user_count }}
		@endif
	@endforeach
</div>
@endsection('content')



