<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if((Auth::guard('admin')->check())){
            return redirect()
            ->intended(route('admin.dashboard'))
            ->with('status','You are already logged in as Admin!');
    }
    else{
        return view('admin.login',[
            
            'loginRoute' => 'admin.login',
           
        ]);
    }
    }

    /**
     * Login the admin.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        
        $this->validator($request);
    
       if(Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
        //Authentication passed...
        return redirect()
            ->intended(route('admin.dashboard'))
            ->with('status','Welcome');
    }

    //Authentication failed...
   
   return $this->loginFailed();

    }

    /**
     * Logout the admin.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
      
        Auth::guard('admin')->logout();
         return redirect()
        ->route('admin.login')
        ->with('status','Logout Successful!');
    }

    /**
     * Validate the form data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    private function validator(Request $request)
    {
            //validation rules.
            $rules = [
                'email'    => 'required|email|exists:admins|min:5|max:191',
                'password' => 'required|string|min:4|max:255',
            ];

            //custom validation error messages.
            $messages = [
                'email.exists' => 'These credentials do not match our records.',
                
            ];

            //validate the request.
            $request->validate($rules,$messages);


    }

    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
      
        return redirect()
        ->back()
        ->withInput()
        ->with('error','Authentication failed, please try again!');
        
    }
}
