<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller{


   
    public function changePasswordForm()
    {
        return view('profile.changepassword');
    }

  
    public function changePassword(Request $request)
    {
        $this->validatePasswordChangeRequest($request);

        $this->updatePassword($request->new_password);

        return redirect()->route('password.change.form')
                         ->with('status', 'Password has been successfully changed!');
    }


    protected function validatePasswordChangeRequest(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
    }

    
    protected function updatePassword(string $newPassword)
    {
        $user = Auth::user();
        $user->password = Hash::make($newPassword);
        $user->save();
    }
	}

