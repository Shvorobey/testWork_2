<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class saveFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'name' => 'required | max: 30 | string | ',
                'email' => 'required | email | string | unique:users,email',
                'password_1' => ' required | min: 6 | string',
                'password_2' => ' required | min: 6 | string',
            ]);
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $password_1 = $request->input('password_1');
            $password_2 = $request->input('password_2');

            if ($password_1 === $password_2) {
                $user->password = $password_1;
                session([
                    'name' => $request->input('name'),
                ]);
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
