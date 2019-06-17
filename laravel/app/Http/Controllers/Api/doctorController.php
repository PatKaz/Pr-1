<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialization;
use App\Repositories\UserRepository;
use Illuminate\Routing\Controller as BaseController;

class doctorController extends BaseController
{
	
	
    public function index(UserRepository $UserRepo)
	{
	
		$users= $UserRepo->getAllDoctors();
		
		
	return $users->toJson();
	}
	
	
	 public function show(UserRepository $UserRepo ,$id)
		{
			
	
		$doctor=$UserRepo->find($id);
		
		
		
	return $doctor->toJson();
	}
	
}

?>



