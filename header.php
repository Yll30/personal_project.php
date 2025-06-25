<!-- Bootstrap and Icons CDN (add these in your <head>) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Navbar</a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active me-2" href="Index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="Rooms.php">Rooms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="Facilities.php">Facilities</a>
        </li>
      </ul>
      <div class="d-flex">
        <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
      </div>
    </div>
  </div>
</nav>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="login.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-circle fs-3 me-2"></i>User Login
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="loginEmail" class="form-label">Email address</label>
            <input type="email" class="form-control shadow-none" id="loginEmail" name="email" required>
          </div>
          <div class="mb-4">
            <label for="loginPassword" class="form-label">Password</label>
            <input type="password" class="form-control shadow-none" id="loginPassword" name="password" required>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="register.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-lines-fill fs-3 me-2"></i>User Registration
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 ps-0 mb-3">
                <label for="regName" class="form-label">Name</label>
                <input type="text" class="form-control shadow-none" id="regName" name="name" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label for="regEmail" class="form-label">Email</label>
                <input type="email" class="form-control shadow-none" id="regEmail" name="email" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label for="regPhone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control shadow-none" id="regPhone" name="phone" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label for="regAddress" class="form-label">Address</label>
                <textarea class="form-control shadow-none" id="regAddress" name="address" rows="1" required></textarea>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label for="regPincode" class="form-label">Pincode</label>
                <input type="text" class="form-control shadow-none" id="regPincode" name="pincode" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label for="regDob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control shadow-none" id="regDob" name="dob" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label for="regPassword" class="form-label">Password</label>
                <input type="password" class="form-control shadow-none" id="regPassword" name="password" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label for="regConfirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control shadow-none" id="regConfirmPassword" name="confirm_password" required>
              </div>
            </div>
          </div>
          <div class="text-center my-1">
            <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

