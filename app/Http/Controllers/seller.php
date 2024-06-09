<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class seller extends Controller
{
    function productlistingCall(Request $request)
    {
        
        DB::statement("
        INSERT INTO products (seller_id,name, price,image,description,category_id,instock,active,shipment_method_id) 
        VALUES (?, ?, ? , ? , ? , ? , ?, ? , ?)
        ", 
        [
        Auth::id(),
        $request->input('name'), 
        $request->input('price'),
        file_get_contents($request->file('image')),
        $request->input('description'),
        $request->input('category'),
        $request->input('instock'),
        True,
        $request->input('shipment_method'),
        ]
        );
        return redirect()->route('productlistingform');
    }
    function productinformationformCall(Request $request)
    {
        if ($request->hasFile('image'))
        {
            DB::statement("
            UPDATE products
            SET name =?,
                price=?,
                image=?,
                category_id=?,
                shipment_method_id=?,
                instock=?
            WHERE id=?
            ",
            [
                $request->input('name'), 
                $request->input('price'), 
                file_get_contents($request->file('image')), 
                $request->input('category'), 
                $request->input('shipment_method'), 
                $request->input('instock'),
                $request->input('product_id'), 
                
            ]
            );
        }
        else
        {
            DB::statement("
            UPDATE products
            SET name =?,
                price=?,
                category_id=?,
                shipment_method_id=?,
                instock=?
            WHERE id=?
            ",
            [
                $request->input('name'), 
                $request->input('price'), 
                $request->input('category'), 
                $request->input('shipment_method'),
                $request->input('instock'),
                $request->input('product_id'),
                
            ]
            );
        }
        
        return back();
    }
    function updateorderrequestshipmentstatus(Request $request)
    {
        DB::statement("UPDATE order_records SET shipment_status=shipment_status+1 WHERE id=?",[$request->orderrequestid]);
        return back();
    }
}
