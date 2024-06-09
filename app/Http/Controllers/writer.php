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
}
