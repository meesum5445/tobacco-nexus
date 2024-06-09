
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #3e2723; /* Dark brown background */
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

    .blogs-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #3e2d2b; /* Darker brown background */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .blog-item {
        position: relative;
        margin-bottom: 30px;
        padding: 20px;
        background-color: #4b3a36; /* Lighter brown for blog item */
        border-radius: 10px;
        background-size: cover;
        background-position: center;
        color: #ffffff; /* Ensure text color is readable on the background */
        height: 250px; /* Fixed height for consistency */
        overflow: hidden; /* Hide overflow for contained text */
        display: flex; /* Use flexbox for alignment */
        flex-direction: column; /* Align content vertically */
        justify-content: flex-end; /* Align content to the bottom */
    }

    .blog-content {
        position: relative;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for text readability */
        padding: 15px;
        border-radius: 10px;
    }

    .blog-title {
        font-size: 1.5em;
        color: #d4b28c; /* Golden color */
        margin-bottom: 10px;
        font-weight: bold; /* Make title bold */
    }

    .blog-writer,
    .blog-description,
    .blog-date {
        margin-bottom: 10px;
    }

    .blog-description {
        max-height: 50px; /* Limit description height */
        overflow: hidden;
        text-overflow: ellipsis; /* Indicate overflowing text */
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Limit to 3 lines */
        -webkit-box-orient: vertical;
    }

    .separator {
        margin: 30px 0;
        border-bottom: 1px solid #5c4a46; /* Separator line */
    }
    .read-more-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #6f4e37; /* Medium brown button */
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.read-more-button:hover {
    background-color: #8a5a44; /* Darker brown on hover */
}
</style>

@extends('layout')

@section('title', 'Blogs')

@section('content')

    <div class="blogs-container">
        @foreach ($blogspassedtoview as $blog)
            <div class="blog-item" style="background-image: url('data:image/png;base64,{{ base64_encode($blog->image) }}');">
                <div class="blog-content">
                    <h2 class="blog-title">{{ $blog->title }}</h2>
                    <p class="blog-writer"><strong>By</strong> {{ $blog->writer_name }}</p>
                    
                    <p class="blog-description">{{ mb_strimwidth($blog->description, 0, 45, '...') }}</p>
                    <p class="blog-date">{{ $blog->publish_date }}</p>
                </div>
            </div>
            <a href="{{ route('blog',['blog_id'=>$blog->id]) }}" class="read-more-button">READ MORE</a>
            <div class="separator"></div>
        @endforeach
    </div>
@endsection
