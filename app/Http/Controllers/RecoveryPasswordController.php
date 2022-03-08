<?php

namespace App\Http\Controllers;

use App\Mail\RecoveryMailable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RecoveryPasswordController extends Controller
{
    /**
     * Show a form to send token at your email.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('password.recovery');
    }

    /**
     * Show a form to send token at your email.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function sendToken(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        //enviar email con el token 
        $correo = new RecoveryMailable;
        $correo->viewData = ['name'=>$user->name,'remember_token'=>$user->remember_token];
        Mail::to($user->email)->send($correo);

        return view('mail.email_send');
    }

    /**
     * Show a form to change your password.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function create($token)
    {
        $user=User::where('remember_token',$token)->first();

        if(!$user){
            return redirect()->route('login.create');
        }else {
            return view('password.create');
        }
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     // Estas variables tienen que conincidir con los names del formulario
    //     $this->validate(request(),[
    //         'password'=>'required',
    //     ]);

    //     $user=User::create([
    //         'name'=>$request->get('name'),
    //         'email'=>$request->get('email'),
    //         'password'=>$request->get('password'),
    //         'confirmation_code'=>Str::random(25),
    //     ]);

    //     $correo = new VerificationMailable;
    //     $correo->viewData = ['name'=>$user->name,'code'=>$user->confirmation_code];
    //     Mail::to($user->email)->send($correo);

    //     return view('mail.email_send');
    // }
}
