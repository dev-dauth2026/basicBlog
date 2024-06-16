<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function login(Request $request){
        $loginField = $request->validate([
            'loginemail' => 'required',
            'loginpassword' => 'required',
        ]);
        if(auth()->attempt(['email'=>$loginField['loginemail'], 'password'=>$loginField['loginpassword']])){
            $request->session()->regenerate();
        }
        return redirect('/');
        
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
        
    }
    public function register(Request $request){
        $registrationFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200']
        ]);
        $registrationFields['password'] = bcrypt($registrationFields['password']);
        $user = User::create($registrationFields);
        auth()->login($user);
        return redirect('/');
    }

   
}
