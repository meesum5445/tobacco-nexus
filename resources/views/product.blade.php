@extends('layout')

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #3e2723; /* Dark brown background */
        color: #ffffff;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #5d4037; /* Darker brown container */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .product-title {
        font-size: 2em;
        margin-bottom: 10px;
        color: #d4b28c; /* Golden color */
    }

    .product-detail {
        font-size: 1.2em;
        margin-bottom: 20px;
    }

    .product-image {
        display: block;
        max-width: 100%;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .detail-item {
        margin-bottom: 15px;
    }

    .detail-label {
        font-weight: bold;
        color: #d4b28c; /* Golden color */
    }

    .change-link,
    .add-to-cart-button,
    .rate-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #6f4e37; /* Dark brown link background */
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        border: none; /* Remove default border for buttons */
        cursor: pointer; /* Pointer cursor for buttons */
    }

    .change-link:hover,
    .add-to-cart-button:hover,
    .rate-button:hover {
        background-color: #8a5a44; /* Darker brown link hover */
    }

    .change-link:focus,
    .add-to-cart-button:focus,
    .rate-button:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(111, 78, 55, 0.7); /* Dark brown link shadow */
    }

    .rating-form {
        margin-top: 20px;
        padding: 20px;
        background-color: #4e342e; /* Slightly lighter brown form background */
        border-radius: 10px;
    }

    .rating-form label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        color: #d4b28c; /* Golden color */
    }

    .rating-form input[type="text"],
    .rating-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: none;
        background-color: #5d4037; /* Dark brown input background */
        color: #ffffff;
    }

    .rating-form .rating-inputs {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .rating-form input[type="radio"] {
        margin-right: 5px;
    }

    .rating-form button {
        padding: 10px 20px;
        background-color: #6f4e37; /* Dark brown button background */
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .rating-form button:hover {
        background-color: #8a5a44; /* Darker brown button hover */
    }

    .rating-form button:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(111, 78, 55, 0.7); /* Dark brown button shadow */
    }
    .rating-inputs {
        position: relative;
    }

    .rating-inputs input[type="radio"] {
        display: none;
    }

    .rating-inputs label {
        cursor: pointer;
        color: #8a5a44;
    }


    .rating-inputs input[type="radio"]:checked ~ label + input[type="radio"] ~ label {
        color: #5d4037;
    }

    .reviews-heading {
    font-size: 24px;
    color: #d4b28c; /* Golden color */
    margin-bottom: 20px;
    }

    .review {
        margin-bottom: 20px;
        padding: 20px;
        background-color: #4e342e; /* Darker brown background */
        border-radius: 10px; /* Rounded corners */
    }

    .rating {
        margin-bottom: 10px;
    }

    .star {
        color: #d4b28c; /* Golden color */
        font-size: 20px;
    }

    .comment {
        color: #ffffff; /* White color */
        font-size: 16px;
        line-height: 1.5;
    }
    .flex{
        display: flex;
    }
    .align-item-centre{
        align-items: center;
    }
</style>

@section('title', $productpassedtoview->name)

@section('content')
    <div class="container">
        <div class="product-title">{{$productpassedtoview->name}}</div>
        <div class="rating">
            @if($ratingofproductpassedtoview>0)
                @if($ratingofproductpassedtoview >= 1)
                    <span class="star">&#9733;</span>
                @else
                    <span class="star">&#9734;</span>
                @endif

                @if($ratingofproductpassedtoview >= 2)
                    <span class="star">&#9733;</span>
                @else
                    <span class="star">&#9734;</span>
                @endif

                @if($ratingofproductpassedtoview >= 3)
                    <span class="star">&#9733;</span>
                @else
                    <span class="star">&#9734;</span>
                @endif
                @if($ratingofproductpassedtoview >= 4)
                    <span class="star">&#9733;</span>
                @else
                    <span class="star">&#9734;</span>
                @endif
                @if($ratingofproductpassedtoview >= 5)
                    <span class="star">&#9733;</span>
                @else
                    <span class="star">&#9734;</span>
                @endif
            @endif
        </div>
        <div class="product-detail">
            <div class="detail-item">
                <span class="detail-label">Price:</span> {{$productpassedtoview->price}}
            </div>
            <label class="image-label" for="image">
                <img src="data:image/png;base64,{{ base64_encode($productpassedtoview->image) }}" alt="Product Image" class="product-image">
            </label>
            <div class="detail-item">
                <span class="detail-label">Description:</span> {{$productpassedtoview->description}}
            </div>
            <div class="detail-item">
                <span class="detail-label">Category:</span> {{$categorypassedtoview->name}}
            </div>

            <div class="detail-item">
                <span class="detail-label">Shipment Method:</span> {{$productpassedtoview->shipment_method_name}}
            </div>

            <div class="detail-item">
                <span class="detail-label">Instock:</span> {{$productpassedtoview->instock}}
            </div>
            
            @if($productpassedtoview->seller_id == Auth::id())
                <a href="{{route('productinformationform', ['product_id' => $productpassedtoview->id])}}" class="change-link">Change Product Information</a>      
            @endif

            @if(Auth::check() && Auth::user()->account_type == 0)   {{-- 0 for customer --}}
                @if($productpassedtoview->instock>0)
                    @if($countincartpassedtoview==0)
                        <form action="{{route('addtocart', ['product_id' => $productpassedtoview->id])}}" method="POST">
                            @csrf
                            <input type="submit" value="Add To Cart" class="add-to-cart-button">
                        </form>
                    @else
                        <div class="flex align-items-centre">
                            <form action="{{route('removefromcart', ['product_id' => $productpassedtoview->id])}}" method="POST">
                                @csrf
                                <input type="submit" value=&#8722; class="add-to-cart-button">
                            </form>
                            <div style="padding-left:10px"></div><h4>{{$countincartpassedtoview}}</h4><div style="padding-left:10px"></div>
                            @if($countincartpassedtoview<$productpassedtoview->instock)
                                <form action="{{route('addtocart', ['product_id' => $productpassedtoview->id])}}" method="POST">
                                    @csrf
                                    <input type="submit" value=&#43 class="add-to-cart-button">
                                </form>
                            @endif
                        </div>
                    @endif
                @endif
                @if($presentinwishlist==0)
                <form action="{{route('addtowishlist', ['product_id' => $productpassedtoview->id])}}" method="POST">
                    @csrf
                    <input type="submit" value="Add To Wish List" class="add-to-cart-button">
                </form>
                @else
                <form action="{{route('removefromwishlist', ['product_id' => $productpassedtoview->id])}}" method="POST">
                    @csrf
                    <input type="submit" value="Remove Wish List" class="add-to-cart-button">
                </form>
                @endif
                <div class="rating-form">
                    <h1>Give Your Review</h1>
                    <form action="{{route('productreview', ['product_id' => $productpassedtoview->id])}}" method="POST">
                        @csrf
                        <div>
                            <label>Rating:</label>
                            <div class="rating-inputs">
                                <input type="radio" id="star1" name="rating" value="1" required hidden>
                                <label for="star1">&#9733;</label>
                                <input type="radio" id="star2" name="rating" value="2" hidden>
                                <label for="star2">&#9733;</label>
                                <input type="radio" id="star3" name="rating" value="3" hidden>
                                <label for="star3">&#9733;</label>
                                <input type="radio" id="star4" name="rating" value="4" hidden>
                                <label for="star4">&#9733;</label>
                                <input type="radio" id="star5" name="rating" value="5" hidden>
                                <label for="star5">&#9733;</label>
                            </div>
                        </div>
                        
                        <div>
                            <label for="comment">Comment:</label>
                            <textarea id="comment" name="comment" rows="4" maxlength="200" required></textarea>
                        </div>
                        
                        <button type="submit" class="rate-button">Submit</button>
                    </form>
                </div>
            @endif
            <?php
                $count=count($reviewsofproductpassedtoview);
            ?>
            @if($count>0)
            <h1 class="reviews-heading">REVIEWS</h1>
            @endif
            @foreach ($reviewsofproductpassedtoview as $review)
                <div class="review">
                    <div class="rating">
                        @if($review->rating >= 1)
                            <span class="star">&#9733;</span>
                        @else
                            <span class="star">&#9734;</span>
                        @endif

                        @if($review->rating >= 2)
                            <span class="star">&#9733;</span>
                        @else
                            <span class="star">&#9734;</span>
                        @endif

                        @if($review->rating >= 3)
                            <span class="star">&#9733;</span>
                        @else
                            <span class="star">&#9734;</span>
                        @endif

                        @if($review->rating >= 4)
                            <span class="star">&#9733;</span>
                        @else
                            <span class="star">&#9734;</span>
                        @endif

                        @if($review->rating >= 5)
                            <span class="star">&#9733;</span>
                        @else
                            <span class="star">&#9734;</span>
                        @endif
                    </div>
                    <p class="comment">{{$review->comment}}</p>
                </div>
            @endforeach
    </div>
@endsection
