<?php 
session_start();
include_once('config.php');

// Check if user is logged in, otherwise redirect to login
if (!isset($_SESSION['id'])) {

}

$sql = "SELECT bookings.*, rooms.room_number, rooms.type
        FROM bookings
        INNER JOIN rooms ON bookings.room_id = rooms.id
        WHERE bookings.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$stmt = $conn->prepare("INSERT INTO bookings (user_id, room_id, check_in, check_out, status) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iisss", $user_id, $room_id, $check_in, $check_out, $status);


$name = $_SESSION['name'] ?? '';
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 'true';

// Fetch bookings
$bookings_data = [];
try {
    if ($is_admin) {
        $sql = "SELECT rooms.room_number, users.email, bookings.id, bookings.nr_tickets, bookings.date, bookings.time
                FROM rooms
                INNER JOIN bookings ON rooms.id = bookings.room_id
                INNER JOIN users ON users.id = bookings.user_id";
        $selectBookings = $conn->prepare($sql);
        $selectBookings->execute();
        $bookings_data = $selectBookings->fetchAll(PDO::FETCH_ASSOC);
    } else {
        // Added bookings.id to select for approve/decline links (even if user can't approve)
        $sql = "SELECT rooms.room_name, users.email, bookings.id, bookings.nr_tickets, bookings.date, bookings.time
                FROM rooms
                INNER JOIN bookings ON rooms.id = bookings.room_id
                INNER JOIN users ON users.id = bookings.user_id
                WHERE bookings.user_id = :user_id";



    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
    <?php echo "Welcome to dashboard " . htmlspecialchars($name); ?>
  </a>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <?php if ($is_admin): ?>
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="rooms.php">Rooms</a></li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link active" href="bookings.php">Bookings</a></li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bookings</h1>
      </div>

      <h2>Room Bookings</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Room Number</th>
              <th>User Email</th>
              <th>Number of tickets</th>
              <th>Date</th>
              <th>Time</th>
              <?php if ($is_admin): ?>
                <th>Approve</th>
                <th>Decline</th>
              <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($bookings_data as $booking): ?>
              <tr>
                <td><?= htmlspecialchars($booking['room_number']) ?></td>
                <td><?= htmlspecialchars($booking['email']) ?></td>
                <td><?= htmlspecialchars($booking['nr_tickets']) ?></td>
                <td><?= htmlspecialchars($booking['date']) ?></td>
                <td><?= htmlspecialchars($booking['time']) ?></td>
                <?php if ($is_admin): ?>
                  <td><a href="approve.php?id=<?= urlencode($booking['id']) ?>">Approve</a></td>
                  <td><a href="decline.php?id=<?= urlencode($booking['id']) ?>">Decline</a></td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>