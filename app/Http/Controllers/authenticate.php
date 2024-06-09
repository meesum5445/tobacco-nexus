<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authenticate extends Controller
{
    function signupCall(Request $request)
    {
        if($request->input('password')!= $request->input('confirm_password'))
        {
            return redirect()->route('signup');
        }
            
        DB::statement("
        INSERT INTO users (account_type,username, email,password,contact_no,active) 
        VALUES (?, ?, ?, ?,?,?)
        ", 
        [
        $request->input('account_type'),
        $request->input('username'), 
        $request->input('email'),
        Hash::make($request->input('password')),
        $request->input('contact_no'),
        True
        ]
        );
        Auth::attempt($request->only('username','password'),true);   
        return redirect()->route('home');
    }
    function loginCall(Request $request)
    {
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'active' => 1],true))
        {
            return redirect()->route('home');
        }
        return redirect()->route('login');
    }
    function logoutCall(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
    function documentsubmissionCall(Request $request)
    {
        $file = $request->file('document_image');
        if (!$file) {
            return haha;
        }
            DB::statement("
            INSERT INTO documents (user_id,image,verified) 
            VALUES (?, ?,?)
            ", 
            [
            Auth::id(),
            file_get_contents($request->file('document_image')),
            false
            ]
            );
            return redirect()->route('profile'); 
       
    }
    function addresssubmissionCall(Request $request)
    {
        $count=DB::select("SELECT count(*) as count FROM addresses WHERE customer_id=?",[Auth::id()])[0]->count;
        if($count==0)
        {
            DB::statement("
            INSERT INTO addresses(location,customer_id)
            VALUES(?,?)",
                [
                    $request->input('address'),
                    Auth::id()
                ]
            );
        }
        else
        {
            DB::statement("
            UPDATE addresses
            SET location=?
            WHERE customer_id=?
            ",
            [
                $request->input('address'),
                Auth::id()
            ]
            );
        }
        return redirect()->route('profile');       
    }
}
