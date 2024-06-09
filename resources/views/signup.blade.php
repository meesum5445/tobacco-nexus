
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #2b1d1b; /* Dark brown background */
            color: #ffffff;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #3e2d2b; /* Darker brown container */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        h2 {
            text-align: center;
            color: #d4b28c; /* Golden color for header */
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #d4b28c; /* Golden color for labels */
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #4b3a36; /* Lighter brown input background */
            border: 1px solid #5c4a46;
            border-radius: 5px;
            color: #fff; /* White text color */
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            color: #ffffff;
            background-color: #6f4e37; /* Medium brown button */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-sizing: border-box;
        }

        input[type="submit"]:hover {
            background-color: #8a5a44; /* Darker brown on hover */
        }

        input[type="submit"]:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(111, 78, 55, 0.7);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #d4b28c; /* Golden color for link */
        }

        .login-link a {
            color: #d4b28c; /* Golden color for link */
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="container">
        <form action="{{ route('signupCall') }}" method="POST">
            @csrf
            <h2>Sign Up</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="contact">Contact:</label>
            <input type="tel" id="contact" name="contact_no" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <label for="account_type">Account Type:</label>
            <select id="account_type" name="account_type" required>
                <option value="0">Customer</option>
                <option value="1">Seller</option>      
                <option value="2">Writer</option>
                <option value="3">Manager</option>
            </select>
            
            <input type="submit" value="Sign Up">
        </form>
        
        <p class="login-link">Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
@endsection
