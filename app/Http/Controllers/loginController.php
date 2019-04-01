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
                'email' => 'required | email | string | unique:users,email',
                'password' => ' required | min: 6 | string',
            ]);






            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $password_1 = $request->input('password_1');
            $password_2 = $request->input('password_2');

            if ($password_1 === $password_2) {
                $user->password = $password_1;
                try {
                    $user->save();
                } catch (\Exception $exception) {
                    return Redirect::back()->withErrors([
                        'errors' => $exception->getMessage()]);
                }
            } else {
                return Redirect::back()->withErrors([ 'Пароли не совподают']);
            }
            return redirect(route('login'))->with([
                'Спасибо за регистрацию. Введите имя и пароль чтобы войти'
            ]);

        }
    }
}