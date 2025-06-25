<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keku Hotel - Home</title>
  <?php require('links.php') 
  ?>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="common.css">
  <style>
    .availibility-form{
      margin-top: -50px;
      z-index: 2;
      position: relative;
    }

    img{
     height: 550px;
     width: 1500px;
    } 

    @media screen and (max-width: 575px) {
      .availibility-form{
       margin-top: 25px;
       padding: 0 35px;
    }
    }

    .card-img-top{
      height: 200px;
    }

    .fec{
      height: 70px;
      width: 80px;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }

  </style>
</head>
<body class="bg-light">


<?php require('header.php'); ?>

<div class="container-fluid px-lg-4 mt-4">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="images/images/image.jpg" class="w-100 d-block"/>
        </div>
        <div class="swiper-slide">
          <img src="images/images/jade-mountain.jpg" class="w-100 d-block"/>
        </div>
        <div class="swiper-slide">
          <img src="images/images/istockphoto-119926339-612x612.jpg" class="w-100 d-block"/>
        </div>
        <div class="swiper-slide">
          <img src="images/images/luxury-hotel.jpg" class="w-100 d-block"/>
        </div>
         <div class="swiper-slide">
          <img src="images/images/photo-1561501900-3701fa6a0864.jpg" class="w-100 d-block"/>
        </div>
       </div>
    </div>
</div>


<div class="container availibility-form">
  <div class="row">
    <div class="col-lg-12 bg-white shadow p-4 rounded">
      <h5 class="mb-4">Check Booking Avalability</h5>
      <form>
        <div class="row align-items-end">
          <div class="col-lg-3 mb-3">
             <label class="form-label" style="font-weight: 500">Check-in</label>
             <input type="date" class="form-control shadow-none" >
          </div>
           <div class="col-lg-3 mb-3">
             <label class="form-label" style="font-weight: 500">Check-out</label>
             <input type="date" class="form-control shadow-none" >
          </div>
          <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight: 500">Adult</label>
              <select class="form-select shadow-none">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
          </div>
           <div class="col-lg-2 mb-3">
              <label class="form-label" style="font-weight: 500">Children</label>
              <select class="form-select shadow-none">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
          </div>
          <div class="col-lg-1 mb-lg-3 mt-2">
            <button href="rooms.php" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">See More</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<h2 class="mt-5 pt-4 mb-5 text-center fw-bold h-font">OUR ROOMS</h2>

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
      <img src="images\images\rooms1.jpg" class="card-img-top">
      <div class="card-body">
       <h5>Simple Room Name</h5>
       <H6 class="mb-4">50€ per night</H6>
       <div class="features mb-4">
        <h6 class="mb-1">Features</h6>
        <span class="badge rounded-pill bg-light text-dark text-warp">
          2 Rooms
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          1 bathroom
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          1 Balcony
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          3 Sofa
        </span>
       </div>
       <div class="facilities mb-4">
          <h6 class="mb-1">Facilities</h6>
          <span class="badge rounded-pill bg-light text-dark text-warp">
          Wifi
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          Television
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          AC
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          Room heater
        </span>
       </div>
       <div class="guests mb-4">
        <h6 class="mb-1">Guests</h6>
        <span class="badge rounded-pill bg-light text-dark text-warp">
          Adults
        </span>
        <span class="badge rounded-pill bg-light text-dark text-warp">
          Children
        </span>
       </div>
       <div class="rating mb-4">
         <h6 class="mb-1">Rating</h6>
         <span class="badge rounded-pill bg-light">
         <i class="bi bi-star-fill text-warning"></i>
         <i class="bi bi-star-fill text-warning"></i>
         <i class="bi bi-star-fill text-warning"></i>
         <i class="bi bi-star-fill text-warning"></i>
         </span>
       </div>
       <div class="d-flex justify-content-evenly mb-2">
         <a href="bookings.php" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Book Now</a>
       </div>
      </div>
      </div>
      
    </div>
     <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
      <img src="images\images\rooms1.jpg" class="card-img-top">
      <div class="card-body">
       <h5>Simple Room Name</h5>
       <H6 class="mb-4">50€ per night</H6>
       <div class="features mb-4">
        <h6 class="mb-1">Features</h6>
        <span class="badge rounded-pill bg-light text-dark text-warp">
          2 Rooms
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          1 bathroom
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          1 Balcony
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          3 Sofa
        </span>
       </div>
       <div class="facilities mb-4">
          <h6 class="mb-1">Facilities</h6>
          <span class="badge rounded-pill bg-light text-dark text-warp">
          Wifi
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          Television
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          AC
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          Room heater
        </span>
       </div>
       <div class="rating mb-4">
         <h6 class="mb-1">Rating</h6>
         <span class="badge rounded-pill bg-light">
         <i class="bi bi-star-fill text-warning"></i>
         <i class="bi bi-star-fill text-warning"></i>
         <i class="bi bi-star-fill text-warning"></i>
         <i class="bi bi-star-fill text-warning"></i>
         </span>
       </div>
       <div class="d-flex justify-content-evenly mb-2">
         <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Book Now</a>
       </div>
      </div>
      </div>
    </div>

     <div class="col-lg-4 col-md-6 my-3">
      <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
      <img src="images\images\rooms1.jpg" class="card-img-top">
      <div class="card-body">
       <h5>Simple Room Name</h5>
       <H6 class="mb-4">50€ per night</H6>
       <div class="features mb-4">
        <h6 class="mb-1">Features</h6>
        <span class="badge rounded-pill bg-light text-dark text-warp">
          2 Rooms
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          1 bathroom
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          1 Balcony
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          3 Sofa
        </span>
       </div>
       <div class="facilities mb-4">
          <h6 class="mb-1">Facilities</h6>
          <span class="badge rounded-pill bg-light text-dark text-warp">
          Wifi
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          Television
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          AC
        </span>
         <span class="badge rounded-pill bg-light text-dark text-warp">
          Room heater
        </span>
       </div>
       <div class="rating mb-4">
         <h6 class="mb-1">Rating</h6>
         <span class="badge rounded-pill bg-light">
         <i class="bi bi-star-fill text-warning"></i>
         <i class="bi bi-star-fill text-warning"></i>
         <i class="bi bi-star-fill text-warning"></i>
         <i class="bi bi-star-fill text-warning"></i>
         </span>
       </div>
       <div class="d-flex justify-content-evenly mb-2">
         <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Book Now</a>
       </div>
      </div>
      </div>
      
    </div>
    <div class="col-lg-12 text-center mt-5">
      <a href="" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
    </div>
  </div>
</div>

  <form action="bookings.php" method="post">
    <input type="hidden" name="room_id" value="<?= $room['id'] ?>">
    <label>Check-in: <input type="date" name="check_in" required></label>
    <label>Check-out: <input type="date" name="check_out" required></label>
    <button type="submit" name="book_now" class="btn btn-primary">Book Now</button>
</form>

<h2 class="mt-5 pt-4 mb-5 text-center fw-bold h-font">OUR FACILITIES</h2>

<div class="container">
  <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images\images\wifi-removebg-preview.png" class="fec" width="80px">
      <h5 class="mt-3">Wifi</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images\images\wifi-removebg-preview.png" class="fec" width="80px">
      <h5 class="mt-3">Wifi</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images\images\wifi-removebg-preview.png" class="fec" width="80px">
      <h5 class="mt-3">Wifi</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images\images\wifi-removebg-preview.png" class="fec" width="80px">
      <h5 class="mt-3">Wifi</h5>
    </div>
    <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
      <img src="images\images\wifi-removebg-preview.png" class="fec" width="80px">
      <h5 class="mt-3">Wifi</h5>
    </div>
  </div>
</div>
 <div class="col-lg-12 text-center mt-5">
      <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities >>></a>
    </div>

<h2 class="mt-5 pt-4 mb-5 text-center fw-bold h-font">Contact us</h2>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
      <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46921.54200113891!2d21.04500897957655!3d42.69109149559391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13536049bb7671e5%3A0x87d10fe90f8c48d6!2sObili%C4%87%2015000!5e0!3m2!1sen!2s!4v1750189950580!5m2!1sen!2s"></iframe>
    </div>
    <div class="col-lg-4 col-md-4">
      <div class="bg-white p-4 rounded ">
        <h5>Call us</h5>
        <a href="tel: +5441816642" class="d-inline-block mb-2 text-decoration-none text-dark">
          <i class="bi bi-telephone-fill"></i>+5441816642
        </a>
        <br>
        <a href="tel: +5441816642" class="d-inline-block text-decoration-none text-dark">
          <i class="bi bi-telephone-fill"></i>+5441816642
        </a>
      </div>
      <div class="bg-white p-4 rounded ">
        <h5>Follow us</h5>
        <a href="#" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
          <i class="bi bi-tiktok me-1"></i>TikTok
          </span>
        </a>
        <br>
        <a href="#" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
          <i class="bi bi-instagram me-1"></i>Instagram
          </span>
        </a>
        <br>
        <a href="#" class="d-inline-block mb-3">
          <span class="badge bg-light text-dark fs-6 p-2">
          <i class="bi bi-facebook me-1"></i>Facebook
          </span>
        </a>
      </div>
    </div>
  </div>
</div>

<?php require('footer.php') ?>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

 <script>
      var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        }
      });
  </script>
</body>
</html>