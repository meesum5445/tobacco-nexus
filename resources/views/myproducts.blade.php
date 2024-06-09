<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #2b1d1b; /* Dark brown background */
        color: #ffffff;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #3e2d2b; /* Darker brown container */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .product-item {
        margin-bottom: 30px;
        padding: 20px;
        background-color: #4b3a36; /* Lighter brown for product item */
        border-radius: 10px;
    }

    .product-name {
        font-size: 1.5em;
        color: #d4b28c; /* Golden color */
        margin-bottom: 10px;
    }

    .product-detail {
        margin-bottom: 10px;
    }

    .product-description {
        font-size: 1.1em;
    }

    .separator {
        margin: 30px 0;
        border-bottom: 1px solid #5c4a46; /* Separator line */
    }

    .product-image {
        max-width: 200px; /* Set the maximum width for the images */
        height: auto; /* Maintains aspect ratio */
        border-radius: 10px; /* Matches the product item border radius */
        margin-bottom: 10px; /* Spacing between image and details */
        display: block; /* Ensure the image is displayed as a block element */
        margin-left: auto; /* Center the image horizontally */
        margin-right: auto; /* Center the image horizontally */
    }
    .product-detail-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: #ffffff;
            background-color: #6f4e37; /* Medium brown button */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .product-detail-button:hover {
            background-color: #8a5a44; /* Darker brown on hover */
        }
</style>
@extends('layout')
@section('title', 'MyProducts')
@section('content')
    <h1>My Products</h1>
    <div class="container">
        @foreach ($productspassedtoview as $product)
            <div class="product-item">
                <div class="product-name">{{$product->name}}</div>
                <img src="data:image/png;base64,{{ base64_encode($product->image) }}" alt="Product Image" class="product-image">
                <div class="product-detail"><strong>Price:</strong> {{$product->price}}</div>
                <div class="product-description">{{$product->description}}</div>
            </div>
            <a href="{{ route('product',['product_id'=>$product->id]) }}" class="product-detail-button">DETAIL</a>
            <div class="separator"></div>
        @endforeach
    </div>
@endsection
