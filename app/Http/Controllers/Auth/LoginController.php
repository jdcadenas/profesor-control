<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\Moodle\UserService;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
  
    use AuthenticatesUsers;

    protected $UserService;

    public function login(Request $request)
    
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user();
            

           // Successful login, redirect to intended destination
            return redirect()->intended('home');
        } else {
            // Failed login, check if user exists in Moodle
           
            if ($this->UserService->isUserRegistered($request->input('email'))) {

                // User exists in Moodle, display existing user message and redirect to login
                return redirect()->back()->with('message', 'El usuario ya está registrado en Moodle. Por favor, inicie sesión.');
            } else {
                // User does not exist in Moodle, return failed login message
                return back()->withErrors([
                    'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
                ]);
            }
        }
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/panel/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->UserService = app(UserService::class);
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
