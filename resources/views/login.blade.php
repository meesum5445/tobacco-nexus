
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
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #4b3a36; /* Lighter brown input background */
            border: 1px solid #5c4a46;
            border-radius: 5px;
            color: #fff; /* White text color */
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
        }

        input[type="submit"]:hover {
            background-color: #8a5a44; /* Darker brown on hover */
        }

        input[type="submit"]:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(111, 78, 55, 0.7);
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
            color: #d4b28c; /* Golden color for link */
        }

        .signup-link a {
            color: #d4b28c; /* Golden color for link */
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="container">
        <form action="{{ route('loginCall') }}" method="POST">
            @csrf  
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Login">
        </form>
        
        <p class="signup-link">Don't have an account? <a href="{{ route('signup') }}">Sign Up</a></p>
    </div>
@endsection
