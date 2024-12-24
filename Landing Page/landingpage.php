<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: /Rental Login Page/index.php"); // Redirect ke halaman login jika belum login
    exit;
}

// Koneksi ke database
require('../db.php');  // Kembali satu tingkat ke atas untuk mengakses db.php

// Ambil data created_at dari database
$user_id = $_SESSION['user_id']; // Pastikan 'user_id' disimpan di session saat login
$stmt = $conn->prepare("SELECT created_at FROM pendaftar WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $created_at = $row['created_at']; // Ambil nilai created_at
} else {
    $created_at = "Tidak diketahui"; // Nilai default jika data tidak ditemukan
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="styles.css" />
    <title>Web Design Mastery | Car Rental</title>
  </head>
  <body>
    <header>
      <nav>
        <div class="nav__header">
          <div class="nav__logo">
            <a href="#" class="logo">
              <img src="assets/logo-white.png" alt="logo" class="logo-white" />
              <img src="assets/logo-dark.png" alt="logo" class="logo-dark" />
              <span>WHEEL</span>
            </a>
          </div>
          <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-line"></i>
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#deals">Rental Deals</a></li>
          <li><a href="#choose">Why Choose Us</a></li>
          <li><a href="#client">Testimonials</a></li>
          <li><a href="#">Register</a></li>
        </ul>
        <div class="nav__btns">
          <button class="btn1">Logout</button>
        </div>
      </nav>
      <div class="header__container" id="home">
        <div class="header__image">
          <img src="assets/header.png" alt="header" />
        </div>
        <div class="header__content">
          <h2>👍 100% Planform Rental Mobil Terpercaya Di Indonesia</h2>
          <h1> SELAMAT DATANG <?php echo htmlspecialchars($_SESSION['name']); ?>!</h1>
          <p class="section__description">
           Nikmati pengalaman penyewaan mobil yang mulus bersama kami. Pilih dari berbagai kendaraan premium yang sesuai dengan gaya dan kebutuhan Anda, lalu melaju dengan percaya diri. Cepat, mudah, dan terpercaya - sewa kendaraan Anda sekarang juga!</br>
           Akun Anda Terdaftar Pada : <?php echo htmlspecialchars($created_at); ?>
          </p>
        </div>
      </div>
	   
	    
		
		 


      </div>
	  
    </header>

    <section class="header__form">
      <form action="/">
        <div class="input__group">
          <label for="location">Penjemputan Dan Pengembalian</label>
          <input
            type="text"
            name="location"
            id="location"
            placeholder="Banda Aceh, Indonesia"
          />
        </div>
        <div class="input__group">
          <label for="start">Tanggal Penjemputan</label>
          <input
            type="text"
            name="start"
            id="start"
            placeholder="desember 18, 10:00 AM"
          />
        </div>
        <div class="input__group">
          <label for="stop">Tanggal Pengembalian</label>
          <input
            type="text"
            name="stop"
            id="stop"
            placeholder="desember 20, 04:30 PM"
          />
        </div>
        <button class="btn">Cari  <i class="ri-search-line"></i></button>
      </form>
    </section>

    <section class="section__container about__container" id="about">
      <h2 class="section__header">Bagaimana Cara Kerjanya ? </h2>
      <p class="section__description">
       Menyewa mobil bersama kami sangatlah mudah! Pilih kendaraan Anda, tentukan tanggal sewa, dan selesaikan pemesanan. Kami akan mengurus sisanya, memastikan perjalanan Anda dimulai dengan lancar.
      </p>
      <div class="about__grid">
        <div class="about__card">
          <span><i class="ri-map-pin-2-fill"></i></span>
          <h4>Pilih Lokasi</h4>
          <p>
            Pilih dari berbagai lokasi penjemputan yang sesuai dengan kebutuhan Anda, baik dekat rumah, tempat kerja, atau bandara.
          </p>
        </div>
        <div class="about__card">
          <span><i class="ri-calendar-event-fill"></i></span>
          <h4>Pilih Penjemputan</h4>
          <p>
            Tentukan tanggal dan waktu penjemputan mobil Anda, memastikan kendaraan siap saat Anda membutuhkannya.
          </p>
        </div>
        <div class="about__card">
          <span><i class="ri-roadster-fill"></i></span>
          <h4>Pesan Mobil Anda</h4>
          <p>
            Selesaikan pemesanan hanya dalam beberapa klik, dan kami akan menyiapkan kendaraan Anda untuk memastikan proses penjemputan tanpa hambatan.
          </p>
        </div>
      </div>
    </section>
	
	<section class="section__container range__container" id="about">
		  <h2 class="section__header">WIDE RANGE OF VEHICLES</h2>
		  <div class="range__grid">
			<div class="range__card">
			  <img src="assets/range-1.jpg" alt="range" />
			  <div class="range__details">
				<h4>CARS</h4>
				<a href="#"><i class="ri-arrow-right-line"></i></a>
			  </div>
			</div>
			<div class="range__card">
			  <img src="assets/range-2.jpg" alt="range" />
			  <div class="range__details">
				<h4>SUVS</h4>
				<a href="#"><i class="ri-arrow-right-line"></i></a>
			  </div>
			</div>
			<div class="range__card">
			  <img src="assets/range-3.jpg" alt="range" />
			  <div class="range__details">
				<h4>VANS</h4>
				<a href="#"><i class="ri-arrow-right-line"></i></a>
			  </div>
			</div>
			<div class="range__card">
			  <img src="assets/range-4.jpg" alt="range" />
			  <div class="range__details">
				<h4>ELECTRIC</h4>
				<a href="#"><i class="ri-arrow-right-line"></i></a>
			  </div>
			</div>
		  </div>
	</section>
	
    <section class="deals" id="deals">
      <div class="section__container deals__container">
        <h2 class="section__header">Penawaran Mobi Rental Terpopuler</h2>
        <p class="section__description">
          Jelajahi penawaran terbaik kami untuk sewa mobil, dipilih khusus untuk memberikan nilai dan pengalaman terbaik bagi Anda. Pesan sekarang dan nikmati perjalanan dengan kendaraan favorit Anda dengan harga luar biasa!
        </p>
        <div class="deals__tabs">
          <button class="btn active" data-id="Tesla">Tesla</button>
          <button class="btn" data-id="Mitsubishi">Mitsubishi</button>
          <button class="btn" data-id="Mazda">Mazda</button>
          <button class="btn" data-id="Toyota">Toyota</button>
          <button class="btn" data-id="Honda">Honda</button>
        </div>
        <div id="Tesla" class="tab__content active">
          <div class="deals__card">
            <img src="assets/deals-1.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(550)</span>
            </div>
            <h4>Tesla Model S</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 Seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Autopilot
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 400km
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Electric
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$180<span>/Per Hari</span></h3>
              <a href="#">
               Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
          <div class="deals__card">
            <img src="assets/deals-2.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(450)</span>
            </div>
            <h4>Tesla Model E</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 Seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Autopilot
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 400km
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Electric
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$150<span>/Per Hari</span></h3>
              <a href="#">
               Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
          <div class="deals__card">
            <img src="assets/deals-3.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(550)</span>
            </div>
            <h4>Tesla Model Y</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 Seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Autopilot
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 400km
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Electric
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$200<span>/Per Hari</span></h3>
              <a href="#">
                Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
        </div>
        <div id="Mitsubishi" class="tab__content">
          <div class="deals__card">
            <img src="assets/deals-4.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(350)</span>
            </div>
            <h4>Mirage</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 Seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$120<span>/Per Hari</span></h3>
              <a href="#">
                Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
          <div class="deals__card">
            <img src="assets/deals-5.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(250)</span>
            </div>
            <h4>Xpander</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$150<span>/Per Hari</span></h3>
              <a href="#">
               Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
          <div class="deals__card">
            <img src="assets/deals-6.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(150)</span>
            </div>
            <h4>Pajero Sports</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$180<span>/Per Hari</span></h3>
              <a href="#">
                Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
        </div>
        <div id="Mazda" class="tab__content">
          <div class="deals__card">
            <img src="assets/deals-7.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(200)</span>
            </div>
            <h4>Mazda CX5</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$130<span>/Per Hari</span></h3>
              <a href="#">
               Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
          <div class="deals__card">
            <img src="assets/deals-8.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(100)</span>
            </div>
            <h4>Mazda CX-30</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$200<span>/Per Hari</span></h3>
              <a href="#">
                Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
          <div class="deals__card">
            <img src="assets/deals-9.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(180)</span>
            </div>
            <h4>Mazda CX-9</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$180<span>/Per Hari</span></h3>
              <a href="#">
                Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
        </div>
        <div id="Toyota" class="tab__content">
          <div class="deals__card">
            <img src="assets/deals-10.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(250)</span>
            </div>
            <h4>Corolla</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$180<span>/Per Hari</span></h3>
              <a href="#">
               Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
          <div class="deals__card">
            <img src="assets/deals-11.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(550)</span>
            </div>
            <h4>Innova</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$150<span>/Per Hari</span></h3>
              <a href="#">
                Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
          <div class="deals__card">
            <img src="assets/deals-12.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(180)</span>
            </div>
            <h4>Fortuner</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$190<span>/Per Hari</span></h3>
              <a href="#">
                Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
        </div>
        <div id="Honda" class="tab__content">
          <div class="deals__card">
            <img src="assets/deals-13.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(200)</span>
            </div>
            <h4>Amaze</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$100<span>/Per Hari</span></h3>
              <a href="#">
               Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
          <div class="deals__card">
            <img src="assets/deals-14.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(350)</span>
            </div>
            <h4>Elevate</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$120<span>/Per Hari</span></h3>
              <a href="#">
                Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
          <div class="deals__card">
            <img src="assets/deals-15.png" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(300)</span>
            </div>
            <h4>City</h4>
            <div class="deals__card__grid">
              <div>
                <span><i class="ri-group-line"></i></span> 4 seat
              </div>
              <div>
                <span><i class="ri-steering-2-line"></i></span> Manual
              </div>
              <div>
                <span><i class="ri-speed-up-line"></i></span> 18km/l
              </div>
              <div>
                <span><i class="ri-car-line"></i></span> Diesel
              </div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$150<span>/Per Hari</span></h3>
              <a href="#">
                Pesan Sekarang
                <span><i class="ri-arrow-right-line"></i></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="choose__container" id="choose">
      <div class="choose__image">
        <img src="assets/choose.png" alt="choose" />
      </div>
      <div class="choose__content">
        <h2 class="section__header">Mengapa Memilih Kami</h2>
        <p class="section__description">
          Rasakan perbedaan dengan layanan sewa mobil kami. Kami menawarkan kendaraan yang andal, layanan pelanggan yang luar biasa, dan harga kompetitif untuk memastikan pengalaman sewa yang mulus.
        </p>
        <div class="choose__grid">
          <div class="choose__card">
            <span><i class="ri-customer-service-line"></i></span>
            <div>
              <h4>Dukungan Pelanggan</h4>
              <p>Tim dukungan kami siap membantu Anda 24/7..</p>
            </div>
          </div>
          <div class="choose__card">
            <span><i class="ri-map-pin-line"></i></span>
            <div>
              <h4>Banyak Lokasi</h4>
              <p>
                Lokasi penjemputan dan pengantaran yang nyaman sesuai dengan kebutuhan perjalanan Anda.
              </p>
            </div>
          </div>
          <div class="choose__card">
            <span><i class="ri-wallet-line"></i></span>
            <div>
              <h4>Harga Terbaik</h4>
              <p>Nikmati tarif yang kompetitif dan nilai luar biasa untuk setiap sewa..</p>
            </div>
          </div>
          <div class="choose__card">
            <span><i class="ri-user-star-line"></i></span>
            <div>
              <h4>Pengemudi Berpengalaman</h4>
              <p>Pengemudi profesional dan terpercaya tersedia berdasarkan permintaan..</p>
            </div>
          </div>
          <div class="choose__card">
            <span><i class="ri-verified-badge-line"></i></span>
            <div>
              <h4>Brands Terverifikasi</h4>
              <p>Pilih dari Brands mobil yang terpercaya dan terawat dengan baik..</p>
            </div>
          </div>
          <div class="choose__card">
            <span><i class="ri-calendar-close-line"></i></span>
            <div>
              <h4>Fleksibelitas Pemesanan</h4>
              <p>Pemesanan fleksibel dengan opsi pembatalan gratis..</p>
            </div>
          </div>
        </div>
      </div>
    </section>
	
	
	<section class="select__container" id="ride">
      <h2 class="section__header">PICK YOUR DREAM CAR TODAY</h2>
      <!-- Slider main container -->
      <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide">
            <div class="select__card">
              <img src="assets/fortuner-samping.png" alt="select" />
              <div class="select__info">
                <div class="select__info__card">
                  <span><i class="ri-speed-up-line"></i></span>
                  <h4>200 <span>km/h</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-settings-5-line"></i></span>
                  <h4>6 <span>speed</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-roadster-line"></i></span>
                  <h4>7 <span>seats</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-signpost-line"></i></span>
                  <h4>ADAS <span>Tech</span></h4>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="select__card">
              <img src="assets/pajero-samping.png" alt="select" />
              <div class="select__info">
                <div class="select__info__card">
                  <span><i class="ri-speed-up-line"></i></span>
                  <h4>215 <span>km/h</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-settings-5-line"></i></span>
                  <h4>6 <span>speed</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-roadster-line"></i></span>
                  <h4>7 <span>seats</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-signpost-line"></i></span>
                  <h4>ADAS <span>Tech</span></h4>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="select__card">
              <img src="assets/hrv-samping.png" alt="select" />
              <div class="select__info">
                <div class="select__info__card">
                  <span><i class="ri-speed-up-line"></i></span>
                  <h4>306 <span>km/h</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-settings-5-line"></i></span>
                  <h4>6 <span>speed</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-roadster-line"></i></span>
                  <h4>5 <span>seats</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-signpost-line"></i></span>
                  <h4>ADAS <span>Tech</span></h4>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="select__card">
              <img src="assets/almaz-samping.png" alt="select" />
              <div class="select__info">
                <div class="select__info__card">
                  <span><i class="ri-speed-up-line"></i></span>
                  <h4>350 <span>km/h</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-settings-5-line"></i></span>
                  <h4>6 <span>speed</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-roadster-line"></i></span>
                  <h4>5 <span>seats</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-signpost-line"></i></span>
                  <h4>IOV <span>Tech</span></h4>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="select__card">
              <img src="assets/brio-samping.png" alt="select" />
              <div class="select__info">
                <div class="select__info__card">
                  <span><i class="ri-speed-up-line"></i></span>
                  <h4>254 <span>km/h</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-settings-5-line"></i></span>
                  <h4>6 <span>speed</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-roadster-line"></i></span>
                  <h4>5 <span>seats</span></h4>
                </div>
                <div class="select__info__card">
                  <span><i class="ri-signpost-line"></i></span>
                  <h4>ADAS <span>Tech</span></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <form action="/" class="select__form">
		<div class="select__price">
			<span><i class="ri-price-tag-3-line"></i></span>
			<div><span id="select-price">225</span> /day</div>
		</div>
		</form>
		<div class="select__btns">
			<button class="btn">VIEW DETAILS</button>
			<!-- Set type="button" untuk mencegah pengiriman form -->
			<button class="btn1" type="button">RENT NOW</button>
		</div>

    </section>
	

	

    <section class="subscribe__container">
      <div class="subscribe__image">
        <img src="assets/pajero1.png" alt="subscribe" />
      </div>
      <div class="subscribe__content">
        <h2 class="section__header">
          Subscribe untuk Update Terbaru Sewa Mobil
        </h2>
        <p class="section__description">
          Tetap terinformasi! Berlangganan untuk menerima penawaran sewa mobil terbaru, promo eksklusif, dan pembaruan langsung ke kotak masuk Anda. Jangan lewatkan promo spesial dan tambahan terbaru dalam armada kami.
        </p>
        <form action="/">
          <input type="text" placeholder="Your Email" />
          <button class="btn">Subscribe</button>
        </form>
      </div>
    </section>

    <section class="section__container client__container" id="client">
  <h2 class="section__header">Ulasan Pengguna</h2>
  <p class="section__description">
    Temukan mengapa pelanggan kami senang menyewa mobil bersama kami! Baca ulasan nyata dan testimoni untuk melihat bagaimana kami memberikan layanan luar biasa.
  </p>
  <!-- Slider main container -->
  <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide">
        <div class="client__card">
          <div class="client__details">
            <img src="assets/client-1.jpg" alt="client" />
            <div>
              <h4>Sarah Johnson</h4>
              <div class="client__rating">
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-line"></i></span>
              </div>
            </div>
          </div>
          <p>
            Saya memiliki pengalaman luar biasa menyewa mobil dari layanan ini. Proses pemesanan cepat dan mudah, dan mobil dalam kondisi sempurna. Sangat direkomendasikan!
          </p>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="client__card">
          <div class="client__details">
            <img src="assets/client-2.jpg" alt="client" />
            <div>
              <h4>Michael Adams</h4>
              <div class="client__rating">
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-line"></i></span>
              </div>
            </div>
          </div>
          <p>
            Dukungan pelanggan luar biasa! Mereka membantu saya dengan semua pertanyaan, dan saya merasa yakin dengan pemesanan saya. Saya pasti akan menyewa dari mereka lagi.
          </p>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="client__card">
          <div class="client__details">
            <img src="assets/client-3.jpg" alt="client" />
            <div>
              <h4>Emily Martinez</h4>
              <div class="client__rating">
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-line"></i></span>
              </div>
            </div>
          </div>
          <p>
            Harga terjangkau dan pilihan kendaraan yang luar biasa! Saya menemukan apa yang saya butuhkan, dan proses penjemputan serta pengembalian sangat lancar. Sangat puas dengan sewa saya.
          </p>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="client__card">
          <div class="client__details">
            <img src="assets/client-4.jpg" alt="client" />
            <div>
              <h4>Jason Lee</h4>
              <div class="client__rating">
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-line"></i></span>
              </div>
            </div>
          </div>
          <p>
            Fleksibilitas pembatalan gratis membuat perjalanan saya bebas stres. Saya mengubah rencana, dan sangat mudah untuk menyesuaikan pemesanan saya. Layanan yang hebat secara keseluruhan!
          </p>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="client__card">
          <div class="client__details">
            <img src="assets/client-5.jpg" alt="client" />
            <div>
              <h4>David Thompson</h4>
              <div class="client__rating">
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-fill"></i></span>
                <span><i class="ri-star-line"></i></span>
              </div>
            </div>
          </div>
          <p>
            Mobil yang saya sewa sangat berkualitas, dan pengemudinya sangat berpengalaman. Perjalanan saya menjadi jauh lebih menyenangkan. Pasti akan menggunakan layanan mereka lagi di lain waktu!
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="section__container footer__container">
    <div class="footer__col">
      <div class="footer__logo">
        <a href="#" class="logo">
          <img src="assets/logo-white.png" alt="logo" />
          <span>Car Rental</span>
        </a>
      </div>
      <p>
        Kami di sini untuk memberikan Anda kendaraan terbaik dan pengalaman sewa yang lancar. Tetap terhubung untuk pembaruan, penawaran spesial, dan lainnya. Berkendara dengan percaya diri!
      </p>
      <ul class="footer__socials">
        <li>
          <a href="#"><i class="ri-facebook-fill"></i></a>
        </li>
        <li>
          <a href="#"><i class="ri-twitter-fill"></i></a>
        </li>
        <li>
          <a href="#"><i class="ri-linkedin-fill"></i></a>
        </li>
        <li>
          <a href="#"><i class="ri-instagram-line"></i></a>
        </li>
        <li>
          <a href="#"><i class="ri-youtube-fill"></i></a>
        </li>
      </ul>
    </div>
    <div class="footer__col">
      <h4>Layanan Kami</h4>
      <ul class="footer__links">
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#deals">Penawaran Sewa</a></li>
        <li><a href="#choose">Mengapa Memilih Kami</a></li>
        <li><a href="#client">Testimoni</a></li>
      </ul>
    </div>
    <div class="footer__col">
      <h4>Model Kendaraan</h4>
      <ul class="footer__links">
        <li><a href="#">Toyota Corolla</a></li>
        <li><a href="#">Toyota Noah</a></li>
        <li><a href="#">Toyota Allion</a></li>
        <li><a href="#">Toyota Premio</a></li>
        <li><a href="#">Mistubishi Pajero</a></li>
      </ul>
    </div>
    <div class="footer__col">
      <h4>Kontak</h4>
      <ul class="footer__links">
        <li>
          <a href="#">
            <span><i class="ri-phone-fill"></i></span> +91 0987654321
          </a>
        </li>
        <li>
          <a href="#">
            <span><i class="ri-map-pin-fill"></i></span> New Delhi, India
          </a>
        </li>
        <li>
          <a href="#">
            <span><i class="ri-mail-fill"></i></span> info@carrental
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="footer__bar">
    Copyright © 2024 Web Design Mastery. Semua hak dilindungi.
  </div>
</footer>


    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
