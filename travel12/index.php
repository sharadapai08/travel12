<?php
require_once 'includes/header.php'; // This will also include db_connect.php and start session

?>

<!--<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Booking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="booking-form">
        <h2>Book Your Travel</h2>
        <form action="book.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="phone" placeholder="Your Phone" required>
            <input type="text" name="destination" placeholder="Destination" required>
            <input type="date" name="travel_date" required>
            <button type="submit">Book Now</button>
        </form>
    </div>
</body>
</html>-->

<!--<h1>Welcome to Travel!</h1>
<p>Your adventure starts here. Discover amazing destinations and plan your next trip.</p>-->

<?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
    <p>Hello, <?php echo htmlspecialchars($_SESSION["username"]); ?>! Ready for a new journey?</p>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, intial-scale=1.0">
<title>complete responsive tour and travel agency website design</title>
<!--links-->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


<link rel="stylesheet" href="style1.css">




<script src=""></script>

<!--<header>
    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="#" class="logo"><span>T</span>ravel</a>

    <nav class="navbar">
      <a href="#home">home</a>
      <a href="#book">Book</a>
      <a href="#packages">Packages</a>
      <a href="#services">Services</a>
      <a href="#gallery">Gallery</a>
      <a href="#review">Review</a>
      <a href="#contact">Contact</a>
    </nav>

    <div class="icons">
          <i class="fas fa-search" id="search-btn"></i>
          <i class="fas fa-user" id="login-btn"></i>
    </div>
    
    <form action="" class="search-bar-container">
      <input type="search" id="search-bar" placeholder="search here....">
      <label for="search-bar" class="fas fa-search"></label>
    </form>


</header>-->


<div class="login-form-container">

    <i class="fas fa-times" id="form-close"></i>
    <form action="">
        <h3>login</h3>
        <input type="email" class="box" placeholder="enter your email">
        <input type="password" class="box" placeholder="enter your password">
        <input type="submit" value="login now" class="btn">
        <input type="checkbox" id="remember">
        <label for="remember">remember me</label>
        <p>forget password? <a href="#">click here</a></p>
        <p>dont have an account? <a href="#">register now</a></p>
    </form>
</div>

<section class="home" id="home">

    <div  class="content">
        <h3>adventure is worthwhile</h3>
        <p>discover new places with us,adventure awits</p>
        <!--<a href="#" class="btn">discover more</a>-->
    </div>

    <div class="">
        <span class="" data-src="vid-1.mp4"></span>
        <!--<span class="vid-btn" data-src="vid2.mp4"></span>
        <span class="vid-btn" data-src="vid3.mp4"></span>
        <span class="vid-btn" data-src="vid4.mp4"></span>-->
        <!--<span class="vid-btn" data-src="vid5.mp4"></span>-->
    </div>

    <div class="video-container">
        <video src="vid-1.mp4" id="video-slider" loop autoplay muted></video>
    </div>
</section>


<section class="book" id="book">
    <h1 class="heading">
        <span>b</span>
        <span>o</span>
        <span>o</span>
        <span>k</span>
        <span class="space"></span>
        <span>n</span>
        <span>o</span>
        <span>w</span>
    </h1>

    <div class="row">

        <div class="image">
            <img src="book_img.svg" alt="">
        </div>

         <div class="booking-container">
        <div class="booking-box">
            <h2>Book Your Travel</h2>
            <!--<link rel="stylesheet" href="styles.css">-->

            <form action="book.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="phone" placeholder="Your Phone" required>
                <input type="text" name="destination" placeholder="Destination" required>
                <input type="text" name="location" placeholder="Your Location" required>
                <textarea name="suggestions" rows="4" placeholder="Special instructions(if any)"></textarea>
                <input type="date" name="travel_date" required>
                <button type="submit">Book Now</button>
            </form>
        </div>
    </div>
    
    </div>
</section>





<!--packages section start -->

<section class="packages" id="packages">

    <h1 class="heading">
        <span>p</span>
        <span>a</span>
        <span>c</span>
        <span>k</span>
        <span>a</span>
        <span>g</span>
        <span>e</span>
        <span>s</span>
    </h1>

    <div class="box-container">

      <div class="box">
        <img src="a1.jpg" alt="">
        <div class="content">
          <h3><i class="fas fa-map-marker-alt"></i>Madikeri</h3>
          <p>Per-person travel packages with all services included(4D/3N)</p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <div class="price">15,999 <span>20,999</span> </div>
          <a href="book.php" class="btn">book now</a>
        </div>
      </div>

      <div class="box">
        <img src="a2.jpg" alt="">
        <div class="content">
          <h3><i class="fas fa-map-marker-alt"></i>Udupi</h3>
          <p>Per-person travel packages with all services included(4D/3N)</p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <div class="price">18,999<span>22,999</span> </div>
          <a href="book.php" class="btn">book now</a>
        </div>
      </div>

      <div class="box">
        <img src="a3.jpg" alt="">
        <div class="content">
          <h3><i class="fas fa-map-marker-alt"></i>Mysore</h3>
          <p>Per-person travel packages with all services included(3D/2N)</p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <div class="price">20,999<span>22,999</span> </div>
          <a href="book.php" class="btn">book now</a>
        </div>
      </div>

      <div class="box">
        <img src="a4.jpg" alt="">
        <div class="content">
          <h3><i class="fas fa-map-marker-alt"></i>Ballari</h3>
          <p>Per-person travel packages with all services included(2D/1N)</p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <div class="price">15,999 <span>18,999</span> </div>
          <a href="book.php" class="btn">book now</a>
        </div>
      </div>

      <div class="box">
        <img src="a5.jpg" alt="">
        <div class="content">
          <h3><i class="fas fa-map-marker-alt"></i>Shivamogga</h3>
          <p>Per-person travel packages with all services included(2D/1N)</p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <div class="price">14,999<span>17,999</span> </div>
          <a href="book.php" class="btn">book now</a>
        </div>
      </div>

      <div class="box">
        <img src="a6.jpg" alt="">
        <div class="content">
          <h3><i class="fas fa-map-marker-alt"></i>Uttara kannada</h3>
          <p>Per-person travel packages with all services included(5D/4N)</p>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <div class="price">27,999<span>36,999</span> </div>
          <a href="book.php" class="btn">book now</a>
        </div>
      </div>

    </div>
</section>  
      
    
  
<!--packages section ends-->



<section class="services" id="services">

  <h1 class="heading">
    <span>s</span>
    <span>e</span>
    <span>r</span>
    <span>v</span>
    <span>i</span>
    <span>c</span>
    <span>e</span>
    <span>s</span>
</h1>

<div class="box-container">

  <div class="box">
    <i class="fas fa-hotel"></i>
    <h3>affordable hotels</h3>
    <p>Comfort within your budget,whenever you go</p>

  </div>
  <div class="box">
    <i class="fas fa-utensils"></i>
    <h3>food and drinks</h3>
    <p>Savor every moment with delicious delights</p>
  </div>
  <div class="box">
    <i class="fas fa-bullhorn"></i>
    <h3>safety guide</h3>
    <p>Your saftey is our top priority,every step of the way</p>
    
  </div>
  <div class="box">
    <i class="fas fa-globe-asia"></i>
    <h3>around the world</h3>
    <p>Explore the nation one adventure at a time</p>
    
  </div>
  <div class="box">
    <i class="fas fa-plane"></i>
    <h3>fastest travel</h3>
    <p> Get there in no time-speed and comfort combined</p>
    
  </div>
  <div class="box">
    <i class="fas fa-hiking"></i>
    <h3>adventures</h3>
    <p>embarak on thrilling journeys that create lasting memories</p>
    
  </div>
</div>

</section>


<section class="gallery" id="gallery">

<h1 class="heading">
  <span>g</span>
  <span>a</span>
  <span>l</span>
  <span>l</span>
  <span>e</span>
  <span>r</span>
  <span>y</span>
</h1>

<div class="box-container">

    <div class="box">
        <img src="a7.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Explore The Karnataka</p>
            <a href="gallery.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="a9.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Explore The Karnataka</p>
            <a href="gallery.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="a8.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Explore The Karnataka</p>
            <a href="gallery.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="a10.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Explore The Karnataka</p>
            <a href="gallery.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="a11.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Explore The Karnataka</p>
            <a href="gallery.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="a12.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Explore The Karnataka</p>
            <a href="gallery.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="a13.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Explore The Karnataka</p>
            <a href="gallery.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="a14.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Explore The Karnataka</p>
            <a href="gallery.php" class="btn">see more</a>
        </div>
    </div>
    <div class="box">
        <img src="a15.jpg" alt="">
        <div class="content">
            <h3>amazing places</h3>
            <p>Explore The Karnataka</p>
            <a href="gallery.php" class="btn">see more</a>
        </div>
    </div>
</div>                              


</section>

<section class="review" id="review">
  
<h1 class="heading">
  <span>r</span>
  <span>e</span>
  <span>v</span>
  <span>i</span>
  <span>e</span>
  <span>w</span>
</h1>
 <a href="submit_review.php" class="btn">add and see reviews</a>
</section>

<section class="about" id="about">
<h1>About us</h1>
<h1 class="heading">
        <span>a</span>
        <span>b</span>
        <span>o</span>
        <span>u</span>
        <span>t</span>
        <span class="space"></span>
        <span>u</span>
        <span>s</span>
</h1>
<p><h2>Welcome to TravelX – your gateway to unforgettable journeys!

We are a team of passionate travelers and storytellers dedicated to helping you explore the world with ease and inspiration. Whether you're dreaming of pristine beaches, bustling cities, hidden gems, or scenic mountains, we bring you the best travel guides, tips, and deals to make every trip memorable.

At [Your Website Name], we believe travel is not just about reaching a destination – it's about the experiences you gather along the way. Our mission is to make travel planning simple, exciting, and accessible to everyone.

Join us as we explore the world, one destination at a time.

Let’s travel. Let’s discover. Let’s live.</h2>
</p>


</section>
<!--<section id="about" id="about">
    <div class="about-container">
        <h1>About Us</h1>
        <p><h3>We specialize in creating unforgettable travel experiences for adventurers worldwide.</h3></p>
        <p>From luxurious getaways to thrilling expeditions, we bring your dream destinations to life.</p>
        <img src="assets/images/about.jpg" alt="Our Travel Team">
    </div>
</section>-->



<section class="brand-container">

    <div class="swiper-container brand-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/1.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/2.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/3.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/4.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/5.jpg" alt=""></div>
            <div class="swiper-slide"><img src="images/6.jpg" alt=""></div>
        </div>
    </div>
</section>

<section class="footer">

  <div class="box-container">

      <!--<div class="box">
          <h3>about us</h3>
          <p> Welcome to Travel Explorer, where adventure meets comfort! 🌍✨ We specialize in crafting unforgettable journeys to breathtaking destinations. From serene beaches to thrilling expeditions, we make travel seamless and enjoyable. Join us and explore the world with expertly curated experiences! 🚀✈️ </p>
      </div>-->
      <div class="box">
          <h3>brand locations</h3>
          <a href="#">Udupi</a>
          <a href="#">Manglore</a>
          <a href="#">Banglore</a>
          <a href="#">Mysore</a>
      </div>
      <div class="box">
          <h3>quick links</h3>
          <a href="#">home</a>
          <a href="#">book</a>
          <a href="#">packages</a>
          <a href="#">services</a>
          <a href="#">gallery</a>
          <a href="#">review</a>
          <!--<a href="#">contact</a>-->
      </div>
      <div class="box">
          <h3>follow us</h3>
          <a href="#">facebook</a>
          <a href="#">instagram</a>
          <a href="#">twitter</a>
          <a href="#">linkedin</a>
      </div>
      <div class="box">
          <h3>contact us</h3>
          <!--<a href="#">9945878774</a>-->
          <!--<a href="#">8105935722</a>-->
          <a href="#">sandhyabrao123@gmail.com</a>
          <a href="#">kavyaacharya123@gmail.com</a>
          <a href="#">sharadakp2004@gmail.com</a>
          <a href="#">Udupi-576102,Karnataka</a>
      </div>
      
  </div>

  <h1></h1>
</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="script.js"></script>
</body>
</html>


          
<?php require_once 'includes/footer.php'; ?>