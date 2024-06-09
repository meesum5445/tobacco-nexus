<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class customer extends Controller
{
    function addtocart(Request $request)
    {
        $exists=DB::select("SELECT COUNT(*) AS count FROM cart_records WHERE product_id=? AND customer_id=?;",[$request->product_id,Auth::id()])[0]->count;
        if($exists==1)
        {
            DB::statement("UPDATE cart_records SET count=count+1 WHERE product_id=? AND customer_id=?;",[$request->product_id,Auth::id()]);
        }
        else
        {
            DB::statement("
            INSERT INTO cart_records (product_id, customer_id, count) 
            VALUES (?, ?, ?);
            ", [
                $request->product_id, 
                Auth::id(),
                1
            ]);
        }
        return back();
    }
    function removefromcart(Request $request)
    {
        $count=DB::select("SELECT count FROM cart_records WHERE product_id=? AND customer_id=?;",[$request->product_id,Auth::id()])[0]->count;
        if($count==1)
        {
            DB::statement("
            DELETE FROM cart_records
            WHERE product_id =? AND customer_id=?
            ", [
                $request->product_id, 
                Auth::id()
            ]);
        }
        else
        {
            DB::statement("UPDATE cart_records SET count=count-1 WHERE product_id=? AND customer_id=?;",[$request->product_id,Auth::id()]);
        }
        return back();
    }
    function addtowishlist(Request $request)
    {
        $exists=DB::select("SELECT COUNT(*) AS count FROM wish_list_records WHERE product_id=? AND customer_id=?;",[$request->product_id,Auth::id()])[0]->count;
        if($exists==0)
        {
            DB::statement("
            INSERT INTO wish_list_records (product_id, customer_id) 
            VALUES (?, ?);
            ", [
                $request->product_id, 
                Auth::id(),
            ]);
        }
        return back();
    }
    function removefromwishlist(Request $request)
    {
        DB::statement("
        DELETE FROM wish_list_records
        WHERE product_id =? AND customer_id=?
        ", [
            $request->product_id, 
            Auth::id()
        ]);
        return back();
    }
    function placeorderCall(Request $request)
    {
        $productsincartfromdb=DB::select("
        SELECT products.id,products.name,products.price,cart_records.count
        FROM cart_records
        JOIN products ON cart_records.product_id = products.id
        WHERE cart_records.customer_id = ?;",
        [
            Auth::id()
        ]
        );
        $totalamount = 0;
        foreach ($productsincartfromdb as $product) {
            $totalamount += $product->price * $product->count;
        }
        if($totalamount==0)
            return back();
        $addressofuser=DB::select("
        SELECT location FROM addresses
        WHERE customer_id=?",
        [
            Auth::id()
        ]
        );
        DB::statement("
        INSERT INTO orders (customer_id, amount, address,order_date) 
        VALUES(?,?,?,?)",
        [
            Auth::id(),
            $totalamount,
            $addressofuser[0]->location,
            date('Y-m-d'),
        ]
        );
        //................
        $lastinsertedorder=DB::select("SELECT * FROM orders ORDER BY id DESC LIMIT 1;");
        //................
        foreach ($productsincartfromdb as $product) {
            DB::statement("
            INSERT INTO order_records (order_id,product_id,count,shipment_status)
            VALUES(?,?,?,?)",
            [
                $lastinsertedorder[0]->id,
                $product->id,
                $product->count,
                0
            ]
            );
        }        
        DB::statement("
        DELETE FROM cart_records
        WHERE cart_records.customer_id=?;",
        [
            Auth::id()
        ]
        );
        foreach ($productsincartfromdb as $product) {
            DB::statement("
            UPDATE products
            SET instock=instock-?
            WHERE id=?",
            [
                $product->count,
                $product->id
            ]
            );
        }      
        DB::statement("
        UPDATE cart_records
        JOIN products ON products.id = cart_records.product_id
        SET cart_records.count = products.instock
        WHERE cart_records.count > products.instock;
        ");
        DB::statement("
        DELETE FROM cart_records
        WHERE cart_records.count=0;"
        );
        return redirect()->route('order',['order_id'=>$lastinsertedorder[0]->id]);
    }
    function productreviewCall(Request $request)
    {
        
        $exists=DB::select("SELECT count(*) AS count FROM product_reviews WHERE customer_id=? AND product_id=?",[Auth::id(),$request->product_id])[0]->count;
        if($exists==1)
        {
            DB::statement("
            UPDATE product_reviews
            SET 
                customer_id=?,
                product_id=?,
                rating=?,
                comment=?,
                active=?
            WHERE product_id=? AND customer_id=?",
            [
                Auth::id(),
                $request->product_id,
                $request->rating,
                $request->comment,
                1,
                $request->product_id,
                Auth::id()
            ]
            );
        }
        else
        {
            DB::statement("
            INSERT INTO product_reviews (customer_id, product_id, rating, comment, active)
            VALUES (?, ?, ?, ?, ?)",
            [
                Auth::id(),
                $request->product_id,
                $request->rating,
                $request->comment,
                1
            ]
            );
        }
        
        return redirect()->route('product',['product_id'=>$request->product_id]);

    }
}