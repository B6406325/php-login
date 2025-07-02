<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="#">Dashboard</a>
    <div class="ms-auto">
      <span class="text-white me-3">👤 <?php echo $_SESSION['name'] ?? 'User'; ?></span>
      <a href="index.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </nav>

  <!-- Alert: Success Message -->
  <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success text-center mb-0">
      <?php 
          echo $_SESSION['success']; 
          unset($_SESSION['success']); 
      ?>
    </div>
  <?php endif; ?>

  <!-- Main Content -->
  <main class="container mt-5">
    <h2>Welcome to your Dashboard 🎉</h2>
    <p>This is a protected page accessible only after login.</p>

    <!-- Example Content -->
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-body">
            <h5 class="card-title">Your Profile</h5>
            <p>Name: <?php echo $_SESSION['name']; ?></p>
            <p>Email: <?php echo $_SESSION['email']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </main>

</body>
</html>