<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
	
	
	
     public function index(UserRepository $UserRepo)
		{
		
		if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
		
		$users= $UserRepo->getAllPatients();
		
		
		
	return view('patients.list',["patientsList"=>$users,
								"footerYear"=>date("Y"),
								"title"=>"Moduł Pacientów"]);
	}
	 public function show(UserRepository $UserRepo ,$id)
		{
			if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
			
		$patient=$UserRepo->find($id);
		
		
		
	return view('patients.show',["patient"=>$patient,
								"footerYear"=>date("Y"),
								"title"=>"Moduł Pacientów"]);
	}
	

 public function store(Request $request)
		{
		
	
			$request->validate([
				'name'=>'required|max:255',
				'email' => 'required|email|unique:users,email',
				'password' => 'required|min:5',
				'phone' => 'required',
				'address' => 'required',
				'pesel' => 'required'
			]);
			
			$patient=new User;
			$patient->name=$request->input('name');
			$patient->email=$request->input('email');
			$patient->password=bcrypt($request->input('password'));
			$patient->phone=$request->input('phone');
			$patient->address=$request->input('address');
			$patient->pesel=$request->input('pesel');
			$patient->status=$request->input('status');
			$patient->type='patient';
			$patient->save();
			
			
			
		return view('patients.confirm',[
								"footerYear"=>date("Y"),
								"title"=>"Moduł Pacientów"]);
		
		
	}
}	