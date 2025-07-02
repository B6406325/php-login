<?php 
  session_start();
  include('db.php') 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login & Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    .form-container {
      max-width: 400px;
      margin: 40px auto;
    }
    .nav-tabs .nav-link.active {
      background-color: #0d6efd;
      color: white;
    }
  </style>
</head>
<body>

  <nav class="nav justify-content-center border-bottom py-3">
    <h1>PHP Login & Register</h1>
  </nav>

  <main class="form-container">
    <ul class="nav nav-tabs mb-3" id="authTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">Login</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab">Sign Up</button>
      </li>
    </ul>

    <?php include('errors.php'); ?>
    <?php if (isset($_SESSION['error'])) : ?>
      <div class="error">
          <h5>
              <?php 
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
              ?>
          </h5>
      </div>
    <?php endif ?>

    <div class="tab-content" id="authTabContent">
      <!-- Login Form -->
      <div class="tab-pane fade show active" id="login" role="tabpanel">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Login</h5>
                <form action="login.php" method="POST">
              <div class="mb-3">
                <label for="loginEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="loginEmail" name="email" required>
              </div>
              <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="password" required>
              </div>
              <button type="submit" name="log" class="btn btn-primary w-100">Login</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Register Form -->
      <div class="tab-pane fade" id="register" role="tabpanel">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Sign Up</h5>
            <form action="register.php" method="POST">
              <div class="mb-3">
                <label for="registerName" class="form-label">Name</label>
                <input type="text" class="form-control" id="registerName" name="name" required>
              </div>
              <div class="mb-3">
                <label for="registerEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="registerEmail" name="email" required>
              </div>
              <div class="mb-3">
                <label for="registerPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="registerPassword" name="password" required>
              </div>
              <button type="submit" name="reg" class="btn btn-success w-100">Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
