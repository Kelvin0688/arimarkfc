<style>
  .top-bar {
    background-color: #f8f9fa;
    padding: 10px 9%;
    border-bottom: 1px solid #ddd;
  }
  .top-bar .contact-info, .top-bar .email-info {
    font-size: 0.9rem;
    margin-right: 15px;
  }
  .top-bar .email-info {
    margin-left: 10px;
  }
  .social-icons a {
    padding-left: 8px;
  }
  @media (max-width: 768px) {
    .top-bar {
      padding: 10px 1%;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .top-bar .contact-info, .top-bar .email-info {
      font-size: 0.7rem;
      margin-right: 0;
      margin-bottom: 0;
      display: block;
    }
    .social-icons {
      display: flex;
    }
  }
  @media (max-width: 576px) {
    .top-bar {
      flex-direction: column;
      align-items: flex-start;
    }
    .top-bar .contact-info, .top-bar .email-info {
      font-size: 0.7rem;
      margin-right: 0;
      margin-left: 0;
      margin-bottom: 5px;
      display: block;
    }
    .social-icons {
      align-self: flex-end;
    }
  }
  @media (min-width: 992px) {
    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
  }
</style>

<div class="top-bar">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="d-flex flex-column flex-sm-row">
      <div class="contact-info">
        <i class="fas fa-phone"></i>
        <a href="tel:+233591420688" style="text-decoration: none; color: black">+233542961432 / +233551678956 </a>
      </div>
      <div class="email-info">
        <i class="fas fa-envelope"></i>
        <a href="mailto:arimarkfc.gh@gmail.com" style="text-decoration: none; color: black">arimarkfc.gh@gmail.com</a>
      </div>
    </div>
    <div class="social-icons d-flex">
      <a href="https://www.facebook.com/profile.php?id=61558192913325" class="mx-1"><i class="fab fa-facebook"></i></a>
      <a href="#" class="mx-1"><i class="fab fa-twitter"></i></a>
      <a href="#" class="mx-1"><i class="fab fa-instagram"></i></a>
    </div>
  </div>
</div>
