<?php
session_start();
use Portfolio\Database;
spl_autoload_register(function ($class) {
    $class = str_replace('Portfolio\\', '', $class);
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $filepath = __DIR__ . '/includes/classes/' . $class . '.php';
    $filepath = str_replace("/", DIRECTORY_SEPARATOR, $filepath);
    require_once $filepath;
});

$db = new Database();
$projects = $db->query('SELECT * FROM projects WHERE is_deleted = 0 ORDER BY created_at DESC;');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <title>Kingsley Watson — Motion & Graphic Designer</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Figtree:ital,wght@0,300..900;1,300..900&family=Special+Gothic+Expanded+One&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollToPlugin.min.js"></script>
    <link href="css/grid.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <script defer type="module" src="js/main.js"></script>
    <script defer type="module" src="js/animations.js"></script>
    <script defer type="module" src="js/contact.js"></script>
</head>

<body <?php if (isset($_SESSION['logged_in_user'])) echo 'class="is-admin"'; ?>>

<?php if (isset($_SESSION['logged_in_user'])): ?>
<div class="admin-hud">
    <p class="admin-hud-text">Logged in as <span class="admin-hud-username"><?= $_SESSION['logged_in_user']['username'] ?></span></p>
    <div class="admin-hud-actions">
        <a href="/watson-kingsley-portfolio/logout.php" class="admin-hud-btn">Logout</a>
    </div>
</div>
<?php endif; ?>

<div class="full-width-header">
    <header class="grid-con">

        <div id="header-logo" class="col-span-2 m-col-start-1 m-col-end-3 l-col-start-1 l-col-end-3">
            <a href="index.html" class="logo">KW</a>
        </div>

        <button id="hamburger" class="col-start-4 col-end-4">&#9776;</button>

        <div class="overlay m-col-start-3 m-col-end-11 l-col-start-3 l-col-end-11" id="overlay">
            <button id="close">&#10005;</button>
            <nav id="menu">
                <ul>
                    <li><a href="#featured-work">Projects</a></li>
                    <li><a href="#overview">About Me</a></li>
                    <li><a href="#how2use">Skills</a></li>
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


<div class="hero-wrap">
    <section id="hero">
        <div class="grid-con">

            <div class="hero-body col-span-4 m-col-start-1 m-col-end-7 l-col-start-1 l-col-end-6">
                <div class="hero-avail">
                    <span class="hero-dot"></span>
                    <span class="hero-avail-text">Available for work</span>
                </div>
                <h1 class="hero-title">
                    I'm <span class="accent">Kingsley<br>Watson.</span>
                </h1>
                <p class="hero-desc">
                    Motion & Graphic Designer based in Canada. Graduating Fanshawe College, April 2026.
                </p>
                <div class="hero-actions">
                    <a href="#featured-work" class="btn-primary">View My Work</a>
                    <a href="images/watson_kingsley_resume.pdf" class="btn-secondary" download>Download CV</a>
                </div>
            </div>

            <div class="hero-img col-span-4 m-col-start-7 m-col-end-13 l-col-start-7 l-col-end-13">
                <div class="photo-wrapper">
                    <img src="images/pic-of-me-f.png" alt="Kingsley Watson" class="profile-photo"/>
                    <div class="badge-circle">Available<br/>for Work</div>
                </div>
            </div>

        </div>
    </section>

    <div class="ticker-bar">
        <div class="ticker-track">
            <span class="ticker-hi">✦ Graphic Design</span>
            <span>✦ Branding</span>
            <span class="ticker-hi">✦ Motion Design</span>
            <span>✦ Marketing</span>
            <span class="ticker-hi">✦ Graphic Design</span>
            <span>✦ Branding</span>
            <span class="ticker-hi">✦ Motion Design</span>
            <span>✦ Marketing</span>
            <span class="ticker-hi">✦ Graphic Design</span>
            <span>✦ Branding</span>
            <span class="ticker-hi">✦ Motion Design</span>
            <span>✦ Marketing</span>
            <span class="ticker-hi">✦ Graphic Design</span>
            <span>✦ Branding</span>
            <span class="ticker-hi">✦ Motion Design</span>
            <span>✦ Marketing</span>
        </div>
    </div>
</div>


<section class="featured-work grid-con" id="featured-work">

    <div class="featured-header col-span-full m-col-start-1 m-col-end-12 l-col-start-1 l-col-end-12">
        <span class="section-label">02 / Featured Projects</span>
        <h2 class="featured-heading">My Work</h2>
        <p class="featured-subtext">Hover to see more</p>
    </div>

    <?php if (isset($_SESSION['logged_in_user'])): ?>
    <div class="col-span-full admin-add-form">
        <h3 class="admin-add-form-title">Add New Project</h3>

        <?php if (!empty($_SESSION['error_messages'])): ?>
            <?php foreach ($_SESSION['error_messages'] as $error): ?>
                <p class="admin-error-message"><?= $error ?></p>
            <?php endforeach; ?>
        <?php endif; ?>

        <form method="POST" action="/watson-kingsley-portfolio/includes/scripts/projects.php">
            <input type="hidden" name="action" value="insert">
            <div class="admin-form-group">
                <label class="admin-form-label">Title</label>
                <input type="text" name="title" class="admin-form-input" />
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Description</label>
                <textarea name="description" class="admin-form-textarea"></textarea>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Image URL</label>
                <input type="text" name="image" class="admin-form-input" />
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Project Link</label>
                <input type="text" name="link" class="admin-form-input" />
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Tag</label>
                <input type="text" name="tag" class="admin-form-input" />
            </div>
            <button type="submit" class="admin-form-submit">Add Project</button>
        </form>
    </div>
    <?php endif; ?>

    <div class="work-inner col-span-full l-col-start-1 l-col-end-13">

        <?php foreach ($projects as $project): ?>
            <?php $tag = explode('|', $project['tag'])[0]; ?>
            <div class="work-box">
                <img src="<?= $project['image'] ?>" alt="<?= $project['title'] ?>" class="work-img">
                <div class="work-overlay">
                    <span class="work-tag"><?= $tag ?></span>
                    <h3 class="work-title"><?= $project['title'] ?></h3>
                    <p class="work-desc"><?= $project['description'] ?></p>
                    <a href="<?= $project['link'] ?>" class="work-btn">View Project &#8599;</a>
                </div>

                <?php if (isset($_SESSION['logged_in_user'])): ?>
                <div class="admin-project-controls">

                    <form method="POST" action="/watson-kingsley-portfolio/includes/scripts/projects.php">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?= $project['id'] ?>">
                        <div class="admin-form-group">
                            <label class="admin-form-label">Title</label>
                            <input type="text" name="title" value="<?= $project['title'] ?>" class="admin-form-input" />
                        </div>
                        <div class="admin-form-group">
                            <label class="admin-form-label">Description</label>
                            <textarea name="description" class="admin-form-textarea"><?= $project['description'] ?></textarea>
                        </div>
                        <div class="admin-form-group">
                            <label class="admin-form-label">Image URL</label>
                            <input type="text" name="image" value="<?= $project['image'] ?>" class="admin-form-input" />
                        </div>
                        <div class="admin-form-group">
                            <label class="admin-form-label">Project Link</label>
                            <input type="text" name="link" value="<?= $project['link'] ?>" class="admin-form-input" />
                        </div>
                        <div class="admin-form-group">
                            <label class="admin-form-label">Tag</label>
                            <input type="text" name="tag" value="<?= $project['tag'] ?>" class="admin-form-input" />
                        </div>
                        <div class="admin-control-buttons">
                            <button type="submit" class="admin-btn-update">Update Project</button>
                        </div>
                    </form>

                    <form method="POST" action="/watson-kingsley-portfolio/includes/scripts/projects.php">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $project['id'] ?>">
                        <div class="admin-control-buttons">
                            <button type="submit" class="admin-btn-delete">Delete Project</button>
                        </div>
                    </form>

                </div>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>

    </div>
</section>


<section id="overview">
    <div class="grid-con">

        <div class="overview-header col-span-full">
            <span class="section-label">03 / About Me</span>
            <h2 class="section-title">Hi, It's Me</h2>
        </div>

        <div class="overview-left col-span-full m-col-start-1 m-col-end-13 l-col-start-1 l-col-end-8">
            <p class="overview-quote">
                Driven to create something I can <span class="overview-highlight">truly be proud of.</span>
            </p>
            <div class="overview-cards">
                <div class="overview-card">
                    <span class="card-num">01</span>
                    <div class="card-icon">🎮</div>
                    <h3>Gaming & Hockey</h3>
                    <p>Gaming with friends, watching or playing hockey, and cheering on the Toronto Maple Leafs.</p>
                </div>
                <div class="overview-card">
                    <span class="card-num">02</span>
                    <div class="card-icon">👾</div>
                    <h3>Anime & Pokémon</h3>
                    <p>Gengar is my all-time favourite and Death Note is my go-to anime. I'm proud to be a nerd.</p>
                </div>
                <div class="overview-card">
                    <span class="card-num">03</span>
                    <div class="card-icon">🎵</div>
                    <h3>Music</h3>
                    <p>Playlists on repeat with The Kid Laroi, Juice WRLD, and DC The Don. Music never stops.</p>
                </div>
                <div class="overview-card">
                    <span class="card-num">04</span>
                    <div class="card-icon">🌊</div>
                    <h3>Nature & Travel</h3>
                    <p>Beach days, outdoor exploring, and getting inspired by travel videos and new places worldwide.</p>
                </div>
            </div>
        </div>

        <div class="overview-right col-span-full m-col-start-1 m-col-end-13 l-col-start-9 l-col-end-13">
            <div class="overview-problem">
                <div class="problem-inner">
                    <h3>Inside My Mind</h3>
                    <p>I'm a 19-year-old student driven by a passion to create something meaningful from start to finish — something I can truly be proud of.</p>
                </div>
            </div>
            <div class="stat-row">
                <div class="stat-item">
                    <span class="stat-num">2+</span>
                    <span class="stat-label">Years designing</span>
                </div>
                <div class="stat-item">
                    <span class="stat-num">6</span>
                    <span class="stat-label">Tools mastered</span>
                </div>
                <div class="stat-item">
                    <span class="stat-num">19</span>
                    <span class="stat-label">Years old</span>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="hero-video grid-con">
    <div class="col-span-full">
        <span class="section-label">04 / Demo Reel</span>
        <h2 class="section-title">Watch My Reel</h2>
    </div>
    <div class="video-container col-span-full m-col-start-1 m-col-end-13 l-col-start-2 l-col-end-12">
        <video controls poster="images/demo-reel-thumbail.jpg" id="hero-video">
            <source src="videos/demo-reel.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>


<section id="how2use">
    <div class="grid-con">

        <div class="howto-header col-span-full">
            <span class="section-label">05 / Software Skills</span>
            <h2 class="section-title">Tools I Use</h2>
        </div>

        <div class="howto-step col-span-2 m-col-span-2 l-col-span-2">
            <img src="images/photoshop-logo.svg" alt="Photoshop">
            <h3>Photoshop</h3>
        </div>
        <div class="howto-step col-span-2 m-col-span-2 l-col-span-2">
            <img src="images/after-effects-logo.svg" alt="After Effects">
            <h3>After Effects</h3>
        </div>
        <div class="howto-step col-span-2 m-col-span-2 l-col-span-2">
            <img src="images/premiere-logo.svg" alt="Premiere">
            <h3>Premiere</h3>
        </div>
        <div class="howto-step col-span-2 m-col-span-2 l-col-span-2">
            <img src="images/illustrator-logo.svg" alt="Illustrator">
            <h3>Illustrator</h3>
        </div>
        <div class="howto-step col-span-2 m-col-span-2 l-col-span-2">
            <img src="images/cinema-logo.svg" alt="Cinema 4D">
            <h3>Cinema 4D</h3>
        </div>
        <div class="howto-step col-span-2 m-col-span-2 l-col-span-2">
            <img src="images/figma-logo.svg" alt="Figma">
            <h3>Figma</h3>
        </div>

        <div class="howto-load-more col-span-full">
            <button id="load-more-btn">See more...</button>
        </div>

    </div>
</section>


<section class="contact-cta" id="contact-cta">
    <div class="contact-inner">
        <div class="contact-text">
            <span class="section-label">06 / Contact</span>
            <span class="contact-pill">Let's Talk</span>
            <h2 class="contact-heading">Got a project<br>in mind?</h2>
            <p class="contact-sub">Let's create something amazing together.</p>
            <div class="contact-tags">
                <span class="contact-tag">Motion Design</span>
                <span class="contact-tag">Branding</span>
                <span class="contact-tag">Graphic Design</span>
            </div>
        </div>
        <a href="contact.php" class="contact-right">
            <span class="contact-arrow">&#10132;</span>
            <span class="contact-cta-text">Let's Talk</span>
        </a>
    </div>
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
                <li><a href="https://www.linkedin.com" target="_blank"><img src="images/linkedin-logo-port.svg" alt="LinkedIn"></a></li>
                <li><a href="https://www.instagram.com/kingsley.watson" target="_blank"><img src="images/insta-logo.svg" alt="Instagram"></a></li>
                <li><a href="mailto:your@email.com"><img src="images/email-logo-port.svg" alt="Email"></a></li>
            </ul>
        </div>

    </div>
</footer>

</body>
</html>
<?php
$_SESSION['error_messages'] = [];
?>