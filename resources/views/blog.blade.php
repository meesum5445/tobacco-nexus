@extends('layout')

<style>
    .blog-details-container {
        width: 100%;
        padding: 20px;
        background-color: #3e2d2b; /* Darker brown background */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
        align-items: flex-start; /* Align items at the start */
    }

    .blog-details-content {
        max-width: 800px;
        width: 100%;
        display: flex;
    }

    .blog-image {
        max-width: 50%;
        border-radius: 10px;
        margin-right: 20px; /* Add margin to separate from details */
    }

    .blog-details {
        flex-grow: 1;
        color: #ffffff;
    }

    .blog-title {
        font-size: 3.5em;
        color: #d4b28c; /* Golden color */
        margin-bottom: 10px;
    }

    .blog-writer,
    .blog-date {
        margin-bottom: 12px;
    }

    .blog-description {
        font-size: 1.1em;
        line-height: 1.5;
    }

    .rating-form {
        margin-top: 20px;
        padding: 20px;
        background-color: #4e342e; /* Slightly lighter brown form background */
        border-radius: 10px;
        width: 100%;
    }

    .rating-form label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        color: #d4b28c; /* Golden color */
    }

    .rating-form input[type="text"],
    .rating-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: none;
        background-color: #5d4037; /* Dark brown input background */
        color: #ffffff;
    }

    .rating-form .rating-inputs {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .rating-form input[type="radio"] {
        margin-right: 5px;
    }

    .rating-form button {
        padding: 10px 20px;
        background-color: #6f4e37; /* Dark brown button background */
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .rating-form button:hover {
        background-color: #8a5a44; /* Darker brown button hover */
    }

    .rating-form button:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(111, 78, 55, 0.7); /* Dark brown button shadow */
    }

    .rating-inputs {
        position: relative;
    }

    .rating-inputs input[type="radio"] {
        display: none;
    }

    .rating-inputs label {
        cursor: pointer;
        color: #8a5a44;
    }

    .rating-inputs input[type="radio"]:checked ~ label + input[type="radio"] ~ label {
        color: #5d4037;
    }
    .reviews-section {
    margin-top: 20px;
}

.reviews-heading {
    font-size: 24px;
    color: #d4b28c; /* Golden color */
    margin-bottom: 20px;
}

.review {
    margin-bottom: 20px;
    padding: 20px;
    background-color: #4e342e; /* Darker brown background */
    border-radius: 10px; /* Rounded corners */
}

.rating {
    margin-bottom: 10px;
}

.star {
    color: #d4b28c; /* Golden color */
    font-size: 20px;
}

.comment {
    color: #ffffff; /* White color */
    font-size: 16px;
    line-height: 1.5;
}
.blog-details-container button {
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #6f4e37; /* Dark brown button background */
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.blog-details-container button:hover {
    background-color: #8a5a44; /* Darker brown button hover */
}

.blog-details-container button:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(111, 78, 55, 0.7); /* Dark brown button shadow */
}
</style>

@section('title', 'Blog Details')

@section('content')
    <div class="blog-details-container">
        <div class="blog-details-content">
            <img src="data:image/png;base64,{{ base64_encode($blogpassedtoview->image) }}" alt="" class="blog-image">
            <div class="blog-details">
                <h2 class="blog-title">{{ $blogpassedtoview->title }}</h2>
                <p class="blog-writer"><strong>By:</strong> {{ $blogpassedtoview->writer_name }}</p>
                <p class="blog-date">{{ $blogpassedtoview->publish_date }}</p>
            </div>
        </div>
        @if($blogpassedtoview->writer_id == Auth::id())
                <a href="{{route('mybloginformationform', ['blog_id' => $blogpassedtoview->id])}}" class="change-link"><button class="changeinformation-button">Edit Blog</button></a>      
        @endif
        <p class="blog-description">{{ $blogpassedtoview->description }}</p>
    </div>
    @if(Auth::check())
    <div class="rating-form">
        <h1>Give Your Review</h1>
        <form action="{{route('blogreview', ['blog_id' => $blogpassedtoview->id])}}" method="POST">
            @csrf
            <div>
                <label>Rating:</label>
                <div class="rating-inputs">
                    <input type="radio" id="star1" name="rating" value="1" hidden>
                    <label for="star1">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2" hidden>
                    <label for="star2">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3" hidden>
                    <label for="star3">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4" hidden>
                    <label for="star4">&#9733;</label>
                    <input type="radio" id="star5" name="rating" value="5" selected hidden>
                    <label for="star5">&#9733;</label>
                </div>
            </div>
            
            <div>
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" rows="4" maxlength="200" required></textarea>
            </div>
            
            <button type="submit" class="rate-button">Submit</button>
        </form>
    </div>
    @endif
    <div class="reviews-section">
        <?php
            $count=count($reviewsofblogpassedtoview);
        ?>
        @if($count>0)
        <h1 class="reviews-heading">REVIEWS</h1>
        @endif
        
        @foreach ($reviewsofblogpassedtoview as $review)
            <div class="review">
                <div class="rating">
                    @if($review->rating >= 1)
                        <span class="star">&#9733;</span>
                    @else
                        <span class="star">&#9734;</span>
                    @endif
                    
                    @if($review->rating >= 2)
                    <span class="star">&#9733;</span>
                    @else
                        <span class="star">&#9734;</span>
                    @endif

                    @if($review->rating >= 3)
                        <span class="star">&#9733;</span>
                    @else
                        <span class="star">&#9734;</span>
                    @endif

                    @if($review->rating >= 4)
                        <span class="star">&#9733;</span>
                    @else
                        <span class="star">&#9734;</span>
                    @endif

                    @if($review->rating >= 5)
                        <span class="star">&#9733;</span>
                    @else
                        <span class="star">&#9734;</span>
                    @endif
    
                    <!-- Repeat for other stars -->
                </div>
                <p class="comment">{{$review->comment}}</p>
            </div>
        @endforeach
    </div>
@endsection
