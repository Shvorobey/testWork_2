<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;



class loginController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->method() == 'POST') {
//            $this->validate($request, [
//                'email' => 'required | email | string ',
//                'password' => ' required | min: 6 | string',
//            ]);
            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::where($email, '=', 'email' and $password, '=', 'password');
            if ($user != null) {
                session([
                    'email' => $email,
                    'password' => $password,

                ]);
                return redirect(route('admin'));
            } else {
                return redirect(route('login'))->withErrors(['Пароли не совподают']);
            }
        }
    }
}

