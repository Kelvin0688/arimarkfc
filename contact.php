<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARIMARK FC | HOME</title>
    <link rel="icon" type="image/png" href="public/arimark.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/players.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  </head>
<body>
    <!-- nav -->
        <header id="topbar"></header>
        <header id="navbar"></header>
    <!-- end nav -->

    <!-- main -->
    <header class="about-header animate__animated" data-animate="animate__fadeInDown">
      <div class="header-content">
          <h1 class="mb-3">CONTACT US</h1> 
          <h5>Get in touch with us</h5>
      </div>
    </header>

    <main>
      <section class="contact-section py-5">
          <div class="container">
              <h3 class="text-center mb-5 animate__animated" data-animate="animate__fadeInUp">Get in touch with us any time and any day</h3>
              <div class="row justify-content-center mb-3">
                  <div class="col-md-4 animate__animated" data-animate="animate__fadeInLeft">
                      <a href="tel:+233591420688">
                        <div class="card mb-4 contact-card text-center">
                            <div class="card-body">
                                <i class="fa-solid fa-phone contact-icon"></i>
                              
                                <p class="card-text text-center"><a href="tel:+233542961432">+233 542 961 432</a></p>
                            </div>
                        </div>
                      </a>
                  </div>
                  <div class="col-md-4 animate__animated" data-animate="animate__fadeInUp">
                    <a href="mailto:crata02@gmail.com">
                      <div class="card mb-4 contact-card text-center">
                          <div class="card-body">
                            <i class="fa-solid fa-envelope-circle-check contact-icon"></i>
                             
                              <p class="card-text text-center"><a href="mailto:crata02@gmail.com">arimarkfc.gh@gmail.com</a></p>
                          </div>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-4 animate__animated" data-animate="animate__fadeInRight">
                    <a href="https://maps.app.goo.gl/sytSVteUkeGjon7Z9">
                      <div class="card mb-4 contact-card text-center">
                          <div class="card-body">
                            <i class="fa-solid fa-location-crosshairs contact-icon"></i>
                             
                              <p class="card-text text-center"><a href="https://maps.app.goo.gl/sytSVteUkeGjon7Z9">Lashibi Community 17, Ghana</a></p>
                          </div>
                      </div>
                    </a>
                  </div>
              </div>
          </div>
      </section>
  </main>
    <!-- end main -->
    
    <!-- footer -->
        <footer id="footer"></footer>
    <!-- end footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
