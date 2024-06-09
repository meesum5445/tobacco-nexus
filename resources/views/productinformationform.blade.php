

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #2b1d1b;
            color: #ffffff;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #3e2d2b;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #d4b28c;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #d4b28c;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #4b3a36;
            border: 1px solid #5c4a46;
            border-radius: 5px;
            color: #fff;
        }

        input[type="file"] {
            display: none;
        }

        .image-label {
            display: block;
            cursor: pointer;
            margin-bottom: 15px;
        }

        .image-label img {
            display: block;
            max-width: 100%;
            border-radius: 10px;
            transition: opacity 0.3s ease;
        }

        .image-label img:hover {
            opacity: 0.7;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            color: #ffffff;
            background-color: #6f4e37;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #8a5a44;
        }

        input[type="submit"]:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(111, 78, 55, 0.7);
        }
    </style>
@extends('layout')

@section('title', 'Product Information Form')

@section('content')
    <div class="container">
        <form action="{{ route('productinformationformCall') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Product Information</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{$productpassedtoview->name}}" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{$productpassedtoview->price}}" step="0.01" required>

            <label class="image-label" for="image">
                <img src="data:image/png;base64,{{ base64_encode($productpassedtoview->image) }}"   alt="Product Image" id="productImage">
            </label>
            <input type="file" id="image" name="image" value="{{$productpassedtoview->image}}" accept="image/*">

            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{$productpassedtoview->description}}</textarea>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                @foreach($listofcategoriespassedtoview as $category)
                    <option value="{{$category->id}}" {{ $category->id == $productpassedtoview->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
            </select>
           
            <label for="shipment_method">Shipment Method:</label>
            <select id="shipment_method" name="shipment_method" required>
                @foreach($listofshipment_methodspassedtoview as $shipment_method)
                    <option value="{{$shipment_method->id}}" {{ $shipment_method->id == $productpassedtoview->shipment_method_id ? 'selected' : '' }}>{{$shipment_method->name}}</option>
                @endforeach
            </select>

            <label for="availability">Availability:</label>
            <select name="availability"  id="availability" required>
                <option value="True" {{$productpassedtoview->availability==true?'selected':''}}>Available</option>
                <option value="False" {{$productpassedtoview->availability==false?'selected':''}}>UnAvailable</option>
            </select>

            <input type="hidden" name="product_id" value="{{$productpassedtoview->id}}" required>
            <input type="submit" value="Apply">
        </form>
    </div>
@endsection
