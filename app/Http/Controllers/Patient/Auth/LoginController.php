<?php

namespace App\Http\Controllers\Patient\Auth;

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
        if((Auth::guard('patient')->check())){
            return redirect()
            ->intended(route('patient.dashboard'))    //if User is already logged in, user will be redirected to the dashboard. 
            ->with('status','You are already logged in as Patient!');
    }
    else{
        return view('patient.login',[
            
            'loginRoute' => 'patient.login', // If user is not logged in Login page will be served.
           
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
    
       if(Auth::guard('patient')->attempt($request->only('email','password'),$request->filled('remember'))){
        //Authentication passed...
        return redirect()
            ->intended(route('patient.dashboard')) // Redirect to the dashboard
            ->with('status','You are Logged in as Patient!');  // Success message 
    }

    //Authentication failed...
   
   return $this->loginFailed();

    }

    /**
     * Logout the user
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
      
        Auth::guard('patient')->logout();
         return redirect()
        ->route('patient.login')
        ->with('status','Logout Successful!'); //Generating success message
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
                'email'    => 'required|email|exists:patients|min:5|max:191',
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
        ->with('error','Incorrect Password, please try again!');
        
    }

}
