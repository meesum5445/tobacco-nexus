<style>
    .form-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #3e2d2b; /* Darker brown background */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        color: #ffffff;
        text-align: center;
    }

    .form-container h2 {
        color: #d4b28c; /* Golden color for header */
        margin-bottom: 20px;
    }

    .form-container label {
        display: block;
        margin: 10px 0 5px;
        color: #d4b28c; /* Golden color for labels */
    }

    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="tel"],
    .form-container input[type="password"],
    .form-container textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        background-color: #4b3a36; /* Lighter brown input background */
        border: 1px solid #5c4a46;
        border-radius: 5px;
        color: #fff; /* White text color */
    }

    .form-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        font-size: 1em;
        color: #ffffff;
        background-color: #6f4e37; /* Medium brown button */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-container input[type="submit"]:hover {
        background-color: #8a5a44; /* Darker brown on hover */
    }
</style>

@extends('layout')

@section('title', 'Profile')

@section('content')
<div class="form-container">
    <form action="{{ route('profileinformationformCall') }}" method="POST">
        @csrf
        <h2>Change Profile Information</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="{{$userpassedtoview->username}}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{$userpassedtoview->email}}" required>

        <label for="contact">Contact:</label>
        <input type="tel" id="contact" name="contact_no" value="{{$userpassedtoview->contact_no}}" required>

        <input type="submit" value="Apply">
    </form>
    @if(Auth::user()->account_type == 0)
        <form action="{{ route('addresssubmissionCall') }}" method="POST">
            @csrf
            <label for="address">Address:</label>
            <textarea id="address" name="address" required>{{$userpassedtoview->location}}</textarea>
            <input type="submit" value="Apply">
        </form>
    @endif
    <form action="{{ route('profilepasswordformCall') }}" method="POST">
        @csrf
        <h2>Change Password</h2>
        <label for="current_password">Current Password:</label>
        <input type="password" id="current_password" name="current_password" required>

        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>

        <input type="submit" value="Apply">
    </form>
</div>
@endsection
