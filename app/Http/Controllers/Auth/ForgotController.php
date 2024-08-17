<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ForgotController extends Controller
{
	public function forgotpasswordForm()
	{
	return view('forgotpassword');
	}


	public function checkingEmail(Request $request)
	{
	dd($request);
	}



}
