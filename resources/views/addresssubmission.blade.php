
    <title>Address Submission</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #2b1d1b; /* Dark brown background */
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            max-width: 600px; /* Slightly larger horizontally */
            padding: 20px; /* Smaller padding */
            background-color: #3e2d2b; /* Darker brown container */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #d4b28c; /* Golden color for labels */
        }

        textarea {
            width: 400px;
            height: 80px; /* Smaller height */
            padding: 10px;
            margin-bottom: 20px;
            background-color: #4b3a36; /* Lighter brown input background */
            border: 1px solid #5c4a46;
            border-radius: 5px;
            color: #fff; /* White text color */
        }

        input[type="submit"] {
            width: 100%;
            padding: 15px;
            font-size: 1.2em;
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
    </style>

    <form action="{{route('addresssubmissionCall')}}" method="POST">
        @csrf
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>

