<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
 
class LoginController extends Controller
{
    public function showLoginForm(){
        return view('pages.examples.login');
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request)
    { 

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }else{
            dd('pssword not match');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function dashboard(){
        $user = User::all();
        return view('dashboard', compact('user'));
    }
    // public function logout(Request $request) {
    //     Auth::logout();
    //     return redirect('/login');
    //   }
}
