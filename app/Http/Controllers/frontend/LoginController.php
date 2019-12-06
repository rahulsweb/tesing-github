<?php



namespace App\Http\Controllers\frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\User;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    //
    protected $redirectTo = '/';
   
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

        
        $this->validate($request, [
            'email' => 'required|email|',
            'password' => 'required|min:8|'
         

           
        ]);
        //
        if(Auth::attempt([
            'email'=>$request->email,
               'password'=>$request->password 
            ])
        )
        {
           

            $user=User::where('email',$request->email)->first();
        
            if($user->customer()){
                
                return redirect('/');

                }
            else
            {
                \Auth::logout();
                $request->session()->put('error', 'Not Exist Email and PassWord');
           
                return redirect('/login');
            }

         


         
   

        }

        $request->session()->put('error', 'Not Exist Email and PassWord');
        return redirect('login');
         
   
    }


    public function logout(Request $request)
{
 
    if(\Auth::check())
    {
        \Auth::logout();
        $request->session()->invalidate();
    }
    return  redirect('login');
}



protected function guard()
    {
        return Auth::guard();
    }
}

