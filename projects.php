<?php
require 'php/connect.php';

$id = (int)$_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM projects WHERE id = :id AND is_deleted = 0');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$project = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$project) {
    header('Location: index.php');
    exit;
}

$title        = $project['title'];
$overview     = $project['overview'] ?? '';
$process      = $project['process'] ?? '';
$problem      = $project['problem'] ?? '';
$result       = $project['result'] ?? '';
$banner_image = $project['banner_image'] ?? '';
$video_src    = $project['video_src'] ?? '';

$tag_items  = !empty($project['tag']) ? explode('|', $project['tag']) : [];
$goal_items = !empty($project['goal']) ? explode('|', $project['goal']) : [];
$team_items = !empty($project['team_members']) ? explode('|', $project['team_members']) : [];
$deep_dives = array_filter([
    $project['deep_dive_1'] ?? '',
    $project['deep_dive_2'] ?? '',
    $project['deep_dive_3'] ?? '',
    $project['deep_dive_4'] ?? '',
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?> — Kingsley Watson</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Figtree:ital,wght@0,300..900;1,300..900&family=Special+Gothic+Expanded+One&display=swap" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/grid.css" rel="stylesheet">
  <script defer type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
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
          <li><a href="index.php#featured-work">Projects</a></li>
          <li><a href="index.php#about">About Me</a></li>
        </ul>
      </nav>
    </div>
    <div class="nav-cta m-col-span-2 l-col-start-11 l-col-end-12">
      <a href="contact.php"><button class="btn-contact">Contact</button></a>
    </div>
  </header>
</div>

<main>

  <!-- BANNER -->
  <section class="seven-hero grid-con">
    <div class="seven-hero-image col-span-4 m-col-start-1 m-col-end-13 l-col-start-2 l-col-end-12">
      <img src="<?php echo $banner_image; ?>" alt="<?php echo $title; ?> Hero Image" class="seven-hero-img">
    </div>
  </section>

  <!-- OVERVIEW -->
  <section class="seven-overview grid-con">
    <article class="seven-overview-text col-span-4 m-col-start-1 m-col-end-13 l-col-start-2 l-col-end-12">
      <h1 class="seven-overview-title"><?php echo $title; ?></h1>

      <h2 class="seven-overview-subtitle">Description</h2>
      <p class="seven-overview-desc"><?php echo $overview; ?></p>

      <h2 class="seven-overview-subtitle">Type</h2>
      <ul class="seven-overview-tags">
        <?php foreach ($tag_items as $t): ?>
          <li class="seven-overview-tag"><?php echo $t; ?></li>
        <?php endforeach; ?>
      </ul>

      <?php if (!empty($team_items)): ?>
      <h2 class="seven-overview-subtitle">Team Members</h2>
      <ul class="seven-overview-tags">
        <?php foreach ($team_items as $member): ?>
          <li class="seven-overview-tag"><?php echo $member; ?></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </article>
  </section>

  <!-- GOAL -->
  <?php if (!empty($goal_items)): ?>
  <section class="seven-goal grid-con">
    <article class="seven-goal-text col-span-4 m-col-start-1 m-col-end-13 l-col-start-2 l-col-end-12">
      <h2 class="seven-goal-title">GOAL</h2>
      <ol class="seven-goal-list">
        <?php foreach ($goal_items as $goal): ?>
          <li><?php echo $goal; ?></li>
        <?php endforeach; ?>
      </ol>
    </article>
  </section>
  <?php endif; ?>

  <!-- PROCESS -->
  <?php if (!empty($process)): ?>
  <section class="seven-process grid-con">
    <article class="seven-process-text col-span-4 m-col-start-1 m-col-end-13 l-col-start-2 l-col-end-12">
      <h2 class="seven-process-title">PROCESS</h2>
      <p class="seven-process-desc"><?php echo $process; ?></p>
    </article>
  </section>
  <?php endif; ?>

  <!-- PROBLEM -->
  <?php if (!empty($problem)): ?>
  <section class="seven-problem grid-con">
    <article class="seven-problem-text col-span-4 m-col-start-1 m-col-end-13 l-col-start-2 l-col-end-12">
      <h2 class="seven-problem-title">PROBLEM</h2>
      <p class="seven-problem-desc"><?php echo $problem; ?></p>
    </article>
  </section>
  <?php endif; ?>

  <!-- DEEP DIVE IMAGES -->
  <?php if (!empty($deep_dives)): ?>
  <section class="seven-deepdive grid-con">
    <?php
    $positions = [
      'col-span-4 m-col-start-1 m-col-end-7 l-col-start-2 l-col-end-7',
      'col-span-4 m-col-start-7 m-col-end-13 l-col-start-7 l-col-end-12',
      'col-span-4 m-col-start-1 m-col-end-7 l-col-start-2 l-col-end-7',
      'col-span-4 m-col-start-7 m-col-end-13 l-col-start-7 l-col-end-12',
    ];
    $i = 0;
    foreach ($deep_dives as $img):
      $pos = $positions[$i % 4];
    ?>
      <figure class="seven-deepdive-wrapper <?php echo $pos; ?>">
        <img src="<?php echo $img; ?>" alt="<?php echo $title; ?> process image" class="seven-deepdive-img">
      </figure>
    <?php $i++; endforeach; ?>
  </section>
  <?php endif; ?>

  <!-- RESULT -->
  <?php if (!empty($result)): ?>
  <section class="seven-result grid-con">
    <article class="seven-result-text col-span-4 m-col-start-1 m-col-end-13 l-col-start-2 l-col-end-12">
      <h2 class="seven-result-title">RESULT / CONCLUSION</h2>
      <p class="seven-result-desc"><?php echo $result; ?></p>
    </article>
  </section>
  <?php endif; ?>

  <!-- VIDEO -->
  <?php if (!empty($video_src)): ?>
  <section class="seven-video grid-con">
    <div class="seven-video-wrapper col-span-4 m-col-start-1 m-col-end-13 l-col-start-2 l-col-end-12">
      <video controls class="seven-video-element">
        <source src="<?php echo $video_src; ?>" type="<?php echo str_ends_with($video_src, '.webm') ? 'video/webm' : 'video/mp4'; ?>">
        Your browser does not support the video tag.
      </video>
    </div>
  </section>
  <?php endif; ?>

</main>

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
        <li><a href="index.php#featured-work">Projects</a></li>
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