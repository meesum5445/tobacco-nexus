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

    .order-info {
        margin-bottom: 20px;
    }

    .order-info p {
        margin-bottom: 10px;
    }

    .ordered-products {
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #5c4a46; /* Separator line */
    }

    th {
        background-color: #4b3a36; /* Lighter brown for table heading */
        color: #d4b28c; /* Golden color */
    }

    tr:nth-child(even) {
        background-color: #4b3a36; /* Lighter brown for even rows */
    }

    tr:hover {
        background-color: #5c4a46; /* Darker brown on hover */
    }
    .table-link {
    display: block;
    color: inherit; /* Inherit text color from parent */
    text-decoration: none;
}

.table-link:hover {
    background-color: #5c4a46; /* Darker brown on hover */
}
</style>

@extends('layout')

@section('title', 'Order')

@section('content')
    <div class="container">
        <h1>Order Details</h1>
        
        <h2>Ordered Products</h2>
        <div class="ordered-products">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Amount</th>
                        <th>Shipment Status</th>
                        <th> &nbsp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productsinorderpassedtoview as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->count}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->price * $product->count}}</td>
                            @if($product->shipment_status==0)                            
                                <td>In Process</td>                            
                            @elseif($product->shipment_status==1)                           
                                <td>Dispatched</td>                           
                            @else                           
                                <td>Delivered</td>                           
                            @endif
                            <td>
                                <div class="product-action">
                                    <a href="{{ route('product',['product_id'=>$product->id]) }}" class="table-link">View Details</a>
                                </div>
                            </td>
                        </tr>              
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2>Order Summary</h2>
        <div class="order-info">
            <p><strong>Order ID:</strong> {{$orderpassedtoview->id}}</p>
            <p><strong>Total Cost:</strong> {{$orderpassedtoview->amount}}</p>
            <p><strong>Order Address:</strong> {{$orderpassedtoview->address}}</p>
            <p><strong>Order Date:</strong> {{$orderpassedtoview->order_date}}</p>
        </div>
    </div>
@endsection

