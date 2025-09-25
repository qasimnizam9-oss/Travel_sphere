<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Travel Sphere</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar">
    <div class="nav-container">
      <div class="nav-logo"><h1>
  <img src="assets/transport.png" alt="Travel Sphere Logo" style="width:40px; vertical-align:middle;">
  Travel Sphere
</h1>
</div>
      <div class="nav-menu">
        <a href="#packages" class="nav-link">Packages</a>
        <a href="#services" class="nav-link">Services</a>
        <a href="#gallery" class="nav-link">Gallery</a>
        <a href="#book" class="nav-link">Book</a>
        <?php if(isset($_SESSION['user_name'])): ?>
          <span class="nav-user">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
          <a class="nav-link" href="logout.php">Logout</a>
        <?php else: ?>
          <button class="login-btn" onclick="openModal('loginModal')">Login</button>
        <?php endif; ?>
      </div>
    </div>
  </nav>

  <header class="hero-section" id="home">
    <div class="video-container">
      <video autoplay muted loop id="background-video">
        <source src="assets/pakistan.mp4" type="video/mp4">
      </video>
      <div class="video-overlay"></div>
    </div>
    <div class="hero-content">
      <h1>Explore Pakistan with Travel Sphere</h1>
      <p>Comfortable packages, best guides, unforgettable memories.</p>
      <button class="book-now-btn" onclick="document.getElementById('book').scrollIntoView({behavior:'smooth'})">Book Now</button>
    </div>
  </header>

  <!-- PACKAGES -->
  <section id="packages" class="packages-section">
    <div class="container">
      <h2 class="section-title">Popular Packages</h2>
      <div class="packages-grid">
        <div class="package-card">
          <img src="assets/fairy.jpeg" alt="Fairy Meadows">
          <h3>Fairy Meadows</h3>
          <p>3 Days, 2 Nights — PKR 25,000</p>
          <button class="package-book-btn" onclick="document.getElementById('book').scrollIntoView({behavior:'smooth'})">Book</button>
        </div>
        <div class="package-card">
          <img src="assets/skardu.jpeg" alt="Skardu">
          <h3>Skardu Valley</h3>
          <p>5 Days, 4 Nights — PKR 45,000</p>
          <button class="package-book-btn" onclick="document.getElementById('book').scrollIntoView({behavior:'smooth'})">Book</button>
        </div>
        <div class="package-card">
          <img src="assets/mohan.webp" alt="mohenjo-daro">
          <h3>Mohenjo-daro (Sindh)</h3>
          <p>8 Days, 7 Nights — PKR 50,000</p>
          <button class="package-book-btn" onclick="document.getElementById('book').scrollIntoView({behavior:'smooth'})">Book</button>
        </div>
        <div class="package-card">
          <img src="assets/multan.webp" alt="Multan">
          <h3>Multan</h3>
          <p>4 Days, 4 Nights — PKR 15,000</p>
          <button class="package-book-btn" onclick="document.getElementById('book').scrollIntoView({behavior:'smooth'})">Book</button>
        </div>
        <div class="package-card">
          <img src="assets/saifulmalok.jpeg" alt="Saiful-malook">
          <h3>Saif-ul-Malook Lake (Naran)</h3>
          <p>3 Days, 2Nights — PKR 25,000</p>
          <button class="package-book-btn" onclick="document.getElementById('book').scrollIntoView({behavior:'smooth'})">Book</button>
        </div>
        <div class="package-card">
          <img src="assets/desert.png" alt="Cholistan Desrt">
          <h3>Cholistan Desert & Derawar </h3>
          <p>7 Days, 6 Nights — PKR 20,000</p>
          <button class="package-book-btn" onclick="document.getElementById('book').scrollIntoView({behavior:'smooth'})">Book</button>
        </div>
        <div class="package-card">
          <img src="assets/gawadar.jpeg" alt="Gawadar">
          <h3>Gwadar –</h3>
          <p>2 Days, 1 Night — PKR 14,000</p>
          <button class="package-book-btn" onclick="document.getElementById('book').scrollIntoView({behavior:'smooth'})">Book</button>
        </div>
        <div class="package-card">
          <img src="assets/muree.jpeg" alt="Murree">
          <h3>Murree Hills</h3>
          <p>2 Days, 1 Night — PKR 10,000</p>
          <button class="package-book-btn" onclick="document.getElementById('book').scrollIntoView({behavior:'smooth'})">Book</button>
        </div>
      </div>
    </div>
  </section>

 <section id="services" class="services-section">
  <h2 class="section-title">Our Services</h2>
  <div class="services-grid">

    <!-- Transport -->
    <div class="service-card" onclick="openModal('transportModal')">
      <div class="icon">🚌</div>
      <h3>Transport</h3>
      <p>Luxury buses, private cars, jeeps and more.</p>
    </div>

    <!-- Hotels -->
    <div class="service-card" onclick="openModal('hotelModal')">
      <div class="icon">🏨</div>
      <h3>Hotels</h3>
      <p>Hand-picked hotels with best locations.</p>
    </div>

    <!-- Guided Tours -->
    <div class="service-card" onclick="openModal('tourModal')">
      <div class="icon">🧭</div>
      <h3>Guided Tours</h3>
      <p>Experienced local guides for your adventures.</p>
    </div>

  </div>
</section>

<!-- Transport Modal -->
<div id="transportModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('transportModal')">&times;</span>
    <h2>Transport Options</h2>
    <div class="modal-options">
      <div class="option">
        <img src="assets/bus.jpg" alt="Luxury Bus">
        <h4>Luxury Bus</h4>
        <button onclick="bookService('Luxury Bus')">Book Now</button>
      </div>
      <div class="option">
        <img src="assets/car.jpg" alt="Private Car">
        <h4>Private Car</h4>
        <button onclick="bookService('Private Car')">Book Now</button>
      </div>
    </div>
  </div>
</div>

<!-- Hotel Modal -->
<div id="hotelModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('hotelModal')">&times;</span>
    <h2>Hotels</h2>
    <div class="modal-options">
      <div class="option">
        <img src="assets/hotel1.jpg" alt="Serena Hotel">
        <h4>Serena Hotel</h4>
        <button onclick="bookService('Serena Hotel')">Book Now</button>
      </div>
      <div class="option">
        <img src="assets/hotel2.jpg" alt="PC Bhurban">
        <h4>PC Bhurban</h4>
        <button onclick="bookService('PC Bhurban')">Book Now</button>
      </div>
    </div>
  </div>
</div>

<!-- Tours Modal -->
<div id="tourModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('tourModal')">&times;</span>
    <h2>Guided Tours</h2>
    <div class="modal-options">
      <div class="option">
        <img src="assets/tour1.jpg" alt="Fairy Meadows Trek">
        <h4>Fairy Meadows Trek</h4>
        <button onclick="bookService('Fairy Meadows Trek')">Book Now</button>
      </div>
      <div class="option">
        <img src="assets/tour2.jpg" alt="Skardu City Tour">
        <h4>Skardu City Tour</h4>
        <button onclick="bookService('Skardu City Tour')">Book Now</button>
      </div>
    </div>
  </div>
</div>


<div id="transportModal" class="modal" onclick="if(event.target===this) closeModal('transportModal')">
  <div class="modal-content">
    <span class="close" onclick="closeModal('transportModal')">&times;</span>
    <h2>Transport Options</h2>
    <div class="modal-options">
      <div class="option">
        <img src="assets/bus.jpg" alt="Luxury Bus">
        <h4>Luxury Bus</h4>
        <button onclick="bookService('Luxury Bus'); closeModal('transportModal')">Book Now</button>
      </div>
      <div class="option">
        <img src="assets/car.jpg" alt="Private Car">
        <h4>Private Car</h4>
        <button onclick="bookService('Private Car'); closeModal('transportModal')">Book Now</button>
      </div>
    </div>
  </div>
</div>


<!-- Tours Modal -->
<div id="toursModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('toursModal')">&times;</span>
    <h2>Available Tours</h2>
    <ul>
      <li>Fairy Meadows Trek <button>Book</button></li>
      <li>Skardu City Tour <button>Book</button></li>
      <li>Murree Hills Day Trip <button>Book</button></li>
      <li>Hunza Adventure <button>Book</button></li>
    </ul>
  </div>
</div>

 </section>
      
      

  <!-- GALLERY -->
  <section id="gallery" class="gallery-section">
    <div class="container">
      <h2 class="section-title">Gallery</h2>
      <div class="gallery-grid">
        <div class="gallery-item"><img src="assets/galley1.jpeg" alt=""></div>
        <div class="gallery-item"><img src="assets/gallery2.jpeg" alt=""></div>
        <div class="gallery-item"><img src="assets/gallery 3.jpeg" alt=""></div>
        <div class="gallery-item"><img src="assets/gallery4.jpeg" alt=""></div>
        <div class="gallery-item"><img src="assets/muree.jpeg" alt=""></div>
        <div class="gallery-item"><img src="assets/skardu.jpeg" alt=""></div>
      </div>
    </div>
  </section>

  <!-- BOOK -->
  <section id="book" class="booking-section">
    <div class="container">
      <h2 class="section-title">Book Your Trip</h2>

      <?php if(isset($_GET['msg'])): ?>
        <div class="notice"><?php echo htmlspecialchars($_GET['msg']); ?></div>
      <?php endif; ?>

      <div class="booking-form-container">
        <div class="booking-image">
          <img src="assets/flag.png" alt="">
        </div>

        <form class="booking-form" method="POST" action="booking.php">
          <div class="form-row">
            <div>
              <label>Destination *</label>
              <select name="destination" required>
                <option value="">Select Destination</option>
                <option>Fairy Meadows</option>
                <option>Skardu</option>
                <option>Murree</option>
              </select>
            </div>
            <div>
              <label>Full Name *</label>
              <input type="text" name="fullname" required>
            </div>
          </div>

          <div class="form-row">
            <div>
              <label>Email *</label>
              <input type="email" name="email" required>
            </div>
            <div>
              <label>Contact</label>
              <input type="tel" name="contact">
            </div>
          </div>

          <div class="form-row">
            <div>
              <label>People</label>
              <input type="number" min="1" name="people">
            </div>
            <div>
              <label>Arrival</label>
              <input type="date" name="arrival">
            </div>
          </div>

          <div class="form-row">
            <div>
              <label>Leaving</label>
              <input type="date" name="leaving">
            </div>
            <div style="align-self:end">
              <button type="submit" class="submit-btn">Confirm Booking</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
<!-- Location Icon -->
<section id="live-location" class="live-location-section">
  <h2>📍 Live Location</h2>
  <button id="showMapBtn" class="location-btn">Show My Location</button>
  
  <!-- Hidden Map -->
  <div id="map" style="height: 400px; width: 100%; display: none; margin-top: 15px;"></div>
</section>

<!-- Leaflet.js Map Library -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

 <footer class="footer" id="contact">
  <div class="footer-container">
    <!-- Brand -->
    <div class="footer-brand">
      <h2>🌍 Travel Sphere</h2>
      <p>Start your journey with us today!</p>
    </div>

    <!-- Links -->
    <div class="footer-links">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#places">Places</a></li>
        <li><a href="#book">Booking</a></li>
      </ul>
    </div>

    <!-- Contact -->
    <footer class="footer" id="contact">
  <div class="container footer-content">
    <div class="footer-left">
      <div class="footer-logo">Travel Sphere</div>
      <p class="footer-quote">Start your journey with us today!</p>
      <p class="contact-info">qasimnizam9@gmail.com | +92 307 1464131</p>
    </div>

    <div class="footer-right">
      <div class="social-links">
        <a href="#">📘</a> 
        <a href="#">📸</a> 
        <a href="#">▶️</a>
      </div>

      <!-- Location Icon -->
      
    </div>
  </div>
</footer>


  <!-- Bottom -->
  <div class="footer-bottom">
    <p>© 2025 Travel Sphere. All Rights Reserved.</p>
  </div>
</footer>


  <!-- LOGIN MODAL -->
  <div id="loginModal" class="modal" onclick="if(event.target===this) closeModal('loginModal')">
    <div class="modal-content auth-modal-content">
      <span class="close" onclick="closeModal('loginModal')">&times;</span>
      <h2>Login</h2>
      <form action="login.php" method="POST" class="auth-form">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="#" onclick="switchToRegister();return false;">Register</a></p>
      </form>
    </div>
  </div>

  <!-- REGISTER MODAL -->
  <div id="registerModal" class="modal" onclick="if(event.target===this) closeModal('registerModal')">
    <div class="modal-content auth-modal-content">
      <span class="close" onclick="closeModal('registerModal')">&times;</span>
      <h2>Register</h2>
      <form action="register.php" method="POST" class="auth-form">
        <input type="text" name="name" placeholder="Full name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm password" required>
        <button type="submit">Register</button>
        <p>Already have an account? <a href="#" onclick="switchToLogin();return false;">Login</a></p>
      </form>
    </div>
  </div>
  

<script>
function openModal(id) {
  document.getElementById(id).style.display = "flex";
}
function closeModal(id) {
  document.getElementById(id).style.display = "none";
}

function switchToRegister() {
  closeModal('loginModal');
  openModal('registerModal');
}

function switchToLogin() {
  closeModal('registerModal');
  openModal('loginModal');
}
</script>
<script>
document.getElementById("showMapBtn").addEventListener("click", function() {
  document.getElementById("map").style.display = "block"; // Show map div

  // Initialize map
  var map = L.map('map').setView([33.6844, 73.0479], 13); // default Islamabad

  // Add OpenStreetMap tiles
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
  }).addTo(map);

  // Get live location
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;

      // Center map to live location
      map.setView([lat, lng], 15);

      // Add marker with popup
      L.marker([lat, lng]).addTo(map)
        .bindPopup("📍 You are here!")
        .openPopup();
    });
  } else {
    alert("Geolocation is not supported by this browser.");
  }
});
</script>


</body>
</html>
