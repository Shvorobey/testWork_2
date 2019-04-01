<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.04.2019
 * Time: 2:16
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class loginController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'email' => 'required | email | string ',
                'password' => ' required | min: 6 | string',
            ]);
            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::where($email, '=', 'id' and $password, '=', 'password');

            if ($user != null) {
                return redirect(route('admin'))->with(['user' => $user
                ]);
            } else {
                return redirect(route('login'))->withErrors(['Пароли не совподают']);
            }

        }
    }
}

