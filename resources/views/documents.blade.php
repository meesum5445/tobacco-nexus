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

.product-item {
    margin-bottom: 30px;
    padding: 20px;
    background-color: #4b3a36; /* Lighter brown for product item */
    border-radius: 10px;
}

.product-detail {
    margin-bottom: 10px;
}

.separator {
    margin: 30px 0;
    border-bottom: 1px solid #5c4a46; /* Separator line */
}

.product-image {
    max-width: 750px;
    width: 100%;
    border-radius: 10px; /* Matches the product item border radius */
    margin-bottom: 10px; /* Spacing between image and details */
    display: block; /* Ensure the image is displayed as a block element */
    margin-left: auto; /* Center the image horizontally */
    margin-right: auto; /* Center the image horizontally */
    cursor: pointer; /* Pointer cursor for hover effect */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth hover effect */
}

.product-image:hover {
    transform: scale(1.05); /* Slight zoom effect on hover */
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.7); /* Brighter shadow on hover */
}

.add-to-cart-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #6f4e37; /* Dark brown link background */
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    border: none; /* Remove default border for buttons */
    cursor: pointer; /* Pointer cursor for buttons */
}

.add-to-cart-button:hover {
    background-color: #8a5a44; /* Darker brown link hover */
}

.add-to-cart-button:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(111, 78, 55, 0.7); /* Dark brown link shadow */
}

/* Modal Styles */
.image-modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(62, 45, 43,0.5); /* Black background with opacity */

}

.modal-content {
    margin: auto;
    margin-top: 130px;
    display: block;
    width: 100%;
    max-width: 1200px;
    border-radius: 10px;
}

.close-modal {
    position: absolute;
    top: 20px;
    right: 35px;
    color: #ffffff;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close-modal:hover,
.close-modal:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

</style>
@extends('layout')
@section('title', 'Documents')
@section('content')
    <div class="container">
    <h1>Pending Documents</h1>
        @foreach ($documentspassedtoview as $document)
            <div class="product-item">
                <img src="data:image/png;base64,{{ base64_encode($document->image) }}" alt="Document Image" class="product-image" onclick="showImageModal(this.src)">
                <div class="product-detail"><strong>Username:</strong> {{$document->username}}</div>
                <div class="product-detail"><strong>Contact No:</strong> {{$document->contact_no}}</div>
            </div>
            <form action="{{ route('verifydocument',['user_id'=>$document->user_id]) }}" method="POST">
                @csrf
                <input type="submit" value="VERIFY" class="add-to-cart-button">
            </form>
            <div class="separator"></div>
        @endforeach
    </div>

    <!-- Modal for fullscreen image -->
    <div id="imageModal" class="image-modal">
        <span class="close-modal" onclick="closeImageModal()">&times;</span>
        <img class="modal-content" id="fullScreenImage">
    </div>

    <script>
        function showImageModal(src) {
            var modal = document.getElementById("imageModal");
            var modalImg = document.getElementById("fullScreenImage");
            modal.style.display = "block";
            modalImg.src = src;
        }

        function closeImageModal() {
            var modal = document.getElementById("imageModal");
            modal.style.display = "none";
        }

    </script>
@endsection
