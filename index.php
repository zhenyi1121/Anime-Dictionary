<?php

session_start();
include ('connection.php');
include ('header.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Slideshow</title>
    <style>
        body {
            background-color:rgb(227, 227, 227);
        }

        .homepage-container {
            display: flex;  /* Enables side-by-side layout */
            align-items: center;  /* Vertically centers both sections */
            justify-content: space-between;  /* Spaces out the text and slideshow */
            max-width: 1500px;  /* Prevents it from stretching too wide */
            margin: 5px auto;  /* Centers the container */
            
        }

        .welcome-message {
            width: 40%;  /* Takes up 40% of the available space */
            height:100%;
            padding:20px 20px;
            text-align: left;
            background: white;
            border: 2px solid black;
            border-radius: 5px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
            margin: 10px auto 20px auto; /* Center horizontally */
            font-weight:normal;
        }

        .welcome-message h1 {
            font-size: 28px;
            color: black;
        }

        .welcome-message p{
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }

        .welcome-message li {
            color:black;
        }

        .slideshow-container {
            position: relative;
            width: 800px;
            height: 481px; /* Adjust height to avoid blocking the menu */
            margin: 10px auto 20px auto; /* Center horizontally */
            margin-right: 10px; /* Align right */
            right: 0; /* Ensure it stays on the right */
            overflow: hidden;
            display: flex; /* Optional for flexible layout */
            justify-content: flex-end; /* Move container content to the right */
            border-radius:5px;
        }

        .slide {
            display: none;
            position: relative;
            z-index: -1;
        }

        .slide img {
            width: 800px; /* Fixed width */
            height: 481px; /* Fixed height */
            object-fit: fill; /* Ensures the image fills the container */
        }

        .description {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 0px 20px;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            height:30px;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            border-radius: 0 3px 3px 0;
            background-color: rgba(0, 0, 0, 0.5);
            user-select: none;
            z-index: 1; /* Ensure arrows are above the slides */
        }

        .prev {
            left: 0;
            border-radius: 3px 0 0 3px;
        }

        .next {
            right: 0;
            border-radius: 0 3px 3px 0;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        

        /* Ensure dropdown menu is above the slideshow */
        .dropdown-menu {
            position: relative;
            z-index: 20; /* Higher than the slideshow */
        }

         /* Responsive Design */
         @media (max-width: 768px) {
            .homepage-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
                width:90%
            }
            .welcome-message {
                width: 90%;
                font-size: 14px;
            }
            .welcome-message h1 {
                font-size: 24px;
            }
            .slideshow-container {
                width: 100%;
                height: auto;
            }
            .slide img {
                width: 650px; /* Fixed width */
                height: 481px; /* Fixed height */
                object-fit: fill; /* Ensures the image fills the container */
            }
            .description {
                font-size: 12px;
                padding: 3px 10px;
            }
            .prev, .next {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>

<div class="homepage-container">
    <div class="welcome-message">
        <h1>Welcome to ANIME DICTIONARY!</h1>
        <p>Welcome to your ultimate destination for anime lovers! Whether you're a lifelong otaku or just starting your anime journey, our platform is designed to bring you an exciting and interactive experience.</p>
        <p>🌟 Discover Legendary Anime - Explore a wide range of anime, from timeless classics to the latest trending series.</p>
        <p>🎯 Challenge Your Knowledge - Think you're an anime expert? Test your skills with quizzes tailored to each anime, featuring questions of varying difficulty levels!</p>
        <p>📖 Expand Your Anime Universe - Read about your favorite anime, learn fun facts, and connect with fellow anime enthusiasts.</p>
        <p>🚀 New Content Regularly! - We're always updating our library with new anime, quizzes, and exciting features. Stay tuned!</p>
        <p>Start your adventure now by browsing our anime collection or taking on a quiz challenge!</p>
    </div>


    <div class="slideshow-container">
        <div class="slide">
            <img src="anime1.png" alt="Anime 1">
            <div class="description">
                <h4>NARUTO</h4>
                <p></p>
            </div>
        </div>
        <div class="slide">
            <img src="anime2.png" alt="Anime 2" style="height:481px;">
            <div class="description">
                <h4>ONE PIECE</h4>
                <p></p>
            </div>
        </div>
        <div class="slide">
            <img src="anime3.png" alt="Anime 3">
            <div class="description">
                <h4>BLEACH</h4>
                <p></p>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>
</div>




<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function changeSlide(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        const slides = document.getElementsByClassName("slide");
        const dots = document.getElementsByClassName("dot");

        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }

        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }

    // Auto-slide functionality
    setInterval(() => changeSlide(1), 8000);
</script>

</body>
</html>





<?php include('footer.php') ?>