<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VisitRepository;
use App\Repositories\UserRepository;
use App\Models\Visit;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Mail;

class VisitController extends Controller
{
	public function __construct(){
		
		$this->middleware('auth');
	}
		
    public function index(VisitRepository $visitRepo)
		{
			if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
			
			
		$visits=$visitRepo->getAll();
		
		
		
	return view('visits.list',["visits"=>$visits,
								"footerYear"=>date("Y"),
								"title"=>"Moduł Wizyt"]);
	}
	
	public function create(UserRepository $userRepo){
		
		
		if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
		
		$doctors= $userRepo->getAllDoctors();
		
		$patients= $userRepo->getAllPatients();
		
		return view('visits.create',["doctors"=>$doctors,
										"patients"=>$patients,
								"footerYear"=>date("Y"),
								"title"=>"Moduł Wizyt"]);
	}
	public function store(Request $request){
		
		if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
		
		$visit= new Visit;
		$visit->doctor_id=$request->input('doctor');
		$visit->patient_id=$request->input('patient');
		$visit->date=$request->input('date');
		$visit->save();
		
		
		
		
		$patient=User::find($visit->patient_id);
		Mail::send('emails.visit', ['visit'=>$visit], function ($m) use ($visit, $patient){
			$m->to($patient->email, $patient->name)->subject('Nowa wizyta');
			
		});
		
		return redirect()->action('VisitController@index');
	}
}
