<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class writer extends Controller
{
    function blogpublishingformCall(Request $request)
    {
        DB::statement("
        INSERT INTO blogs (writer_id, title,image,description,publish_date,active) 
        VALUES (?, ?, ? , ? , ? , ? )
        ", 
        [
        Auth::id(),
        $request->input('title'), 
        file_get_contents($request->file('image')),
        $request->input('description'),
        date('Y-m-d'),
        True,
        ]
        );
        return redirect()->route('blogpublishingform');
    }
    function mybloginformationformCall(Request $request)
    {
        if ($request->hasFile('image'))
        {
            DB::statement("
            UPDATE blogs
            SET title =?,
                image=?,
                description=?
            WHERE id=?
            ",
            [
                $request->input('title'), 
                file_get_contents($request->file('image')), 
                $request->input('description'), 
                $request->  input('blog_id'),           
            ]
            );
        }
        else
        {
            DB::statement("
            UPDATE blogs
            SET title =?,
                description=?
            WHERE id=?
            ",
            [
                $request->input('title'), 
                $request->input('description'),      
                $request->  input('blog_id'),           
            ]
            );
        }
        return back();
    }
}
