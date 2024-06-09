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

    /* Increase height of the textarea */
    .form-container textarea {
        min-height: 200px; /* Adjust this value as needed */
    }
    #featureImage{
        width: 100%;
        height:200px;
    }
</style>
@extends('layout')

@section('title', 'Blog Information Form')

@section('content')
<div class="form-container">
    <form action="{{route('mybloginformationformCall')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>Blog Information</h2>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" maxlength="255" value="{{$blogpassedtoview->title}}" required>
 
        <label class="image-label" for="image">
            <img src="data:image/png;base64,{{ base64_encode($blogpassedtoview->image) }}"  id="featureImage">
        </label>
        <input type="file" id="image" name="image" value="{{$blogpassedtoview->image}}" accept="image/*">
    
        <label for="description">Description:</label>
        <textarea id="description" name="description"  required>{{$blogpassedtoview->description}}</textarea>

        <input type="hidden" name="blog_id" value="{{$blogpassedtoview->id}}" required>
        <input type="submit" value="APPLY">
    </form>    
</div>
@endsection
