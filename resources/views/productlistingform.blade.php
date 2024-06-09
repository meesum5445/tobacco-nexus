<style>
    .form-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #3e2d2b; /* Darker brown container */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        color: #ffffff;
    }

    .form-container h2 {
        color: #d4b28c; /* Golden color for header */
        text-align: center;
        margin-bottom: 20px;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
        color: #d4b28c; /* Golden color for labels */
    }

    .form-container input[type="text"],
    .form-container input[type="number"],
    .form-container textarea,
    .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        background-color: #4b3a36; /* Lighter brown input background */
        border: 1px solid #5c4a46;
        border-radius: 5px;
        color: #fff; /* White text color */
    }

    .form-container input[type="file"] {
        display: none; /* Hide the file input, but keep the label visible */
    }

    .form-container .file-upload-label {
        display: inline-block;
        padding: 10px;
        background-color: #6f4e37; /* Medium brown button */
        border: none;
        border-radius: 5px;
        color: #ffffff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-container .file-upload-label:hover {
        background-color: #8a5a44; /* Darker brown on hover */
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

    /* Change button color when file is uploaded */
    .form-container input[type="file"]:valid + .file-upload-label {
        background-color: #ff6f61; /* Darker brown when file is uploaded */
    }
</style>
@extends('layout')

@section('title', 'Home')

@section('content')
<div class="form-container">
    <form action="{{ route('productlistingCall') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>List a Product</h2>
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" maxlength="255" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>
        
        <label for="image" class="file-upload-label">Choose Product Image</label>
        <input type="file" id="image" name="image" accept="image/*" required>
    
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="instock">Instock:</label>
        <input type="number" id="instock" name="instock"  min=0 value=0 step="1" required>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
            @foreach($listofcategoriespassedtoview as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        <label for="shipment_method">Shipment Method:</label>
        <select id="shipment_method" name="shipment_method" required>
            @foreach($listofshippingmethodspassedtoview as $shippingmethod)
                <option value="{{$shippingmethod->id}}">{{$shippingmethod->name}}</option>
            @endforeach
        </select>

        <input type="submit" value="List">
    </form>    
@endsection
