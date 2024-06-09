@extends('layout')

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

    .order-request-info {
        margin-bottom: 20px;
    }

    .order-request-info p {
        margin-bottom: 10px;
    }

    .order-requests {
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

    .arrow-up-button {
        background-color: #6f4e37; /* Medium brown button */
        border: none;
        color: #ffffff;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }

    .arrow-up-button:hover {
        background-color: #8a5a44; /* Darker brown on hover */
    }
</style>

@section('title', 'Order Requests')

@section('content')
    <div class="container">
        <h1>Order Requests</h1>
        <div class="order-requests">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Delivery Address</th>
                        <th>Shipment Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderrequestspassedtoview as $orderrequest)
                        <tr>
                            <td>{{$orderrequest->name}}</td>
                            <td>{{$orderrequest->count}}</td>
                            <td>{{$orderrequest->price * $orderrequest->count}}</td>
                            <td>{{$orderrequest->address}}</td>
                            @if($orderrequest->shipment_status == 0)     
                                <td>In Process</td>                                               
                            @elseif($orderrequest->shipment_status == 1)    
                                <td>Dispatched</td>                                            
                            @else        
                                <td>Delivered</td>                                            
                            @endif
                            @if($orderrequest->shipment_status!=2)
                                <td>
                                    <form action="{{ route('updateorderrequestshipmentstatus', ['orderrequestid' => $orderrequest->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="arrow-up-button">&uarr;</button>
                                    </form>
                                </td>
                            @else
                                <td>&nbsp</td>
                            @endif
                        </tr>              
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
