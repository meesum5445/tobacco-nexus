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
        INSERT INTO users ( account_type, username, email, password, contact_no, active) VALUES
        (0, 'user1', 'user1@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '1234567890', true),
        (1, 'user2', 'user2@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '9876543210', true),
        ( 2, 'user3', 'user3@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '5555555555', true),
        ( 3, 'user4', 'user4@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '4444444444', true),
        ( 0, 'user5', 'user5@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '1111111111', true),
        ( 1, 'user6', 'user6@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '2222222222', true),
        ( 2, 'user7', 'user7@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '3333333333', true),
        ( 3, 'user8', 'user8@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '6666666666', true),
        ( 0, 'user9', 'user9@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '7777777777', true),
        ( 1, 'user10', 'user10@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '8888888888', true),
        ( 2, 'user11', 'user11@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '9999999999', true),
        ( 3, 'user12', 'user12@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '0000000000', true),
        ( 0, 'user13', 'user13@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '1231231234', true),
        ( 1, 'user14', 'user14@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '4564564567', true),
        ( 2, 'user15', 'user15@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '7897897890', true),
        ( 3, 'user16', 'user16@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '1112223334', true),
        ( 0, 'user17', 'user17@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '4445556667', true),
        ( 1, 'user18', 'user18@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '7778889990', true),
        ( 2, 'user19', 'user19@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '1114447770', true),
        ( 3, 'user20', 'user20@gmail.com', '$2y$12\$tZsI.WC/cT4OXr6yBv6TLu7vejuYhQgvOF2qKutHzFvEC8ahlbkU.', '2225558881', true);
        ");
        DB::statement("
        INSERT INTO documents (image, verified, user_id) VALUES
        (LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/123.png'), true, 1),
        (LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/123.png'), true, 2),
        (LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/123.png'), true, 5),
        (LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/123.png'), true, 6),
        (LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/123.png'), true, 9),
        (LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/123.png'), true, 10),
        (LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/123.png'), true, 13),
        (LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/123.png'), true, 14),
        (LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/123.png'), true, 17),
        (LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/123.png'), true, 18);
        ");
        DB::statement("
        INSERT INTO addresses (location, customer_id) VALUES
        ('Karachi', 1),
        ('Lahore', 5),
        ('Islamabad', 9),
        ('Rawalpindi', 13),
        ('Faisalabad', 17),
        ('Peshawar', 1),
        ('Quetta', 5),
        ('Multan', 9),
        ('Sialkot', 13),
        ('Gujranwala', 17);
        ");
        DB::statement("INSERT INTO shipment_methods (name) VALUES ('TCS'),('CHEETAH'),('POST')");
        DB::statement("INSERT INTO categories ( name) VALUES
        ('vape'),
        ('pod'),
        ('mod'),
        ('pen'),
        ('flavours'),
        ('cigar'),
        ('Cigarette'),
        ('hookah'),
        ('nicotine pouch');");
        DB::statement("
        INSERT INTO products (seller_id, name, price, image, description, category_id, availability, active, shipment_method_id) 
        VALUES
        (2, 'STRIO CARTBOX PRO 510 BATTERY', 40, LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/strio_cartbox_pro_510_battery_-_default_png.webp'), 'STRIO Cartbox Pro 510 Battery, featuring a discreet carry design, an integrated 1000mAh battery, variable voltage ranging from 2.4-3.8V, and LED screen, and compatibility with up to 2G carts.', 1, true, true, 1),
        (6, 'LOFE DOUBLE FUNCTION NINJA SYSTEM', 60, LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/lofe_ninja_pod_system_-_default_png.webp'), 'The Lofe Double Function Ninja System, featuring a double-function vape device that can utilize refillable pods or a 510 threaded cartridge.', 2, true, true, 1),
        (10, 'HUNI BADGER PRO', 80, LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/huni_badger_pro_-_default_png.webp'), 'Discover the Huni Badger Pro Electric Dab Straw: precision engineering, versatile temperature control, USB-C charging, and a sleek digital display—all in one compact and portable device.', 3, true, true, 1),
        ( 14, 'Uwell Dillon EM 25W Pod System', 45, LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/WhatsApp Image 2024-05-21 at 00.30.07_313b9eda.jpg'), 'Uwell Dillon EM 25W Pod System', 4, true, true, 1),
        ( 18, 'YOCAN DYNO', 70, LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/yocan_dyno_-_default.png'), 'Shop the Yocan Dyno, a concentrate nectar collector vaporizer with water filtration, magnetic ceramic heating tip, and adjustable voltage to properly vaporize your favorite concentrates.', 5, true, true, 1),
        ( 2, 'HAMILTON DEVICES GAMER 510 BATTERY', 55, LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/hamilton_devices_gamer_510_battery_-_deafult_png.webp'), 'Check out the Hamilton Devices Gamer 510 Battery, offering an extendable and retractable lanyard attachment system, variable voltage output, and perfect for threaded 510 carts.', 1, true, true, 1),
        ( 6, 'DAZZLEAF DAZZII BAR 510 BATTERY', 35, LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/dazzleaf_dazzii_bar_510_battery_-_default_png.webp'), 'Discover the DAZZLEAF DAZZii BAR 510 Battery, featuring a 450mAh rechargeable battery, 2.4-4.2V of variable voltage, and a 1.8V preheating function that primes the cart for 15 seconds.', 1, true, true, 1),
        ( 10, 'OZUNA INSTA PUFF 15000 DISPOSABLE', 25, LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/ozuna_insta_puff_15000_disposable_-_default_png.webp'), 'Check out the Ozuna Insta Puff 15000 Disposable, featuring two firing modes, a 15000 puff regular mode, 10000 puff strong mode, e-liquid and battery life indicator lights, and a digital display with 18mL prefilled capacity.', 1, true, true, 1),
        ( 14, 'LUCKY WOLF LEGEND 25K DISPOSABLE', 30, LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/lucky_wolf_legend_25k_disposable_-_default_png.webp'), 'Check out the Lucky Wolf Legend 25K Disposable, featuring three firing modes, 0.45ohm dual mesh coils, a 3.8 digital display, and active e-liquid and battery life monitoring.', 1, true, true, 1),
        ( 18, 'SMOK NORD GT 80W POD SYSTEM', 75, LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/smok_nord_gt_80w_pod_system_-_default_1.png'), 'Check out the SMOK Nord GT 80W Pod System, offering an integrated 2500mAh battery, 5-80W output range, and compatibility with the SMOK RPM 3 Coils.', 2, true, true, 1);
        ");
        DB::statement("
        INSERT INTO blogs (id, writer_id, title, image, description, publish_date, active) VALUES
(1, 3, 'History of Tobacco', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog1.jpg'), 'An in-depth look into the history of tobacco.', '2024-05-01', true),
(2, 7, 'Health Risks of Smoking', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog2.jpg'), 'Examining the various health risks associated with smoking tobacco.', '2024-05-02', true),
(3, 11, 'Tobacco in Popular Culture', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog2.jpg'), 'How tobacco has been portrayed in movies and media.', '2024-05-03', true),
(4, 15, 'The Economics of Tobacco', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog6.jpg'), 'A look at the economic impact of the tobacco industry.', '2024-05-04', true),
(5, 19, 'Quitting Smoking', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog3.jpeg'), 'Tips and strategies for quitting smoking.', '2024-05-05', true),
(6, 3, 'Secondhand Smoke', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog6.jpg'), 'Understanding the effects of secondhand smoke on non-smokers.', '2024-05-06', true),
(7, 7, 'Tobacco Advertising', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog1.jpg'), 'The history and impact of tobacco advertising.', '2024-05-07', true),
(8, 11, 'E-Cigarettes vs Traditional Cigarettes', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog2.jpg'), 'Comparing the health impacts of e-cigarettes and traditional cigarettes.', '2024-05-08', true),
(9, 15, 'Tobacco Farming', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog2.jpg'), 'An overview of tobacco farming practices and challenges.', '2024-05-09', true),
(10, 19, 'Tobacco Regulations', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog5.jpeg'), 'A look at the laws and regulations governing tobacco use.', '2024-05-10', true),
(11, 3, 'Youth and Tobacco', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog6.jpg'), 'The impact of tobacco use on young people.', '2024-05-11', true),
(12, 7, 'The Role of Menthol in Tobacco Products', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog1.jpg'), 'Exploring the use of menthol in tobacco products.', '2024-05-12', true),
(13, 11, 'Tobacco and Mental Health', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog2.jpg'), 'The connection between tobacco use and mental health issues.', '2024-05-13', true),
(14, 15, 'Tobacco Harm Reduction', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog2.jpg'), 'Strategies for reducing the harm caused by tobacco use.', '2024-05-14', true),
(15, 19, 'The Future of Tobacco', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog5.jpeg'), 'Speculations on the future trends in tobacco use and regulation.', '2024-05-15', true),
(16, 3, 'Tobacco and the Environment', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog6.jpg'), 'The environmental impact of tobacco production and consumption.', '2024-05-16', true),
(17, 7, 'Tobacco Taxation', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog1.jpg'), 'How taxation affects tobacco consumption and public health.', '2024-05-17', true),
(18, 11, 'Smoking Cessation Programs', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog2.jpg'), 'An overview of programs designed to help people quit smoking.', '2024-05-18', true),
(19, 15, 'Tobacco and Society', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog2.jpg'), 'How tobacco use has shaped societies around the world.', '2024-05-19', true),
(20, 19, 'The Chemistry of Tobacco', LOAD_FILE('D:/DB/tobacco-nexus/resources/myImages/myimages/blog6.jpg'), 'Understanding the chemical compounds found in tobacco.', '2024-05-20', true);
        ");
        DB::statement("
        INSERT INTO blog_reviews (id, user_id, blog_id, rating, comment, active) VALUES
(1, 1, 1, 5, 'Excellent article on the history of tobacco!', true),
(2, 2, 2, 4, 'Very informative about health risks.', true),
(3, 3, 9, 3, 'Interesting read on popular culture.', true),
(4, 5, 4, 4, 'Good insights into the economics of tobacco.', true),
(5, 6, 5, 5, 'Helpful tips for quitting smoking.', true),
(6, 7, 6, 3, 'Useful information on secondhand smoke.', true),
(7, 9, 1, 4, 'Nice overview of tobacco advertising.', true),
(8, 10, 8, 2, 'Could use more details on e-cigarettes.', true),
(9, 11, 9, 5, 'Great piece on tobacco farming.', true),
(10, 13, 10, 4, 'Informative discussion on regulations.', true),
(11, 14, 2, 3, 'Decent analysis of youth and tobacco.', true),
(12, 15, 12, 4, 'Well-written article on menthol in tobacco.', true),
(13, 17, 13, 2, 'Could be more detailed on mental health impacts.', true),
(14, 18, 14, 5, 'Excellent strategies for harm reduction.', true),
(15, 19, 15, 4, 'Good predictions for the future of tobacco.', true),
(16, 1, 5, 5, 'Thorough look at tobacco and the environment.', true),
(17, 2, 17, 4, 'Interesting perspective on taxation.', true),
(18, 3, 11, 3, 'Helpful overview of cessation programs.', true),
(19, 5, 19, 4, 'Good discussion on societal impacts.', true),
(20, 6, 20, 5, 'Fascinating chemistry breakdown.', true);
        ");
        DB::statement("
        INSERT INTO product_reviews (id, customer_id, product_id, rating, comment, active) VALUES
(1, 1, 1, 5, 'Fantastic product, exceeded my expectations!', true),
(2, 5, 1, 4, 'Very good, but has room for improvement.', true),
(3, 9, 1, 3, 'Decent, but not what I hoped for.', true),
(4, 13, 1, 5, 'Excellent quality and value for money.', true),
(5, 17, 1, 4, 'Good product, I am satisfied.', true),
(6, 1, 2, 3, 'Average performance, could be better.', true),
(7, 5, 2, 5, 'Amazing product, highly recommend!', true),
(8, 9, 2, 4, 'Works well, meets my needs.', true),
(9, 13, 2, 2, 'Not impressed, expected more.', true),
(10, 17, 2, 3, 'It’s okay, but has some flaws.', true),
(11, 1, 3, 5, 'Top-notch product, will buy again!', true),
(12, 5, 3, 4, 'Very useful and well-made.', true),
(13, 9, 3, 3, 'It’s decent, does the job.', true),
(14, 13, 3, 4, 'Good quality, worth the price.', true),
(15, 17, 3, 2, 'Below average, not happy.', true),
(16, 1, 4, 5, 'Excellent, works perfectly.', true),
(17, 5, 4, 4, 'Good product, would recommend.', true),
(18, 9, 4, 3, 'Satisfactory, but has issues.', true),
(19, 13, 4, 4, 'Nice product, meets expectations.', true),
(20, 17, 4, 5, 'Perfect, could not be happier!', true),
(21, 1, 5, 4, 'Works as advertised, good value.', true),
(22, 5, 5, 3, 'Average product, not bad.', true),
(23, 9, 5, 2, 'Not very good, disappointed.', true),
(24, 13, 5, 5, 'Superb, highly recommended!', true),
(25, 17, 5, 4, 'Very good product, worth buying.', true),
(26, 1, 6, 3, 'It’s okay, nothing special.', true),
(27, 5, 6, 4, 'Good quality, meets my expectations.', true),
(28, 9, 6, 5, 'Excellent product, very pleased.', true),
(29, 13, 6, 3, 'Decent, but could be better.', true),
(30, 17, 6, 4, 'Quite good, would recommend.', true),
(31, 1, 7, 5, 'Fantastic, very happy with it.', true),
(32, 5, 7, 3, 'Average, could be improved.', true),
(33, 9, 7, 4, 'Good product, meets expectations.', true),
(34, 13, 7, 2, 'Not satisfied, expected more.', true),
(35, 17, 7, 4, 'Very nice, happy with the purchase.', true),
(36, 1, 8, 5, 'Excellent, highly recommend!', true),
(37, 5, 8, 3, 'It’s alright, nothing special.', true),
(38, 9, 8, 4, 'Good value for the money.', true),
(39, 13, 8, 3, 'Decent, but has some flaws.', true),
(40, 17, 8, 4, 'Quite good, satisfied with the quality.', true),
(41, 1, 9, 5, 'Amazing product, very satisfied!', true),
(42, 5, 9, 4, 'Good quality, works well.', true),
(43, 9, 9, 3, 'Average, could be better.', true),
(44, 13, 9, 4, 'Nice product, worth the price.', true),
(45, 17, 9, 2, 'Not happy, expected more.', true),
(46, 1, 10, 5, 'Fantastic, best purchase ever!', true),
(47, 5, 10, 4, 'Very good, would recommend.', true),
(48, 9, 10, 3, 'It’s decent, does the job.', true),
(49, 13, 10, 4, 'Good value for the money.', true),
(50, 17, 10, 5, 'Excellent product, very happy.', true);
        ");
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
