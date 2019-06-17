<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialization;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class doctorController extends Controller
{
	public function __construct(){
		
		$this->middleware('auth');
	}
	
	
    public function index(UserRepository $UserRepo)
	{
		if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
	
	
		
		$statistics=$UserRepo->getDoctorsStatistics();
		$users= $UserRepo->getAllDoctors();
		
		
		
	return view('doctors.list',["doctorsList"=>$users,
								"footerYear"=>date("Y"),
								"title"=>"Moduł lekarzy",
								'statistics'=>$statistics]);
	}
	public function listSpecial(UserRepository $UserRepo , $id)
		{
			if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
	
		$statistics=$UserRepo->getDoctorsStatistics();
		$users= $UserRepo->getDoctorsBySpecialization($id);
		
		
		
	return view('doctors.list',["doctorsList"=>$users,
								"footerYear"=>date("Y"),
								"title"=>"Moduł lekarzy",
								'statistics'=>$statistics]);
	}
	
	
	 public function show(UserRepository $UserRepo ,$id)
		{
			if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
	
		$doctor=$UserRepo->find($id);
		
		
		
	return view('doctors.show',["doctor"=>$doctor,
								"footerYear"=>date("Y"),
								"title"=>"Moduł lekarzy"]);
	}
	
	
	
	 public function create()
		{
			if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
	
			$specializations=Specialization::all();
			
		return view('doctors.create', ["specializations"=>$specializations,"footerYear"=>date("Y")]);
		
	}
	
		 public function store(Request $request)
		{
			if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
	
			$request->validate([
				'name'=>'required|max:255',
				'email' => 'required|email|unique:users,email',
				'password' => 'required|min:5',
				'phone' => 'required',
				'address' => 'required',
				'pesel' => 'required'
			]);
			
			$doctor=new User;
			$doctor->name=$request->input('name');
			$doctor->email=$request->input('email');
			$doctor->password=bcrypt($request->input('password'));
			$doctor->phone=$request->input('phone');
			$doctor->address=$request->input('address');
			$doctor->pesel=$request->input('pesel');
			$doctor->status=$request->input('status');
			$doctor->type='doctor';
			$doctor->save();
			
			$doctor->specializations()->sync($request->input('specializations'));
			
		return redirect()->action('doctorController@index');
		
		
	}
	
	
	
	public function edit(UserRepository $UserRepo,$id){

	if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
	
	$doctor=$UserRepo->find($id);
	$specializations=Specialization::all();
	
	return view('doctors.edit', ["specializations"=>$specializations,
								 "doctor"=>$doctor,
								"footerYear"=>date("Y")]);

	}
	 public function editStore(Request $request)
		{
			if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
	
			$doctor=User::find($request->input('id'));
			$doctor->name=$request->input('name');
			$doctor->email=$request->input('email');
			$doctor->phone=$request->input('phone');
			$doctor->address=$request->input('address');
			$doctor->pesel=$request->input('pesel');
			$doctor->status=$request->input('status');
			$doctor->save();
			
			$doctor->specializations()->sync($request->input('specializations'));
			
		return redirect()->action('doctorController@index');
	
		}
	public function delete(UserRepository $UserRepo,$id){
		
		if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
	
			$doctor=$UserRepo->delete($id);
	return redirect ('doctors');

	}
	
	
	
}

?>



