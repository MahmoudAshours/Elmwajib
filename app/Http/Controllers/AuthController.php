<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use SEO;

class AuthController extends Controller
{
    public function login ()
    {
        SEO::setTitle(__('Login'));

        return view('auth.login');
    }

    public function authenticate (LoginRequest $request)
    {
        if (!auth()->attempt($request->validated() , true)) {
            return back()->withErrors([
                'password' => __('auth.password')
            ])->withInput();
        }

        if (auth()->user()->can('manage-dashboard')) {
            return redirect(route('admin.dashboard'))->withInput();
        }

        return redirect()->intended()->withInput();
    }

    public function register ()
    {
        SEO::setTitle(__('Register'));

        return view('auth.register');
    }

    public function registerUser (RegisterRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        Auth::login($user);

        return redirect(route('home'))->with([
            'alert' => __('Thank you for register !')
        ])->withInput();
    }

    public function handleSubmitForgetRequest (Request $request) : RedirectResponse
    {

        $request->validate([ 'email' => 'required|email' ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with([ 'status' => __($status) ])
            : back()->withErrors([ 'email' => __($status) ]);
    }

    public function restPasswordForm (string $token) : View|Factory|array|Application
    {
        return view('auth.reset-password' , compact("token"));
    }

    public function resetPassword (Request $request) : RedirectResponse
    {
        $request->validate([
            'token'    => 'required' ,
            'email'    => 'required|email' ,
            'password' => 'required|min:6|confirmed' ,
        ]);

        $status = Password::reset(
            $request->only('email' , 'password' , 'password_confirmation' , 'token') ,
            function ($user , $password) {

                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash("success-rest-password",__("The password has been changed successfully"));

            return redirect()->route('login')->with([
                "status" => __($status)
            ]);
        }

        return back()->withErrors([ 'email' => [ __($status) ] ]);
    }

    public function logout ()
    {
        Auth::logout();

        session()->regenerateToken();

        return redirect(route('home'));
    }
}
