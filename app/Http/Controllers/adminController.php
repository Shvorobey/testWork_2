<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;


class adminController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->method() == 'POST') {

            $user = \Illuminate\Foundation\Auth\User::find(\Illuminate\Support\Facades\Session::get('user')->id);

            $user->name = $request->input('name');
            $user->email = $request->input('email');

            try {
                $user->save();
            } catch (\Exception $exception) {
//                dd($user);
                return Redirect::back()->withErrors([
                    'errors' => $exception->getMessage()]);
            }
        } else {
            return redirect(route('admin'))->withErrors(['Ошибка']);
        }

        return view('updated');
    }
}