<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kingsley's Portfolio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Figtree:ital,wght@0,300..900;1,300..900&family=Special+Gothic+Expanded+One&display=swap" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/grid.css" rel="stylesheet">
  <script defer src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollToPlugin.min.js"></script>
  <script defer type="module" src="js/main.js"></script>
  <script defer type="module" src="js/animations.js"></script>
  <script defer type="module" src="js/contact.js"></script>

</head>
<body>

<div class="full-width-header">
  <header class="grid-con">

    <div id="header-logo" class="col-span-2 m-col-start-1 m-col-end-5 l-col-start-1 l-col-end-5">
      <img src="images/port-logo.png" alt="Kingsley Watson"/>
    </div>

    <button id="hamburger" class="col-start-4 col-end-4">&#9776;</button>

    <div class="overlay m-col-start-5 m-col-end-10 l-col-start-5 l-col-end-10" id="overlay">
      <button id="close">&#10005;</button>
      <nav id="menu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php">Projects</a></li>
          <li><a href="index.php">About Me</a></li>
        </ul>
      </nav>
    </div>

    <div class="nav-cta m-col-span-2 l-col-start-11 l-col-end-12">
      <a href="contact.php"><button class="btn-contact">Contact</button></a>
    </div>

  </header>
</div>


<section class="contact-page grid-con">

  <div class="contact-text col-span-full">
    <h2>Welcome!</h2>
    <p>I'm really excited to work with you!</p>

    <?php
      if (!empty($_GET['msg'])) {
        $display_msg = htmlspecialchars(urldecode($_GET['msg']), ENT_QUOTES, 'UTF-8');
        echo '<p class="form-feedback">' . $display_msg . '</p>';
      }
    ?>
  </div>

  <form class="contact-form col-span-full" id="contactForm">
  <div class="hidden">
    <label for="company">Company</label>
    <input type="text" id="company" name="company" tabindex="-1" autocomplete="off">
  </div>
  <input type="text" id="name" name="name" placeholder="Name" required>
  <input type="email" id="email" name="email" placeholder="Email" required>
  <textarea id="message" name="message" placeholder="Enter message here" rows="10" required></textarea>
  <button type="submit" id="submit">Send</button>
  <section id="feedback" class="form-feedback"></section>
</form>


</section>

<footer class="site-footer">
  <hr>
  <div class="footer-container grid-con">
    <div class="footer-about col-span-4 m-col-span-4 l-col-span-4">
      <h3>Kingsley Watson</h3>
      <p>I'm always open to new projects and collaborations. Feel free to reach out to me anytime!</p>
    </div>

    <div class="footer-links col-span-4 m-col-span-4 l-col-span-4">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php">Projects</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </div>

    <section class="footer-social col-span-4 m-col-span-4 l-col-span-4">
      <h4>Follow Me</h4>
      <ul class="social-icons">
        <li><a href="https://www.instagram.com/kingsley.watson" target="_blank"><img src="images/insta-logo.svg" alt="Instagram"></a></li>
        <li><a href="https://www.facebook.com" target="_blank"><img src="images/facebook-logo.svg" alt="Facebook"></a></li>
        <li><a href="https://www.x.com" target="_blank"><img src="images/x-logo1.svg" alt="X"></a></li>
      </ul>
    </section>
  </div>

  <div class="footer-bottom">
    <p>&copy; 2025 Kingsley Watson. All rights reserved.</p>
  </div>
</footer>

</body>
</html>