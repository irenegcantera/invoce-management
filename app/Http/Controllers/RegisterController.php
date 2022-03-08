<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMailable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Estas variables tienen que conincidir con los names del formulario
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user=User::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'confirmation_code'=>Str::random(25),
        ]);

        $correo = new VerificationMailable;
        $correo->viewData = ['name'=>$user->name,'code'=>$user->confirmation_code];
        Mail::to($user->email)->send($correo);

        return view('mail.email_send');
    }

     /**
     * Verify a user account.
     *
     * @param  string $code
     * @return View
     */
    public function verify($code) {
        $user=User::where('confirmation_code',$code)->first();

        if(!$user){
            return redirect()->route('register.index');
        }

        $user->confirmed = true;
        $currentTime = Carbon::now();
        $user->email_verified_at = $currentTime->toDateTimeString();
        $user->remember_token = Str::random(35);
        $user->save();

        // auth()->login($user);
        return redirect()->route('login.create')->with('notification','Se ha confirmado correctamente tu cuenta, ya puede iniciar sesión.');
    }

}
