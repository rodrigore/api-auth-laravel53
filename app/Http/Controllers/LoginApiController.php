<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Auth;

class LoginApiController extends Controller
{
    //
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::once($request->except('_token'))) {
            return response()->json(['token' => Auth::user()->api_token]);
        }

        return response()->json(['message' => 'credenciales invalidas'], 422);
    }
}
