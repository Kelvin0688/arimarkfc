<style>
  .navbar {
    position: sticky;
    top: 0;
    z-index: 1000;
    background-color: rgba(0, 0, 0, 0.8);
  }
  .nav-link {
    border-bottom: 4px solid transparent;
    transition: 0.3s ease;
  }
  .nav-link:hover {
    border-color: #004969;
  }
  .logo {
    height: 100px;
    width: 70px;
  }
  .logo-in {
    height: 140px;
    width: 100px;
    margin-left: 6%;
  }
  .club-name {
    font-size: 1.5rem;
    font-weight: bold;
    margin-left: 10px;
    color: #004969;
  }
  @media (max-width: 768px) {
    .logo {
      height: 70px;
      width: 49px;
      margin: 0;
    }
    .club-name {
      font-size: 1rem;
    }
  }
  @media (max-width: 991.98px) {
    .navbar-toggler {
      position: absolute;
      right: 1rem;
    }
    .navbar-brand.d-lg-none {
      display: block;
    }
    .navbar-brand.d-none.d-lg-block {
      display: none;
    }
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-top: 1px solid #ddd">
  <div class="container container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" style="border: none;">
      <i class="fa-solid fa-bars"></i>
    </button>
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="public/arimark.png" class="logo" alt="Logo">
      <span class="club-name">
        ARIMARK
        <span class="d-block d-md-none">FOOTBALL CLUB</span>
        <span class="d-none d-md-inline"> FOOTBALL CLUB</span>
      </span>
    </a>
    <div class="collapse navbar-collapse justify-content-end text-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="players.php">Players</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="events.php">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="spo_vol.php">Sponsors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center">
        <ul class="navbar-nav text-center">
          <a class="navbar-brand ms-auto text-center" href="index.php">
            <img src="public/arimark.png" class="logo-in" alt="Logo">
          </a>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="players.php">Players</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="events.php">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
        <div class="social-icons mt-3 d-flex mx-auto">
          <a href="#"><i class="fa-brands fa-facebook"></i></a>
          <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
