<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Mail;

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

    public function authenticated(Request $request, $user)
    {
        Mail::send('emails.userlogin', ['user' => $user], function ($message) use ($user) {
            $message->from('correodepruebalaravel@gmail.com', 'Sistema'); 
            $message->to($user->email)->subject('Nuevo inicio de sesión'); //Configurar correo de llegada. Por defecto está el correo del usuario (admin@admin.com) NOTA: Este correo no existe
        });
    }

    protected function credentials(Request $request)
    {
        return [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
    }
    
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/Login');
      }
}
