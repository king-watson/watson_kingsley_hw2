<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact — Kingsley Watson</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Figtree:ital,wght@0,300..900;1,300..900&family=Special+Gothic+Expanded+One&display=swap" rel="stylesheet">
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    
    <!-- Scripts -->
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollToPlugin.min.js"></script>
    <script defer type="module" src="js/main.js"></script>
    <script defer type="module" src="js/contact.js"></script>
</head>
<body>

<div class="full-width-header">
    <header class="grid-con">

        <div id="header-logo" class="col-span-2 m-col-start-1 m-col-end-3 l-col-start-1 l-col-end-3">
            <a href="index.php" class="logo">KW</a>
        </div>

        <button id="hamburger" class="col-start-4 col-end-4">&#9776;</button>

        <div class="overlay m-col-start-3 m-col-end-11 l-col-start-3 l-col-end-11" id="overlay">
            <button id="close">&#10005;</button>
            <nav id="menu">
                <ul>
                    <!-- Note: These point back to index.php sections -->
                    <li><a href="index.php#featured-work">Projects</a></li>
                    <li><a href="index.php#overview">About Me</a></li>
                    <li><a href="index.php#how2use">Skills</a></li>
                    
                    <!-- Integrated Mobile Contact/Logout -->
                    <li class="mobile-contact">
                        <?php if (isset($_SESSION['logged_in_user'])): ?>
                            <a href="/watson-kingsley-portfolio/logout.php">Logout</a>
                        <?php else: ?>
                            <a href="contact.php">Contact</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="nav-cta m-col-start-11 m-col-end-13 l-col-start-11 l-col-end-13">
            <?php if (isset($_SESSION['logged_in_user'])): ?>
                <a href="/watson-kingsley-portfolio/logout.php"><button class="btn-contact">Logout</button></a>
            <?php else: ?>
                <a href="contact.php"><button class="btn-contact">Contact</button></a>
            <?php endif; ?>
        </div>

    </header>
</div>

<section class="contact-page grid-con">
    <div class="contact-text col-span-full">
        <h2 class="contact-heading">Welcome!</h2>
        <p class="contact-sub">I'm really excited to work with you!</p>

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
        <button type="submit" id="submit" class="btn-primary">Send</button>
        <section id="feedback" class="form-feedback"></section>
    </form>
</section>

<footer class="site-footer">
    <div class="footer-container grid-con">
        <div class="footer-logo col-span-4 m-col-span-4 l-col-span-4">
            <h3>Kingsley Watson</h3>
        </div>
        <div class="footer-copy col-span-4 m-col-span-4 l-col-span-4">
            <p>&copy; 2026 All rights reserved.</p>
        </div>
        <div class="footer-social col-span-4 m-col-span-4 l-col-span-4">
            <ul class="social-icons">
                <li><a href="https://www.linkedin.com/in/kingsley-watson-53808b385" target="_blank"><img src="images/linkedin-logo-port.svg" alt="LinkedIn"></a></li>
                <li><a href="https://www.instagram.com/kwatson.motion" target="_blank"><img src="images/insta-logo.svg" alt="Instagram"></a></li>
                <li><a href="contact.php"><img src="images/email-logo-port.svg" alt="Email"></a></li>
            </ul>
        </div>
    </div>
</footer>

</body>
</html>