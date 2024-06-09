<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            account_type INT NOT NULL,
            username VARCHAR(255) NOT NULL UNIQUE,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            contact_no VARCHAR(255) NOT NULL,
            active BOOLEAN NOT NULL,
            remember_token VARCHAR(255)      
            );"
            );
            //acount_type->0 for customer,1 for seller, 2 for writer , 3 for manager

        //...............................
        DB::statement("
            CREATE TABLE IF NOT EXISTS documents(
            user_id INT NOT NULL,
            image MEDIUMBLOB NOT NULL,
            verified BOOLEAN NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id)
            );"
            );
        //...............................
        DB::statement("
            CREATE TABLE IF NOT EXISTS shipment_methods (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL
            );"
        );
        //................................
        DB::statement("
            CREATE TABLE IF NOT EXISTS categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL UNIQUE
            );"
        );
        //...............................
        DB::statement("
            CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            seller_id INT NOT NULL,
            name VARCHAR(255) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            image MEDIUMBLOB NOT NULL,
            description VARCHAR(255) NOT NULL,
            category_id INT NOT NULL,
            availability BOOLEAN NOT NULL,
            active BOOLEAN NOT NULL,
            shipment_method_id INT NOT NULL,
            FOREIGN KEY (seller_id) REFERENCES users(id),
            FOREIGN KEY (category_id) REFERENCES categories(id),
            FOREIGN KEY (shipment_method_id) REFERENCES shipment_methods(id)
            );"
        ); 
        //...............................
        DB::statement("
        CREATE TABLE IF NOT EXISTS cart_records(
        product_id INT NOT NULL,
        customer_id INT NOT NULL,
        count INT NOT NULL,
        FOREIGN KEY (product_id) REFERENCES products(id),
        FOREIGN KEY (customer_id) REFERENCES users(id)
        );"
        );   
        //...............................
        DB::statement("
        CREATE TABLE addresses (
            id INT AUTO_INCREMENT PRIMARY KEY,
            location VARCHAR(255) NOT NULL,
            customer_id INT NOT NULL,
            FOREIGN KEY (customer_id) REFERENCES users(id)
        );
        ");
        //................................
        DB::statement("
        CREATE TABLE blogs (
            id INT AUTO_INCREMENT PRIMARY KEY,
            writer_id INT NOT NULL,
            title VARCHAR(255) NOT NULL,
            image MEDIUMBLOB NOT NULL,
            description TEXT NOT NULL,
            publish_date DATE NOT NULL,
            active BOOLEAN NOT NULL,
            FOREIGN KEY (writer_id) REFERENCES users(id)
        );
        ");
        //.................................
        DB::statement("
        CREATE TABLE orders (
            id INT AUTO_INCREMENT PRIMARY KEY,
            customer_id INT NOT NULL,
            amount INT NOT NULL,
            address VARCHAR(255) NOT NULL,
            order_date DATE NOT NULL,
            FOREIGN KEY (customer_id) REFERENCES users(id)
        );
        ");
        //...................................
        DB::statement("
        CREATE TABLE order_records (
            id INT AUTO_INCREMENT PRIMARY KEY,
            order_id INT NOT NULL,
            product_id INT NOT NULL,    
            count INT NOT NULL, 
            shipment_status INT NOT NULL,
            FOREIGN KEY (order_id) REFERENCES orders(id),
            FOREIGN KEY (product_id) REFERENCES products(id)
            
        );
        ");
        //.....................................
        DB::statement("
        CREATE TABLE product_reviews(
            id INT AUTO_INCREMENT PRIMARY KEY,
            customer_id INT NOT NULL,  
            product_id INT NOT NULL,   
            rating INT NOT NULL, 
            comment VARCHAR(255) NOT NULL,
            active BOOLEAN NOT NULL,
            FOREIGN KEY (customer_id) REFERENCES users(id), 
            FOREIGN KEY (product_id) REFERENCES products(id)
        );
        ");
        //.....................................
        DB::statement("
        CREATE TABLE blog_reviews(
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,  
            blog_id INT NOT NULL,   
            rating INT NOT NULL, 
            comment VARCHAR(255) NOT NULL,
            active BOOLEAN NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id), 
            FOREIGN KEY (blog_id) REFERENCES blogs(id)
        );
        ");
        //...............................
        DB::statement("
        CREATE TABLE IF NOT EXISTS wish_list_records(
        product_id INT NOT NULL,
        customer_id INT NOT NULL,
        FOREIGN KEY (product_id) REFERENCES products(id),
        FOREIGN KEY (customer_id) REFERENCES users(id)
        );"
        ); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wish_list_records');
        Schema::dropIfExists('product_reviews');
        Schema::dropIfExists('blog_reviews');
        Schema::dropIfExists('order_records');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('cart_records');    
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');   
        Schema::dropIfExists('shipment_methods');
        Schema::dropIfExists('documents');         
        Schema::dropIfExists('addresses');   
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('users');   
         
    }
};
