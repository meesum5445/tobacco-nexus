<style>
    .container {
        margin: 20px 30px 30px 30px;
        padding: 20px;
        background-color: #3e2d2b; 
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .product-item {
        display: flex; 
        margin-bottom: 20px;
        padding: 40px;
        background-color: #4b3a36; 
        border-radius: 10px;
        color: #ffffff;
    }

    .product-item .product-image {
        width: 500px; 
        margin-right: 20px;
        margin-left: 20px;
        border-radius: 10px; 
    }

    .product-item .details {
        flex: 1; 
        padding: 0 20px 0 20px;
    }

    .product-item h3 {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 2.5em; /* Enlarge heading font size */
        color: #d4b28c;
    }

    .product-item p {
        margin: 0;
        margin-bottom: 10px;
        font-size: 2em; /* Enlarge paragraph font size */
        display: flex;
    }
    .row-revers{
        flex-direction: row-reverse;
    }
    .star {
        font-size: 30px; 
    }
    .separator {
        margin: 30px 60px;
        border-bottom: 1px solid #5c4a46; /* Separator line */
    }
    .product-detail-desc
    {
        padding-top: 40px;
    }
    .carousel-container {
    position: relative;
    margin: 20px;
    height: 650px;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.carousel-slide {
    width: 100%;
    display: flex;
    transition: transform 0.5s ease-in-out;
    position: relative;
}

.carousel-slide img {
    min-width: 100%;
    width:600px;
    height: 650px;
    border-radius: 10px;
}

.carousel-controls {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}

.carousel-controls span {
    color: black;
    padding: 10px;
    cursor: pointer;
    border-radius: 50%;
    user-select: none;
}

.carousel-indicators {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 5px;
}

.carousel-indicators span {
    width: 10px;
    height: 10px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    cursor: pointer;
}

.carousel-indicators .active {
    background-color: white;
}
.carousel-slide-specific
{
    min-width:  100%;
    position: relative;
}
.blog-details{
    top:0px;
    position: absolute;
    margin: 20px 10px 10px 20px;
}
.blog-details h1{
    font-size: 50px; 
    color: #d4b28c;
}
.blog-details p{
    font-size: 20px; 
    color: #ffffff;
}

    
</style>

@extends('layout')

@section('title', 'Tobacco Nexus')

@section('content')
    <div class="container">
        @php
            $count = 0;
        @endphp
        {{-- carusal should be here --}}
        <div class="carousel-container">
            <div class="carousel-slide">
                @foreach ($top3blogspassedtoview as $blog)
                    
                        <div class="carousel-slide-specific">
                            <a href="{{route('blog',['blog_id'=>$blog->id])}}"><img src="data:image/png;base64,{{ base64_encode($blog->image) }}" alt="Product Image"> </a> 
                        <div class="blog-details">
                            <h1>{{$blog->title}}</h1>
                            <p class="blog-description">{{ mb_strimwidth($blog->description, 0, 100,'...') }}</p>
                        </div>
                    </div>
                        
                @endforeach
            </div>
            <div class="carousel-controls">
                <span id="prev">&#10094;</span>
                <span id="next">&#10095;</span>
            </div>
            <div class="carousel-indicators">
                @foreach ($top3blogspassedtoview as $index => $blog)
                    <span class="{{ $index == 0 ? 'active' : '' }}" data-slide-to="{{ $index }}"></span>
                @endforeach
            </div>
        </div>
        <div class="separator"></div>
        {{-- ............................... --}}
        @foreach ($top3productspassedtoview as $product)
        <a href="{{route('product',['product_id'=>$product->id])}}">
            @php
                $count++;
            @endphp
            <div class="product-item {{$count%2==0?"row-revers":""}}">
                <img src="data:image/png;base64,{{ base64_encode($product->image) }}" alt="Product Image" class="product-image">
                <div class="details">
                    <h3 >{{$product->name}}</h3>
                    <p class="product-detail-desc">{{$product->description}}</p>
                    @if($product->average_rating >= 1)
                        <span class="star">&#9733;</span>
                    @else
                        <span class="star">&#9734;</span>
                    @endif

                    @if($product->average_rating >= 2)
                        <span class="star">&#9733;</span>
                    @else
                        <span class="star">&#9734;</span>
                    @endif

                    @if($product->average_rating >= 3)
                        <span class="star">&#9733;</span>
                    @else
                        <span class="star">&#9734;</span>
                    @endif

                    @if($product->average_rating >= 4)
                        <span class="star">&#9733;</span>
                    @else
                        <span class="star">&#9734;</span>
                    @endif

                    @if($product->average_rating >= 5)
                        <span class="star">&#9733;</span>
                    @else
                        <span class="star">&#9734;</span>
                    @endif
                </div>
            </div>
        </a>
        <div class="separator"></div>
        @endforeach
    </div>
    <script>
        const slides = document.querySelector('.carousel-slide');
        const images = slides.querySelectorAll('img');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        const indicators = document.querySelectorAll('.carousel-indicators span');
        let currentIndex = 0;

        function updateCarousel() {
            slides.style.transform = `translateX(${-currentIndex * 100}%)`;
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentIndex);
            });
        }

        function showNextSlide() {
            currentIndex = (currentIndex + 1) % images.length;
            updateCarousel();
        }

        function showPrevSlide() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateCarousel();
        }

        nextButton.addEventListener('click', showNextSlide);
        prevButton.addEventListener('click', showPrevSlide);
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                currentIndex = index;
                updateCarousel();
            });
        });

        setInterval(showNextSlide, 3000); // Auto-slide every 3 seconds
    </script>
@endsection
