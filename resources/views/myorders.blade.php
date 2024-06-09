

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

    .order-item {
        padding: 20px;
        background-color: #4b3a36; /* Lighter brown for order item */
        border-radius: 10px;
        margin-bottom: 20px;
        text-decoration: none; /* Remove underline from links */
        color: #ffffff; /* White color for text */
        display: block; /* Make the entire block clickable */
        transition: background-color 0.3s ease;
    }

    .order-item:hover {
        background-color: #5c4a46; /* Darker brown on hover */
    }

    .order-item p {
        margin: 5px 0;
    }

    .order-item strong {
        color: #d4b28c; /* Golden color for labels */
    }

    .separator {
        margin: 15px 0;
        border: none;
        border-bottom: 1px solid #5c4a46; /* Separator line */
    }
</style>
@extends('layout')
@section('title', 'My Orders')

@section('content')
    <div class="container">
        <h1>My Orders</h1>
        @foreach ($ordersofuserpassedtoview as $order)
            <a href="{{route('order', ['order_id' => $order->id])}}" class="order-item">
                <p><strong>Order ID:</strong> {{$order->id}}</p>
                <p><strong>Total Amount:</strong> {{$order->amount}}</p>
                <p><strong>Delivery Address:</strong> {{$order->address}}</p>
                <p><strong>Order Date:</strong> {{$order->order_date}}</p>
            </a>
            <hr class="separator">
        @endforeach
    </div>
@endsection
