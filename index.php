<?php
$db = mysqli_connect('localhost', 'root', '', 'arimarkfc');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$positions = ['GoalKeeper', 'Defender', 'Midfielder', 'Forward'];
$players = [];

foreach ($positions as $position) {
    $query = "SELECT id, name, position, photo FROM players WHERE position = '$position' LIMIT 4";
    $result = mysqli_query($db, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $players[] = $row;
    }
}

mysqli_close($db);

function displayPlayers($players) {
    foreach ($players as $player) {
        echo '<div class="mb-2">';
        echo '<div class="p-front1">';
        echo '<img src="public/' . htmlspecialchars($player['photo']) . '" alt="" class="img-fluid">';
        echo '<h5 class="player-name mt-4">' . htmlspecialchars($player['name']) . '</h5>';
        echo '</div>';
        echo '</div>';
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARIMARK FC | HOME</title>
    <link rel="icon" type="image/png" href="public/arimark.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/players.css">

    <style>

        /* #about-us {
            background-color: #f9f9f9;
        } */

        #about-us h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #004969;
        }

        #about-us p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
        }

        .btn-outline-primary {
            color: #004969;
            border: 2px solid #004969;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #004969;
            color: #fff;
        }

        .image-container img {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .image-container img:hover {
            transform: scale(1.02);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        h5 {
            font-size: 1.2rem;
            margin-top: 10px;
            color: #ffffff;
        }

        .lead {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        @media (max-width: 576px) {
            h2 {
                font-size: 1.5rem;
            }
            
            h5 {
                font-size: 1rem;
            }
            
            .lead {
                font-size: 1rem;
            }
        }
        /* Default styling for navigation buttons */
        .prev-slide, .next-slide {
            padding: 10px;
            border-radius: 35%;
            font-size: 8px;
            cursor: pointer;
            position: absolute;
            top: 50%; /* Center vertically */
            transform: translateY(-50%); /* Adjust for vertical centering */
            background-color: rgba(0, 0, 0, 0.5); /* Optional: add a background for visibility */
            color: white; /* Optional: button text color */
        }

        /* Positioning for left and right buttons */
        .prev-slide {
            left: 2%;
        }

        .next-slide {
            right: 2%;
        }

        /* Larger screens (desktops) */
        @media (min-width: 992px) {
            .prev-slide, .next-slide {
                padding: 15px;
                font-size: 12px;
            }
        }

        /* Medium screens (tablets) */
        @media (min-width: 768px) and (max-width: 991px) {
            .prev-slide, .next-slide {
                padding: 12px;
                font-size: 10px;
            }
        }

        /* Small screens (phones) */
        @media (max-width: 767px) {
            .prev-slide, .next-slide {
                padding: 8px;
                font-size: 6px;
            }
        }

        /* Extra small screens */
        @media (max-width: 480px) {
            .prev-slide, .next-slide {
                padding: 6px;
                font-size: 5px;
            }
        }


        .nav-btn {
            position: absolute;
            top: 40%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.2rem;
            color: #fff;
        /* background: rgba(0, 0, 0, 0.5); */
            padding: 15px;
            border-radius: 50%;
        }
        h5.player-name {
            font-weight: 600;
            font-size: 1.25rem;
            color: #fff;
        }
        .owl-carousel .item {
            padding: 0; /* Ensure no padding */
            margin: 0; /* Ensure no margin */
            border: none; /* Ensure no border */
            background-color: transparent; /* Ensure no background color */
        }
        .owl-carousel .item img {
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .owl-carousel .item img:hover {
            transform: scale(1.1);
        }

        .nav-btn {
            background-color: rgba(0, 0, 0, 0.6);
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .nav-btn {
                font-size: 1rem;
                padding: 10px;
            }

            .player-name {
                font-size: 1rem;
            }

            .about-section .col-md-6 {
                text-align: center;
                margin-bottom: 20px;
            }

            .carousel .item {
                width: 100%;
            }

            .footer, .navbar {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Adjust carousel items */
        .owl-carousel .item {
            padding: 5px;
            display: flex;
            justify-content: center;
            text-align: center;
        }
        .owl-carousel .item img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
        }

        /* Example of using CSS variables */
        :root {
            --primary-color: #0056b3;
            --secondary-color: #6c757d;
        }

        body {
            background-color: var(--primary-color);
            color: var(--secondary-color);
        }

        .video-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1; /* Ensure the video stays behind the content */
        }

        .video-wrapper iframe {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            transform: translate(-50%, -50%);
            border: 0;
        }
        .bg-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
        }

        /* .arimark-header {
            position: relative;
            height: 100vh;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5); 
        }

        .header-content h1, .header-content h5 {
            position: relative;
            z-index: 2;
        } */
       
    @media (max-width: 768px) {
        .arimark-header {
            height: 100vh;
        }
        .header-content h1 {
            font-size: 2rem;
        }
        .header-content h5 {
            font-size: 1.2rem;
        }
        .container {
            padding: 0 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .header-content h1 {
            font-size: 1.5rem;
        }
        .header-content h5 {
            font-size: 1rem;
        }
        .container {
            padding: 0 1rem;
        }
    }
    .player-name{
        color:white;
    }

    @media (max-width: 768px) {
        .arimark-header .header-content {
            background-color: #004969;
            width: 100%;
            padding: 20px;
        }
        .arimark-header .container {
            justify-content: flex-start;
            align-items: center;
        }
    }
    
    #players-header img {
        border: 0px;
        padding: 0px;
    }
    /* .p-front1 {
    overflow: hidden;
    height: 260px;
    width: 200px;
    position: relative;
    cursor: pointer;
    margin: 0 auto; 
    box-shadow: 0 0 25px 1px rgba(0, 0, 0, .3);
    transition: .5s;
    border: none;
    padding: 0;
    background-color: transparent;
     
} */

.owl-carousel .owl-stage {
    display: flex;
    justify-content: center; /* Center the carousel items */
}

.owl-carousel .owl-item {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* @media (max-width: 768px) {
    .p-front1 {
        width: 180px;
    }
}

@media (max-width: 450px) {
    .p-front1 {
        width: 150px; 
    }
} */
        #highlights h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #004969;
        }

        .ratio {
            transition: transform 0.3s ease;
        }

        .ratio:hover {
            transform: scale(1.02); /* Slight zoom on hover */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .text-muted {
            font-size: 0.9rem;
            color: #666;
        }             
    </style>
</head>
<body style="background-image: url(./public/back.png);">
 <!-- Preloader -->
    <!-- <div id="preloader">
        <div class="preloader-inner">
            <div class="spinner"></div>
                <h6 class="text-center">AFC...</h6> 
    </div> -->

    <div id="content">
        <!-- nav -->
        <!-- Navbar -->

    <!-- Navbar content -->

        <header id="topbar"></header>
        <header id="navbar"></header>
        <!-- end nav -->

        <!-- header -->
        <!-- <header class="arimark-header animate__animated" data-animate="animate__fadeInUp" style="background-image: url(./public/train.jpg);">
            <div class="container">
            <div class="header-content">
                <h1 class="mb-3 animate__animated" data-animate="animate__bounceInLeft">ARIMARK FOOTBALL CLUB</h1> 
                <h5 class="animate__animated" data-animate="animate__bounceInRight">Dream Big | Work Hard | Achieve Greatness</h5>
            </div>
            </div>
        </header> -->

        <header class="arimark-header animate__animated" data-animate="animate__fadeInUp" style="position: relative; overflow: hidden;">
            <div class="image-wrapper" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; overflow: hidden;">
                <img src="./public/11.jpg" alt="Training Image" 
                    style="width: 100vw; height: 100vh; object-fit: cover;">
            </div>
            <div class="container" style="position: relative; z-index: 2; display: flex; align-items: center; justify-content: flex-start; height: 100vh; text-align: left;">
                <div class="header-content" style="padding: 20px; background: linear-gradient(90deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%);">
                    <h1 class="mb-3 animate__animated" data-animate="animate__bounceInLeft" style="color: #ffffff; font-size: 3rem; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7); font-weight: bold;">ARIMARK FOOTBALL ACADEMY</h1>
                    <h5 class="animate__animated" data-animate="animate__bounceInRight" style="color: #ffffff; font-size: 1.5rem; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);">Dream Big | Work Hard | Achieve Greatness</h5>
                </div>
            </div>
        </header>
        <!-- pictures -->
        <div class="owl-carousel owl-theme mt-2 mb-3" data-aos="zoom-in">
            <div class="item"><a href="./public/2.jpg" data-fancybox="gallery"><img src="./public/2.jpg" alt="Image 2"></a></div>
            <div class="item"><a href="./public/3.jpg" data-fancybox="gallery"><img src="./public/3.jpg" alt="Image 3"></a></div>
            <div class="item"><a href="./public/4.jpg" data-fancybox="gallery"><img src="./public/4.jpg" alt="Image 4"></a></div>
            <div class="item"><a href="./public/5.jpg" data-fancybox="gallery"><img src="./public/5.jpg" alt="Image 5"></a></div>
            <div class="item"><a href="./public/6.jpg" data-fancybox="gallery"><img src="./public/6.jpg" alt="Image 6"></a></div>
            <div class="item"><a href="./public/7.jpg" data-fancybox="gallery"><img src="./public/7.jpg" alt="Image 7"></a></div>
        </div>

   <!-- About Us Section -->
<section id="about-us" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <!-- Text Section -->
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="mb-4 animate__animated animate__fadeInDown" style="font-weight: 700; color: #004969;">
                    About Us
                </h2>
                <p class="lead animate__animated animate__fadeInUp" style="font-size: 1.1rem; color: #555; line-height: 1.6;">
                    Established on March 13, 2024, Arimark Football Club, located in Lashibi, Community 17, Ghana, West Africa, is dedicated to fostering the growth of young soccer talents. Our comprehensive training programs focus on both athletic excellence and personal development, creating the perfect environment for aspiring athletes to flourish.
                </p>
                <div class="text-center text-md-start mt-4 animate__animated animate__fadeInUp">
                    <a class="btn btn-outline-primary px-4 py-2" href="about.php" style="font-weight: 600;">
                        Read More
                    </a>
                </div>
            </div>
            <!-- Image Section -->
            <div class="col-md-6 animate__animated animate__fadeInLeft image-container">
                <img src="public/10.jpg" alt="About Us Image" class="img-fluid rounded shadow-lg" style="border-radius: 15px;">
            </div>
        </div>
    </div>
</section>


       <!-- Highlights Section -->
        <section id="highlights" class="py-5">
            <div class="container">
                <!-- Section Header -->
                <h2 class="text-center mb-5 animate__animated animate__fadeInRight" style="font-weight: 700;">
                    Highlights
                </h2>
                
                <div class="row">
                    <!-- Video 1 -->
                    <div class="col-md-6 col-sm-12 mb-4 animate__animated animate__fadeInLeft">
                        <div class="ratio ratio-16x9 shadow-sm rounded border">
                            <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F61558192913325%2Fvideos%2F807141318044859%2F&show_text=false&width=560&t=0"
                                    width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                    allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                            </iframe>
                        </div>
                        <p class="text-muted mt-3 text-center">Game Highlights - Match Day 1</p>
                    </div>
                    
                    <!-- Video 2 -->
                    <div class="col-md-6 col-sm-12 mb-4 animate__animated animate__fadeInRight">
                        <div class="ratio ratio-16x9 shadow-sm rounded border">
                            <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F61558192913325%2Fvideos%2F807141318044859%2F&show_text=false&width=560&t=0"
                                    width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                    allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                            </iframe>
                        </div>
                        <p class="text-muted mt-3 text-center">Game Highlights - Match Day 2</p>
                    </div>
                </div>
            </div>
        </section>

                        

           <!-- Players Section -->
            <!-- Players Section -->
            <section id="players-header" class="bg-dark text-white py-5">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h2 class="mb-4 text-white animate__animated animate__fadeInDown" style="font-weight: 700; color: #00bfff;">
                                Meet The Team
                            </h2>
                            <div class="the-team owl-carousel owl-theme mt-4 animate__animated animate__zoomIn">
                                <?php displayPlayers($players); ?>
                            </div>
                            <div class="text-center mt-5 animate__animated animate__fadeInUp">
                                <a class="btn btn-outline-light px-4 py-2 text-center" href="players.php" style="font-weight: 600; border: 2px solid #e6e6e6;">
                                    View Full Team
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        <!-- Sponsor Section -->
        <!-- <section id="sponsors" class="sponsor-section py-5 bg-light animate__animated" data-animate="animate__zoomIn">
            <div class="container">
                <h2 class="text-center mb-4 animate__animated" data-animate="animate__fadeInDown">Our Sponsors</h2>
                <p class="text-center lead mb-5 animate__animated" data-animate="animate__fadeInUp">A heartfelt thank you to our partners who help us achieve our dreams and aspirations.</p>
                <div class="row justify-content-center">

                    <div class="col-md-4 col-lg-3 col-sm-6 mb-4">
                        <div class="sponsor text-center">
                            <img src="./public/gfa.png" alt="GFA" class="img-fluid grayscale-img animate__animated" data-animate="animate__fadeIn">
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

<!-- Training Programs Section -->
<section id="training-programs" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 animate__animated animate__fadeInDown" style="font-weight: 700; color: #004969; letter-spacing: 1px;">
            Our Training Programs
        </h2>
        <div class="row text-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="p-5 shadow-sm rounded bg-white animate__animated animate__fadeInUp" style="transition: transform 0.3s ease-in-out;">
                    <h3 class="h6 font-weight-bold mb-3" style="font-weight: 700; color: #004969; text-transform: uppercase;">Skill Development</h3>
                    <p class="text-muted" style="font-size: 1rem; color: #555">
                        Focused drills to improve ball control, dribbling, passing, and shooting techniques.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="p-5 shadow-sm rounded bg-white animate__animated animate__fadeInUp" style="transition: transform 0.3s ease-in-out;">
                    <h3 class="h6 font-weight-bold mb-3" style="font-weight: 700; color: #004969; text-transform: uppercase;">Physical Fitness</h3>
                    <p class="text-muted" style="font-size: 1rem; color: #555">
                        Structured fitness programs to build endurance, strength, speed and agility on the field.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="p-5 shadow-sm rounded bg-white animate__animated animate__fadeInUp" style="transition: transform 0.3s ease-in-out;">
                    <h3 class="h6 font-weight-bold mb-3" style="font-weight: 700; color: #004969; text-transform: uppercase;">Team Dynamics</h3>
                    <p class="text-muted" style="font-size: 1rem; color: #555">
                    Training sessions focused on teamwork, strategy, effective communication, and leadership development. 
                </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action for Sponsors and Volunteers -->
<section id="sponsors-volunteers" class="py-5 bg-dark text-white">
    <div class="container text-center">
        <h2 class="mb-4 animate__animated animate__fadeInDown" style="font-weight: 700; letter-spacing: 1px;">Support Our Academy</h2>
        <p class="mb-5 text-muted animate__animated animate__fadeInUp" style="font-size: 1.1rem; line-height: 1.8;">
            Join us in our journey to shape the future of young football talents. Your support, whether as a sponsor or volunteer, can make a significant difference in the lives of these aspiring athletes.
        </p>
        <div class="animate__animated animate__fadeInUp">
            <a href="spo_vol.php" class="btn btn-lg btn-primary me-3 px-5 py-3" style="border-radius: 50px; transition: background-color 0.3s ease-in-out;">Become a Sponsor</a>
            <a href="#contact" class="btn btn-lg btn-outline-light px-5 py-3" style="border-radius: 50px; transition: color 0.3s ease-in-out;">Volunteer</a>
        </div>
    </div>
</section>





        <button class="page-up-btn" id="pageUpBtn" onclick="scrollToTop()">↑</button>

        <!-- footer -->
        <footer id="footer" data-aos="fade-up"></footer>
        
        <!-- end footer -->
    </div>

    <script>
        // Function to fetch and inject HTML component
        function fetchAndInjectComponent(url, containerId) {
            fetch(url)
            .then(response => response.text())
            .then(html => {
                document.getElementById(containerId).innerHTML = html;
            })
            .catch(error => console.error('Error fetching component:', error));
        }

        // Inject Navbar, footer and main
        fetchAndInjectComponent('footer.php', 'footer');
        fetchAndInjectComponent('topbar.php', 'topbar');
        fetchAndInjectComponent('navbar.php', 'navbar');
    </script>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
    <script src="js/pageup.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();

            $(".owl-carousel").owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                navText: [
                    "<div class='nav-btn prev-slide'><i class='fa-solid fa-circle-left'></i></div>",
                    "<div class='nav-btn next-slide'><i class='fa-solid fa-circle-right'></i></div>"
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    998: {
                        items: 6
                    }
                },
                slideSpeed: 600,
                smartSpeed: 800
            });

            $("[data-fancybox]").fancybox({
                buttons: [
                    "zoom",
                    "slideShow",
                    "thumbs",
                    "close"
                ]
            });
        });
        
        // Text Animation
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.animate__animated[data-animate]');

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add(entry.target.dataset.animate);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            elements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>
</html>
