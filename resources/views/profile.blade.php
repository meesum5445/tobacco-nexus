<style>
    .profile-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #3e2d2b;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        color: #ffffff;
        text-align: center;
    }

    .profile-container h2 {
        color: #d4b28c;
    }

    .profile-container p {
        margin-bottom: 10px;
    }

    .profile-button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 1em;
        color: #ffffff;
        background-color: #6f4e37;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin: 0 10px; /* Added margin to create space between buttons */
        text-decoration: none;
    }

    .profile-button:hover {
        background-color: #8a5a44;
    }
    .separator {
        margin: 30px 0;
        border-bottom: 1px solid #5c4a46; /* Separator line */
    }
</style>

@extends('layout')

@section('title', 'Profile')

@section('content')
    <div class="profile-container">
        <h2>{{Auth::user()->username}}</h2>
        <p>Email: {{Auth::user()->email}}</p>
        <p>Contact: {{Auth::user()->contact_no}}</p>
        @if(Auth::user()->account_type == 0)
        <p>Location: {{$addressofcustomerpassedtoview->location}}</p>
        @endif
        <a href="{{ route('profileinformationform') }}" class="profile-button">CHANGE PROFILE INFORMATION</a><br>
        <div class="separator"></div>
        @if(Auth::user()->account_type == 0)  
            {{-- Render content for customer --}}
            <a href="{{ route('myorders') }}" class="profile-button">MY ORDERS</a>  
            <a href="{{ route('wishlist') }}" class="profile-button">WISH LIST</a>     
        @elseif(Auth::user()->account_type == 1)
            {{-- Render content for seller --}}
            <a href="{{ route('productlistingform') }}" class="profile-button">LIST A PRODUCT</a>
            <a href="{{ route('myproducts') }}" class="profile-button">MY PRODUCTS</a>
            <div class="separator"></div>
            <a href="{{ route('myorderrequests') }}" class="profile-button">MY ORDER REQUESTS</a>
        @elseif(Auth::user()->account_type == 2)
            {{-- Render content for writer --}}
            <a href="{{ route('blogpublishingform') }}" class="profile-button">Publish a Blog</a>
            <a href="{{ route('myblogs') }}" class="profile-button">MY BLOGS</a>
        @else
            {{-- Render content for manager --}}
            <a href="{{ route('documents') }}" class="profile-button">Pending Documents</a>
        @endif
        
    </div>
@endsection
