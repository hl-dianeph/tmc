<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $user = $request->user();

        return ($user->hasRole('administrator')) ? redirect('/backend') : redirect('/');
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::with('telegram')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('telegram')->user();
        dd($user);

        // $user->token;
    }


    public function showTelegramLoginForm() {
        return view('auth.telegram');
    }

    public function handleTelegramLogin(Request $request) {
        // TODO: if request is not full -> return 'error'
        // return $request->all();

        $user = User::where('telegram_id', $request->id)->first();

        if (!$user) {
            // register
            // TODO: validate!
            $name = '';
            if ($request->has('lastname'))
                $name = $request->lastname;

            if ($request->has('firstname')) 
                $name = ' ' . $request->firstname;

            $newUser = User::create([
                'name' => trim($request->lastname . ' ' . $request->firstname),
                'telegram_id' => $request->id,
                'username' => $request->username,
                'email' => $request->username . '@tmchannel.ru',
                'password' => Hash::make(uniqid())
            ]);

            Auth::login($newUser);
        } else {
            // login
            Auth::login($user);
        }

        return 1;
    }
    
}
