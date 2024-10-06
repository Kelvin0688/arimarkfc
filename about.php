<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ARIMARK FC | ABOUT</title>
  <link rel="icon" type="image/png" href="public/arimark.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body style="background-image: url(./public/back.png);">
 <!-- Preloader -->
 <div id="preloader">
        <div class="preloader-inner">
            <div class="spinner"></div>
                <h6 class="text-center">AFC...</h6> <!-- Optional text -->
        </div>
    </div>
    <div id="content"> 
      <!-- nav -->
      <header id="topbar"></header>
      <header id="navbar"></header>
      <!-- end nav -->
      
      <header class="about-header animate__animated" data-animate="animate__fadeInDown">
        <div class="header-content">
            <h1 class="mb-3">ABOUT US</h1> 
            <h5>Our Mission | Our Vision  </h5>
        </div>
      </header>

      <!-- main -->
      <!-- about -->
      <section id="about" class="about-section">
    <div class="container mb-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="public/10.jpg" alt="About Us Image" class="img-fluid animate__animated" data-animate="animate__fadeInLeft">
            </div>
            <div class="col-md-6">
                <h2 class="about-heading text-center animate__animated" data-animate="animate__fadeInRight">ABOUT ARIMARK FC</h2>
                <p class="animate__animated" data-animate="animate__fadeInRight">
                    Established on March 13, 2024, Arimark Football Club is located in Lashibi, Community 17, Ghana, West Africa. As an organization, we are committed to fostering the growth and development of young football talent by providing a holistic training environment. Our approach goes beyond technical skill development, focusing on nurturing both the physical abilities and personal growth of our players. 
                    <br><br>
                    With a dedicated team of experienced coaches, state-of-the-art facilities, and a strong emphasis on discipline, teamwork, and leadership, we prepare our athletes to excel both on and off the field. Arimark FC is more than just a club; it is a community where young athletes are empowered to pursue their passion, overcome challenges, and emerge as confident leaders and accomplished footballers.
                    <br><br>
                    Our mission is to create a sustainable ecosystem for sports excellence, where every player, regardless of background, is given the tools and opportunities to achieve their full potential. Join us in building the future of football and shaping the leaders of tomorrow.
                </p>
            </div>
        </div>
    </div>
</section>


        <!-- vision and Mission -->
        <section style="background-color: #F0F2F5;">
          <div class="container py-5">
            <div class="main-timeline-2">
              <div class="timeline-2 left-2 animate__animated" data-animate="animate__fadeInLeft">
                <div class="card" style="border: none;">
                  <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Our Vision</h4>
                    <p class="text-muted mb-4"><i class="far fa-clock" aria-hidden="true"></i> 2024</p>
                    <p class="mb-0 vismis">To be the leading football club in Ghana renowned for developing exceptional young talents who excel both on the field and in their communities, setting the standard for professional excellence and personal integrity in the sport.</p>
                  </div>
                </div>
              </div>
              <div class="timeline-2 right-2 animate__animated" data-animate="animate__fadeInRight">
                <div class="card" style="border: none;">
                  <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Our Mission</h4>
                    <p class="text-muted mb-4"><i class="far fa-clock" aria-hidden="true"></i> 2024</p>
                    <p class="mb-0 vismis">At Arimark Football Club, our mission is to foster the development of young football talents in Ghana by providing a comprehensive training environment that emphasizes both athletic excellence and personal growth. We are dedicated to nurturing our players into professionals on the pitch and responsible leaders off it, cultivating their skills, discipline, and character to achieve success in every aspect of their lives.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="myTeam">
          <div class="py-5 team4">
            <div class="container">
              <div class="row justify-content-center mb-4">
                <div class="col-md-7 text-center">
                  <h3 class="mb-3 animate__animated" data-animate="animate__fadeInDown">Experienced & Professional Team</h3>
                  <h6 class="subtitle animate__animated" data-animate="animate__fadeInUp">You can rely on our amazing features list and also our customer services will be a great experience for you without doubt and in no-time</h6>
                </div>
              </div>
        
              <div class="row justify-content-center mb-4">
                <div class="col-md-4 text-center animate__animated" data-animate="animate__zoomIn">
                  <img src="./public/c2.jpg" alt="Michael Ayomah, CEO" class="img-fluid rounded-circle mb-3 small-img">
                  <div class="pt-2">
                    <h5 class="mt-4 font-weight-medium mb-0">Michael A. Ayomah</h5>
                    <h6 class="subtitle mb-3">Chief Executive Officer</h6>
                    <p class="text-center">+233 542 961 432</p>
                  </div>
                </div>
              </div>
              
              <div class="container mt-5">
                <div class="row">
                    <?php
                    // Database connection
                    $db = mysqli_connect('localhost', 'root', '', 'arimarkfc');
                    if ($db->connect_error) {
                        die("Connection failed: " . $db->connect_error);
                    }

                    $results = mysqli_query($db, "SELECT * FROM staff");
                    while ($row = mysqli_fetch_array($results)) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="text-center animate__animated" data-animate="animate__zoomIn">
                                <img src="./admin/uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>" class="img-fluid rounded-circle mb-3 small-img">
                                <div class="pt-2">
                                    <h5 class="mt-4 font-weight-medium mb-0"><?php echo $row['name']; ?></h5>
                                    <h6 class="subtitle mb-3"><?php echo $row['position']; ?></h6>
                                    <p class="text-center"><?php echo $row['number']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
              
        
                
        
                
                
        
            
            </div>
          </div>
        </section>

        <button class="page-up-btn" id="pageUpBtn" onclick="scrollToTop()">↑</button>
      <!-- end main -->
      
      <!-- footer -->
      <footer id="footer"></footer>
      <!-- end footer -->
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/pageup.js"></script>

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

    // Inject Navbar and footer
    fetchAndInjectComponent('navbar.php', 'navbar');
    fetchAndInjectComponent('topbar.php', 'topbar');
    fetchAndInjectComponent('footer.php', 'footer');
    
    // Intersection Observer for animations
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add(entry.target.getAttribute('data-animate'));
          observer.unobserve(entry.target);
        }
      });
    });

    // Observe elements with the animate__animated class
    document.querySelectorAll('.animate__animated').forEach(element => {
      observer.observe(element);
    });
    
    </script>
</body>
</html>
