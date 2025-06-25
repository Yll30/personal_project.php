<?php
session_start();
require_once 'config.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
}

// Validate DB connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$user_name = $_SESSION['name'] ?? 'User';
$is_admin  = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === 'true';

// Fetch users and movies for admin
$users_data  = [];
$movies_data = [];

if ($is_admin) {
    if ($uStmt = $conn->prepare("SELECT id, emri, name, email FROM users")) {
        $uStmt->execute();
        $users_data = $uStmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $uStmt->close();
    }

    if ($mStmt = $conn->prepare("SELECT id, movie_name, movie_desc, movie_quality, movie_rating FROM movies ORDER BY id DESC")) {
        $mStmt->execute();
        $movies_data = $mStmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $mStmt->close();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3">
    <?php echo "Welcome, " . htmlspecialchars($user_name); ?>
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Search">
  <div class="navbar-nav">
    <a class="nav-link px-3" href="logout.php">Sign out</a>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <?php if ($is_admin): ?>
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="rooms.php">Rooms</a></li>
          <li class="nav-item"><a class="nav-link" href="bookings.php">Bookings</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="bookings.php">Bookings</a></li>
        <?php endif; ?>
        </ul>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <!-- Flash messages -->
      <?php if (!empty($_SESSION['success_message'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
          <?php echo htmlspecialchars($_SESSION['success_message']); unset($_SESSION['success_message']); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>
      <?php if (!empty($_SESSION['error_message'])): ?>
        <div class="alert alert-danger alert-dismissible fade show">
          <?php echo htmlspecialchars($_SESSION['error_message']); unset($_SESSION['error_message']); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <!-- Admin section -->
      <?php if ($is_admin): ?>
        <h2>Users</h2>
        <div class="table-responsive mb-5">
          <table class="table table-striped table-sm">
            <thead>
              <tr><th>Id</th><th>Name</th><th>Username</th><th>Email</th><th>Update</th><th>Delete</th></tr>
            </thead>
            <tbody>
            <?php if ($users_data): foreach($users_data as $u): ?>
              <tr>
                <td><?= htmlspecialchars($u['id']) ?></td>
                <td><?= htmlspecialchars($u['emri']) ?></td>
                <td><?= htmlspecialchars($u['username']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
                <td><a href="editUsers.php?id=<?= urlencode($u['id']) ?>">Update</a></td>
                <td><a href="deleteUsers.php?id=<?= urlencode($u['id']) ?>" class="text-danger" onclick="return confirm('Delete this user?');">Delete</a></td>
              </tr>
            <?php endforeach; else: ?>
              <tr><td colspan="6" class="text-center">No users found</td></tr>
            <?php endif; ?>
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
          <h2>Movies</h2>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMovieModal">Add New Movie</button>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr><th>Id</th><th>Name</th><th>Description</th><th>Quality</th><th>Rating</th><th>Delete</th></tr>
            </thead>
            <tbody>
            <?php if ($movies_data): foreach($movies_data as $mv): ?>
              <tr>
                <td><?= htmlspecialchars($mv['id']) ?></td>
                <td><?= htmlspecialchars($mv['movie_name']) ?></td>
                <td><?= htmlspecialchars(substr($mv['movie_desc'],0,50)) ?>…</td>
                <td><?= htmlspecialchars($mv['movie_quality']) ?></td>
                <td><?= htmlspecialchars($mv['movie_rating']) ?></td>
                <td><a href="delete_movie.php?id=<?= urlencode($mv['id']) ?>" class="text-danger" onclick="return confirm('Delete this movie?');">Delete</a></td>
              </tr>
            <?php endforeach; else: ?>
              <tr><td colspan="6" class="text-center">No movies found</td></tr>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </main>
  </div>
</div>

<?php if ($is_admin): ?>
<!-- Add Movie Modal -->
<div class="modal fade" id="addMovieModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog"><div class="modal-content">
    <form action="addMovie.php" method="post">
      <div class="modal-header">
        <h5 class="modal-title">Add New Movie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3"><label>Movie Name</label><input type="text" name="movie_name" class="form-control" required></div>
        <div class="mb-3"><label>Description</label><textarea name="movie_desc" class="form-control" rows="3" required></textarea></div>
        <div class="mb-3"><label>Quality</label>
          <select name="movie_quality" class="form-select" required>
            <option value="">Select</option><option>2D</option><option>3D</option><option>4D</option><option>6D</option>
          </select>
        </div>
        <div class="mb-3"><label>Rating (1‑10)</label>
          <input type="number" name="movie_rating" class="form-control" min="1" max="10" required>
        </div>
        <div class="mb-3">
          <label>Image Filename</label>
          <input type="text" name="movie_image" class="form-control" placeholder="example.jpg" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Add Movie</button>
      </div>
    </form>
  </div></div>
</div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
