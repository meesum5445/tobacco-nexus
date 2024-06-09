<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class manager extends Controller
{
    function verifydocumentCall(Request $request)
    {
        DB::statement("
            UPDATE documents
            SET verified =?
            WHERE user_id=?
            ",
            [
                true,
                $request->user_id
            ]
            );
        return back();
    }
}
