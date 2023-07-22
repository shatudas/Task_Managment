<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
   
class LoginController extends Controller
{

  
    use AuthenticatesUsers;
  
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
  
     /**
     * Write code on Method
     *
     * @return response()
     */
    public function login(Request $request)
     {
      $request->validate([
       'email'    => 'required',
       'password' => 'required',
      ]);

      $credentials = $request->only('email', 'password');

       if (Auth::attempt($credentials)) {
        $user = User::where('email',$request->email)->first();
        if($user->status === 0){
         return redirect()->route('home');
        }
        else
         {
          Auth::logout();
         }
        }      
       return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
     }
}
