<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class user extends Controller
{
    function blogreviewCall(Request $request)
    {
        $exists=DB::select("SELECT count(*) AS count FROM blog_reviews WHERE user_id=? AND blog_id=?",[Auth::id(),$request->blog_id])[0]->count;
        if($exists==1)
        {
            DB::statement("
            UPDATE blog_reviews
            SET 
                user_id=?,
                blog_id=?,
                rating=?,
                comment=?,
                active=?
            WHERE blog_id=? AND user_id=?",           
            [
                Auth::id(),
                $request->input('blog_id'),
                $request->input('rating'),
                $request->input('comment'),
                1,
                $request->input('blog_id'),
                Auth::id()
            ]
            );
        }
        else
        {
            DB::statement("
            INSERT INTO blog_reviews (user_id, blog_id, rating, comment, active)
            VALUES (?, ?, ?, ?, ?)",
            [
                Auth::id(),
                $request->input('blog_id'),
                $request->input('rating'),
                $request->input('comment'),
                1
            ]
            );
        }
        return redirect()->route('blog',['blog_id'=>$request->blog_id]);
    }
}
