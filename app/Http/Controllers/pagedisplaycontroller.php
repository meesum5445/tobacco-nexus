<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class pagedisplaycontroller extends Controller
{
    function displayhomepage(Request $request)
    {
        $top3products=DB::select("SELECT p.*, avg_reviews.average_rating
        FROM products p
        INNER JOIN (
            SELECT product_id, AVG(rating) AS average_rating
            FROM product_reviews
            WHERE active = true
            GROUP BY product_id
            ORDER BY average_rating DESC
            LIMIT 3
        ) AS avg_reviews ON p.id = avg_reviews.product_id;
        ");

        $top3blogs=DB::select("SELECT b.*, avg_reviews.average_rating
        FROM blogs b
        INNER JOIN (
            SELECT blog_id, AVG(rating) AS average_rating
            FROM blog_reviews
            WHERE active = true
            GROUP BY blog_id
            ORDER BY average_rating DESC
            LIMIT 3
        ) AS avg_reviews ON b.id = avg_reviews.blog_id;
        ");
        return view('home',['top3productspassedtoview'=>$top3products,'top3blogspassedtoview'=>$top3blogs]);
    }
    function displaysignuppage(Request $request)
    {
        return view('signup');
    }
    function displayloginpage(Request $request)
    {
        return view('login');
    }
    function displayproductlistingform(Request $request)
    {
        $listofshippingmethodsfromdb=DB::select("
        SELECT * FROM shipment_methods;
        ");
        $listofcategoriesfromdb=DB::select("
        SELECT * FROM categories; 
        ");
        return view('productlistingform',['listofshippingmethodspassedtoview'=>$listofshippingmethodsfromdb,'listofcategoriespassedtoview'=>$listofcategoriesfromdb]);
    }
    function displayproducts(Request $request)
    {

        if(empty($request->category))
        {
            $listofallproductsfromdb = DB::select("
            SELECT products.*, categories.name as category_name
            FROM products
            INNER JOIN categories ON products.category_id = categories.id
            WHERE products.active=true;
            ");
        }       
        else
        {
            $listofallproductsfromdb = DB::select("
            SELECT products.*, categories.name as category_name
            FROM products
            INNER JOIN categories ON products.category_id = categories.id
            WHERE products.category_id IN (" . implode(',', $request->category) . ") AND products.active=true;
            ");
        }
        $listofallcategoriesfromdb=DB::select("
            SELECT * from categories;
        ");
        return view('products',['listofproductspassedtoview'=>$listofallproductsfromdb,'listofallcategoriespassedtoview'=>$listofallcategoriesfromdb]);
    }
    function displayaproduct(Request $request)
    {
        $productfromdb=DB::select("
        SELECT products.*,shipment_methods.name AS shipment_method_name FROM products
        inner join shipment_methods on shipment_methods.id =products.shipment_method_id
        WHERE products.id = ?;",
        [
            $request->product_id
        ]
        );
        if($productfromdb[0]->active==0)
            return redirect()->route('products');
        $categoryfromdb=DB::select("
        SELECT * FROM categories
        WHERE id=?;",
        [
            $productfromdb[0]->category_id
        ]
        );
        $reviewsofproductfromdb=DB::select("
        SELECT * FROM product_reviews 
        WHERE product_id=?",
        [
            $request->product_id
        ]);
        $countincart=DB::select("SELECT count from cart_records WHERE customer_id=? AND product_id=?",[Auth::id(),$request->product_id]);
        $countincart=count($countincart)==0?0:$countincart[0]->count;
        $ratingofproduct=DB::select("SELECT AVG(rating) AS average_rating FROM product_reviews WHERE product_id = ? AND active = true;",[$request->product_id])[0]->average_rating;
        $isinwishlist=DB::select("SELECT CASE WHEN EXISTS (SELECT 1 FROM wish_list_records WHERE product_id = ? AND customer_id=?) THEN 1 ELSE 0 END AS record_exists;",[$request->product_id,Auth::id()])[0]->record_exists;
        return view('product',['productpassedtoview'=>$productfromdb[0],'categorypassedtoview'=>$categoryfromdb[0],'reviewsofproductpassedtoview'=>$reviewsofproductfromdb,'ratingofproductpassedtoview'=>$ratingofproduct,'countincartpassedtoview'=>$countincart,'presentinwishlist'=>$isinwishlist]);
    }
    function displayprofile(Request $request)
    {
        if(Auth::user()->account_type==1)       //because 0 for customer and 1 for seller
        {
            $count=DB::select("SELECT COUNT(*) AS count FROM documents WHERE user_id=?;",[Auth::id()])[0]->count;
            if($count==0)
                return view('documentsubmission');

            $validated=DB::select("SELECT verified FROM documents WHERE user_id=?;",[Auth::id()])[0]->verified;
            if(!$validated)
                return view('extraviews/waitforvalidation');
        }
        if(Auth::user()->account_type==0)
        {
            $count=DB::select("SELECT COUNT(*) AS count FROM addresses WHERE customer_id=?;",[Auth::id()])[0]->count;
                if($count==0)
                    return view('addresssubmission');

            $count=DB::select("SELECT COUNT(*) AS count FROM documents WHERE user_id=?;",[Auth::id()])[0]->count;
            if($count==0)
                return view('documentsubmission');

            $validated=DB::select("SELECT verified FROM documents WHERE user_id=?;",[Auth::id()])[0]->verified;
            if(!$validated)
                return view('extraviews/waitforvalidation');

            $addressofuserfromdb=DB::SELECT("
                SELECT * FROM addresses WHERE customer_id=?;
            ",
            [
                Auth::id()
            ]);
            return view('profile',['addressofcustomerpassedtoview'=>$addressofuserfromdb[0]]); 
        }
        return view('profile'); 
    }
    function displayprofileinformationform(Request $request)
    {
        $userfromdb = DB::select("
            SELECT users.*, addresses.location
            FROM users
            LEFT JOIN addresses ON users.id = addresses.customer_id
            WHERE users.id = ?;",
            [
                Auth::id()
            ]
        );
        return view('profileinformationform',['userpassedtoview'=>$userfromdb[0]]);
    }
    function displaymyproducts(Request $request)
    {
        if(Auth::user()->account_type==1)
        {
            $productsfromdb=DB::select("
            SELECT * FROM products
            WHERE seller_id=?;",
            [
                Auth::id()
            ]
            );
            return view('myproducts',['productspassedtoview'=>$productsfromdb]);
        }
        return redirect()->route('home');
    }
    function displayproductinformationform(Request $request)
    {
        $productfromdb=DB::select("
        SELECT * FROM products
        WHERE id=?;",
        [
            $request->product_id
        ]
        );
        $listofshippingmethodsfromdb=DB::select("
        SELECT * FROM shipment_methods;
        ");
        $listofcategoriesfromdb=DB::select("
        SELECT * FROM categories;
        ");
        return view('productinformationform',['productpassedtoview'=>$productfromdb[0],'listofshipment_methodspassedtoview'=>$listofshippingmethodsfromdb,'listofcategoriespassedtoview'=>$listofcategoriesfromdb]);
    }
    function displayblogpublishingform(Request $request)
    {
        return view('blogpublishingform');
    }
    function displayblogs(Request $request)
    {
        $blogsfromdb = DB::select("
            SELECT blogs.*, users.username AS writer_name 
            FROM blogs
            JOIN users ON blogs.writer_id = users.id
        ");
        return view('blogs',['blogspassedtoview'=>$blogsfromdb]);
    }
    function displayablog(Request $request)
    {
        $blogfromdb=DB::select("
        SELECT blogs.*, users.username AS writer_name 
        FROM blogs
        JOIN users ON blogs.writer_id = users.id
        WHERE blogs.id=?;",
        [
            $request->blog_id
        ]
        );
        $reviewsofblogfromdb=DB::select("
        SELECT * FROM blog_reviews 
        WHERE blog_id=?",
        [
            $request->blog_id
        ]);
        return view('blog',['blogpassedtoview'=>$blogfromdb[0],'reviewsofblogpassedtoview'=>$reviewsofblogfromdb]);
    }
    function displaymyblogs(Request $request)
    {
        if(Auth::user()->account_type==2)
        {
            $blogsfromdb=DB::select("
            SELECT blogs.*, users.username AS writer_name 
            FROM blogs
            JOIN users ON blogs.writer_id = users.id
            WHERE blogs.writer_id=?;",
            [
                Auth::id()
            ]
            );
            return view('myblogs',['blogspassedtoview'=>$blogsfromdb]);
        }
        return redirect()->route('home');
    }
    function displaymybloginformationform(Request $request)
    {
        $blogfromdb=DB::select("
        SELECT * FROM blogs
        WHERE id=?;",
        [
            $request->blog_id
        ]
        );
        return view('mybloginformationform',['blogpassedtoview'=>$blogfromdb[0]]);
    }
    function displaycart(Request $request)
    {
        $count=DB::select("SELECT count(*) AS count FROM documents WHERE user_id=?;",[Auth::id()])[0]->count;
        if($count==0)
            return redirect()->route('profile');
        $validated=DB::select("SELECT verified FROM documents WHERE user_id=?;",[Auth::id()])[0]->verified;
        if(!$validated)
            return redirect()->route('profile');
        $productsincartfromdb=DB::select("
        SELECT products.*,cart_records.count
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
        return view('cart',['productsincartpassedtoview'=>$productsincartfromdb,'total_amount'=>$totalamount]);
    }
    function displayorder(Request $request)
    {
        
        $productsinorderfromdb=DB::select("
        SELECT * FROM order_records
        INNER JOIN products on products.id=order_records.product_id
        WHERE order_id=?;",
        [
            $request->order_id
        ]
        );  
        $orderfromdb=DB::select("SELECT * FROM orders WHERE orders.id=?",[$request->order_id]);
        return view('order',['orderpassedtoview'=>$orderfromdb[0],'productsinorderpassedtoview'=>$productsinorderfromdb]);
    }
    function displaymyorders(Request $request)
    {
        $orderofuserfromdb=DB::select("SELECT * FROM orders WHERE customer_id=? ORDER BY id DESC",[Auth::id()]);
        return view('myorders',['ordersofuserpassedtoview'=>$orderofuserfromdb]);
    }
    function displaymyorderrequests(Request $request)
    {
        $orderrequestsfromdb=DB::select("
        SELECT order_records.id,order_records.count,order_records.shipment_status,products.name,products.price,orders.address
        FROM order_records
        INNER JOIN products on products.id=order_records.product_id
        INNER JOIN orders on orders.id=order_records.order_id
        WHERE products.seller_id=?;",
        [
            Auth::id()
        ]);
        return view('myorderrequests',['orderrequestspassedtoview'=>$orderrequestsfromdb]);
    }
    function displaywishlist(Request $request)
    {
        $productsinwishlistfromdb=DB::select("
        SELECT products.*
        FROM products
        JOIN wish_list_records ON wish_list_records.product_id = products.id
        WHERE wish_list_records.customer_id = ?;",
        [
            Auth::id()
        ]
        );
        return view('wishlist',['listofproductsinwishlist'=>$productsinwishlistfromdb]);
    }
    function displaydocuments(Request $request)
    {
        $documentsfromdb=DB::select("
        SELECT documents.*,users.*
        FROM documents
        JOIN users ON users.id = documents.user_id
        where documents.verified=0
        order by verified
        ");
        return view('documents',['documentspassedtoview'=>$documentsfromdb]);
    }
}
