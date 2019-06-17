@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
				
				
				<h2>Rejestracja</h2>
<form action="{{ action ('PatientController@store')}}" method="POST" role="form">
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



<input type="hidden" name="status" value="Active" />
<input type="submit" value="Dodaj" class="btn btn-primary" />
</from>

</div>
				
				

               
              
            </div>
        </div>
    </div>
</div>
@endsection
