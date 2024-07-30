<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{

    protected $redirectTo = '/account/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {

        return view("pages.auth.login");
    }
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $control = $request->only('email', 'password');
        if (auth()->attempt($control)) {
            return redirect()->intended($this->redirectTo)->with("success", "Giriş Başarılı");
        }
        return back()->withErrors(['email' => 'E Posta adresi veya Şifre Hatalı'])->withInput($request->except('password'));
    }


    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $response = redirect('/login');
        $cookies = [
            'laravel_session',
            'XSRF-TOKEN',
            'remember_web',
        ];

        foreach ($cookies as $cookie) {
            $response = $response->withCookie(Cookie::forget($cookie));
        }
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
