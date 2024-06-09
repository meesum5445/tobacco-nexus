<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class profilehandler extends Controller
{
    function profileinformationformCall(Request $request)
    {
        DB::statement("
            UPDATE users
            SET username =?,
                email=?,
                contact_no=?
            WHERE id=?
        ",
        [
            $request->input('username'),
            $request->input('email'),
            $request->input('contact_no'),
            Auth::id()
        ]
        );
        return redirect()->route('profile');
    }
    function profilepasswordformCall(Request $request)
    {
        if(Hash::check($request->input('current_password'), Auth::user()->password))
        {
            DB::statement("
            UPDATE users
            SET password =?
            WHERE id=?
            ",
            [
                HASH::make($request->input('new_password')),
                Auth::id()
            ]
            );
        }    
        return redirect()->route('profile');
    }
}
