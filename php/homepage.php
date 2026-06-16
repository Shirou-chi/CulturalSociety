<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CulturaNet | Home</title>
  <link rel="stylesheet" href="/Assignment/css/home.css">
  <?php
  include("preloader.php");
  include("navbar.php");
  ?>
</head>

<body>
  <main class="home-page">
    <section class="hero-section" aria-labelledby="hero-title">
      <div class="hero-media">
        <img src="/Assignment/img/pngtree-a-concert-of-electronic-music-dance-culture-females-photo-image_286968.jpg" alt="People enjoying a cultural music event">
      </div>
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <p class="eyebrow">CulturaNet Society</p>
        <h1 id="hero-title">Discover culture through events, stories, and shared creativity.</h1>
        <p class="hero-copy">
          Explore local music, art, heritage, food, fashion, and dance experiences curated for curious communities.
        </p>
        <div class="hero-actions">
          <a class="primary-action" href="/Assignment/php/event.php">Explore Events</a>
          <a class="secondary-action" href="/Assignment/php/membership.php">Join Membership</a>
        </div>
      </div>
      <div class="hero-stats" aria-label="CulturaNet highlights">
        <div>
          <strong>6</strong>
          <span>Culture categories</span>
        </div>
        <div>
          <strong>CC</strong>
          <span>Member coin rewards</span>
        </div>
        <div>
          <strong>KL</strong>
          <span>Local community hub</span>
        </div>
      </div>
    </section>

    <section class="category-section" aria-labelledby="category-title">
      <div class="section-heading">
        <p class="eyebrow">Browse by interest</p>
        <h2 id="category-title">Find the next experience that fits your mood.</h2>
      </div>
      <div class="category-grid">
        <a class="category-card" href="/Assignment/php/event.php#musicLabel">
          <img src="/Assignment/img/event/1.png" alt="Music event">
          <span>Music</span>
        </a>
        <a class="category-card" href="/Assignment/php/event.php#artLabel">
          <img src="/Assignment/img/8438363655_e56e0340a9_z.jpg" alt="Art exhibition">
          <span>Art</span>
        </a>
        <a class="category-card" href="/Assignment/php/event.php#heritageLabel">
          <img src="/Assignment/img/pngtree-korea-s-cultural-heritage-in-taegu-namdong-with-jumgang-korean-village-image_13061696.jpg" alt="Heritage village">
          <span>Heritage</span>
        </a>
        <a class="category-card" href="/Assignment/php/event.php#cuisineLabel">
          <img src="/Assignment/img/istockphoto-598814748-612x612.jpg" alt="Cuisine event">
          <span>Cuisine</span>
        </a>
        <a class="category-card" href="/Assignment/php/event.php#fashionLabel">
          <img src="/Assignment/img/52313f_69ae3b9d4b6c41f0b0ead004eed0bf91~mv2.webp" alt="Fashion event">
          <span>Fashion</span>
        </a>
        <a class="category-card" href="/Assignment/php/event.php#danceLabel">
          <img src="/Assignment/img/pngtree-dance-dancing-night-jazz-dance-beauty-outdoor-pressing-the-brim-of-photo-image_15544322.png" alt="Dance performance">
          <span>Dance</span>
        </a>
      </div>
    </section>

    <section class="spotlight-section" aria-labelledby="spotlight-title">
      <div class="spotlight-copy">
        <p class="eyebrow">Featured route</p>
        <h2 id="spotlight-title">Plan a full cultural day in one place.</h2>
        <p>
          Start with a heritage walk, book a hands-on cuisine workshop, then end the evening with live music or a dance performance.
        </p>
        <a class="text-link" href="/Assignment/php/event.php">View all events</a>
      </div>
      <div class="spotlight-list">
        <article>
          <span>01</span>
          <h3>Choose an event</h3>
          <p>Use categories, date filters, and search to find experiences that match your schedule.</p>
        </article>
        <article>
          <span>02</span>
          <h3>Book with C-Coins</h3>
          <p>Members can manage balance and purchase tickets directly from the event page.</p>
        </article>
        <article>
          <span>03</span>
          <h3>Share the moment</h3>
          <p>Submit photos, stories, or artwork for a chance to be featured by CulturaNet.</p>
        </article>
      </div>
    </section>

    <section class="sharing-section" aria-labelledby="sharing-title">
      <div class="sharing-visual">
        <img src="/Assignment/img/nature.png" alt="Creative cultural illustration">
      </div>
      <div class="sharing-panel">
        <p class="eyebrow">Community submissions</p>
        <h2 id="sharing-title">Share your creativity with us.</h2>
        <p>
          Send a name, short description, and file. Submissions may be featured in CulturaNet publications or social media.
        </p>
        <form id="submissionForm" action="homepage.php" method="post" enctype="multipart/form-data">
          <div class="field-group">
            <label for="title">Name</label>
            <input type="text" id="title" name="title" placeholder="Your name or Anonymous" required>
          </div>

          <div class="field-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Tell us about your submission" required></textarea>
          </div>

          <div class="field-group">
            <label for="file">Upload file</label>
            <input type="file" id="file" name="file">
          </div>

          <button type="submit">Submit Creation</button>
        </form>
      </div>
    </section>
  </main>

  <?php
  include("footer.php");
  ?>

  <script>
    document.getElementById('submissionForm').addEventListener('submit', function(event) {
      event.preventDefault();
      alert('Thank you for your submission!');
      document.getElementById('submissionForm').reset();
    });
  </script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
