<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::WELCOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
  
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
        {
            if(Auth::user()->is_email_verified == 1 && Auth::user()->is_access_allowed == 1 &&  Auth::user()->is_admin == 0)
            {
                return redirect()->route('welcome');
            }
            elseif(Auth::user()->is_email_verified == 1 && Auth::user()->is_access_allowed == 1 &&  Auth::user()->is_admin == 1)
            {
                return redirect()->route('admin-dashboard');
            }
            else{
                return redirect()->back();
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $findUser = User::where('email', $user->email)->first();

        if($findUser)
        {
            Auth::login($findUser);
            $findUser->is_email_verified = 1;
            $findUser->save();
            return redirect()->route('show-price');
        }
        else{
            $firstName = explode(" ", $user->name);
            $saveData = new User;
            $saveData->name = $firstName[0];
            $saveData->email = $user->email;
            $saveData->password = bcrypt(123456789);
            $saveData->is_email_verified = 1;
            $saveData->save();
            Auth::login($saveData);
            return redirect()->route('show-price');
        }
    }
}
