<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Homepage')</title>
    <style>
        *{
            box-sizing: border-box;
            text-decoration: none;
        }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-color: #2b1d1b; 
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;     
            background-color: #3e2d2b; /* Darker brown header */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            margin-top: 20px; /* Lower down navbar by 20px */
            margin-bottom:20px; 
            position: -webkit-sticky; /* For Safari */
            position: sticky;
            top: 0;
            z-index: 1000; /* Ensure it stays above other content */
        }

        .header a {
            text-decoration: none;
            color: #ffffff;
            transition: color 0.3s ease;
        }

        .header a:hover {
            color: #d4b28c; /* Golden color on hover */
        }

        .header button {
            padding: 10px 20px;
            font-size: 1em;
            color: #ffffff;
            background-color: #6f4e37; /* Medium brown button */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .header button:hover {
            background-color: #8a5a44; /* Darker brown on hover */
        }

        .header button:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(111, 78, 55, 0.7);
        }
        .content {
            flex-grow: 1;
        }
        .footer {
            background-color: #3e2d2b; /* Darker brown footer */
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        
        .footer a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: #d4b28c; /* Golden color on hover */
        }
    </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Homepage')</title>
    <link rel="icon" href="{{ asset('myimages/favicon.ico') }}" type="image/x-icon"/>
</head>
<body>
    <div class="header">
        <!-- Logo image -->
        <a href="{{route('home')}}"><img src="{{asset('myimages/logo.svg')}}" alt="Logo" style="height: 80px; margin: 0px 0px 0px 70px; "></a>

        <!-- Navigation buttons -->
        <a href="{{ route('home') }}"><button>HOME</button></a>
        <a href="{{ route('products') }}"><button>PRODUCTS</button></a>
        <a href="{{ route('blogs') }}"><button>BLOGS</button></a>
        @if (Auth::check())
            <a href="{{ route('profile') }}"><button>PROFILE</button></a>
            <a href="{{ route('logoutCall') }}"><button>LOGOUT</button></a>
            @if(Auth::user()->account_type==0)
                <a href="{{ route('cart')}}"><button>CART</button></a>
            @endif
        @else
            <a href="{{ route('signup') }}"><button>SIGNUP</button></a>
            <a href="{{ route('login') }}"><button>LOGIN</button></a>
        @endif
    </div>

    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        <!-- Footer content -->
        <p>&copy; 2024 Tobacco Nexus. All rights reserved.</p>
        <p>Created by <b> Sobia Rizwan,Meesum Abbas, Waleed Abbas, Anas Aslam</b></p>
        <p>INFORMATION TECHNOLOGY UNIVERSITY</p>
    </div>
    
</body>
</html>
