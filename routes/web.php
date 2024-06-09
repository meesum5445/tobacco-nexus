<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\pagedisplaycontroller::class,'displayhomepage'])-> name('home');
Route::get('/signup', [\App\Http\Controllers\pagedisplaycontroller::class,'displaysignuppage'])-> name('signup');
Route::get('/login', [\App\Http\Controllers\pagedisplaycontroller::class,'displayloginpage'])-> name('login');
Route::get('/products', [\App\Http\Controllers\pagedisplaycontroller::class,'displayproducts'])-> name('products');
Route::get('/product/{product_id}', [\App\Http\Controllers\pagedisplaycontroller::class,'displayaproduct'])-> name('product');
Route::get('/blogs',[\App\Http\Controllers\pagedisplaycontroller::class,'displayblogs'])-> name('blogs');
Route::get('/blog/{blog_id}', [\App\Http\Controllers\pagedisplaycontroller::class,'displayablog'])-> name('blog');
Route::post('/signupCall',[\App\Http\Controllers\authenticate::class,'signupCall'])-> name('signupCall');
Route::post('/loginCall',[\App\Http\Controllers\authenticate::class,'loginCall'])-> name('loginCall');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/logoutCall',[\App\Http\Controllers\authenticate::class,'logoutCall'])-> name('logoutCall');

    Route::post('/addresssubmissionCall',[\App\Http\Controllers\authenticate::class,'addresssubmissionCall'])-> name('addresssubmissionCall');
    Route::post('/documentsubmissionCall',[\App\Http\Controllers\authenticate::class,'documentsubmissionCall'])-> name('documentsubmissionCall');
    Route::get('/documents', [\App\Http\Controllers\pagedisplaycontroller::class,'displaydocuments'])-> name('documents');
    Route::post('/verifydocument',[\App\Http\Controllers\manager::class,'verifydocumentCall'])-> name('verifydocument');

    Route::get('/productlistingform', [\App\Http\Controllers\pagedisplaycontroller::class,'displayproductlistingform'])-> name('productlistingform');
    Route::post('/productlistingCall',[\App\Http\Controllers\seller::class,'productlistingCall'])-> name('productlistingCall');
    Route::get('/productinformationform',[\App\Http\Controllers\pagedisplaycontroller::class,'displayproductinformationform'])-> name('productinformationform');
    Route::post('/productinformationformCall',[\App\Http\Controllers\seller::class,'productinformationformCall'])-> name('productinformationformCall');
    Route::get('/myproducts',[\App\Http\Controllers\pagedisplaycontroller::class,'displaymyproducts'])-> name('myproducts');
    Route::post('/productreview',[\App\Http\Controllers\customer::class,'productreviewCall'])-> name('productreview');

    Route::post('/addtocart',[\App\Http\Controllers\customer::class,'addtocart'])-> name('addtocart');
    Route::post('/removefromcart',[\App\Http\Controllers\customer::class,'removefromcart'])-> name('removefromcart');
    Route::get('/cart',[\App\Http\Controllers\pagedisplaycontroller::class,'displaycart'])-> name('cart');

    Route::get('/wishlist',[\App\Http\Controllers\pagedisplaycontroller::class,'displaywishlist'])-> name('wishlist');
    Route::post('/addtowishlist',[\App\Http\Controllers\customer::class,'addtowishlist'])-> name('addtowishlist');
    Route::post('/removefromwishlist',[\App\Http\Controllers\customer::class,'removefromwishlist'])-> name('removefromwishlist');

    Route::post('/placeorderCall',[\App\Http\Controllers\customer::class,'placeorderCall'])-> name('placeorderCall');
    Route::get('/order',[\App\Http\Controllers\pagedisplaycontroller::class,'displayorder'])-> name('order');
    Route::get('/myorders',[\App\Http\Controllers\pagedisplaycontroller::class,'displaymyorders'])-> name('myorders');
    Route::get('/myorderrequests',[\App\Http\Controllers\pagedisplaycontroller::class,'displaymyorderrequests'])-> name('myorderrequests');
    Route::post('/updateorderrequestshipmentstatus',[\App\Http\Controllers\seller::class,'updateorderrequestshipmentstatus'])-> name('updateorderrequestshipmentstatus');

    Route::get('/profile', [\App\Http\Controllers\pagedisplaycontroller::class,'displayprofile'])-> name('profile');
    Route::get('/profileinformationform',[\App\Http\Controllers\pagedisplaycontroller::class,'displayprofileinformationform'])-> name('profileinformationform');
    Route::post('/profileinformationformCall',[\App\Http\Controllers\profilehandler::class,'profileinformationformCall'])-> name('profileinformationformCall');
    Route::post('/profilepasswordformCall',[\App\Http\Controllers\profilehandler::class,'profilepasswordformCall'])-> name('profilepasswordformCall');
    
      
    Route::get('/blogpublishingform', [\App\Http\Controllers\pagedisplaycontroller::class,'displayblogpublishingform'])-> name('blogpublishingform');
    Route::post('/blogpublishingformCall', [\App\Http\Controllers\writer::class,'blogpublishingformCall'])-> name('blogpublishingformCall');
    Route::get('/myblogs',[\App\Http\Controllers\pagedisplaycontroller::class,'displaymyblogs'])-> name('myblogs');
    Route::get('/mybloginformationform',[\App\Http\Controllers\pagedisplaycontroller::class,'displaymybloginformationform'])-> name('mybloginformationform');
    Route::post('/mybloginformationformCall',[\App\Http\Controllers\writer::class,'mybloginformationformCall'])-> name('mybloginformationformCall');

    Route::post('/blogreview', [\App\Http\Controllers\user::class,'blogreviewCall'])-> name('blogreview');
    

});




