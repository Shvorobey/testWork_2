<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class adminController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'name' => 'required | max: 30 | string | ',
                'email' => 'required | email | string | unique:users,email',

            ]);

            $user = User::find(\Illuminate\Support\Facades\Session::get('email'), 'email');
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            try {
                $user->save();
            } catch (\Exception $exception) {
                return Redirect::back()->withErrors([
                    'errors' => $exception->getMessage()]);
            }
        } else {
            $user = User::find(\Illuminate\Support\Facades\Session::get('id'), 'id');
        }

        return view('user_update', ['user' => $user]);
    }
}