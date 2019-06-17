<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SpecializationRepository;
use App\Models\Specialization;
use Illuminate\Support\Facades\Auth;

class SpecializationController extends Controller
{
	
	public function __construct(){
		
		$this->middleware('auth');
	}
	
public function index(SpecializationRepository $specializationRepo)
		{
			
			if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
			
		$specializations=$specializationRepo->getAll();
		
		
		
	return view('specializations.list',["specializations"=>$specializations,
								"footerYear"=>date("Y"),
								"title"=>"Moduł Specializacji"]);
	}
	public function create(){
		return view('specializations.create',["footerYear"=>date("Y")]);
	}
	
	public function store(Request $request){
		
		if(Auth::user()->type!='doctor' && Auth::user()->type != 'admin')
		{
				return redirect()->route('login');
		}	
		
		$specialization=new Specialization;
		$specialization->name=$request->input('name');
		$specialization->save();
		return redirect()->action('SpecializationController@index');
	}
	
}