<?php
// Check for errors in the session and display them
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];

    // Clear the errors after displaying them
    unset($_SESSION['errors']);
}
?>

<!DOCTYPE html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script defer type="module" src="../JS/validate.register.js"></script>
</head>
<?php require('partials/Navbar.php') ?>
    <?php require('partials/theme.php') ?>
        <div class="d-flex justify-content-center align-items-center full-height pt-5 mt-5">
            <div class="card text-light" style="width: 22rem; background: #121212;">
                <div class="card-body text-center"> <!-- Added text-center for centering content -->
                    <h2 class="card-title mb-4">Register Account</h2>
                    <form action="/Week-1-Project-Waltenberg/public/register" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" name="username" type="username" class="form-control bg-light text-dark border-0" placeholder="Enter username">
                            <div id="error-message" style="color: red;"></div>
                            
                            <?php if (isset($errors['username'])) : ?> 
                                <p class="text-xs mt-2" style="color: red;"><?= $errors['username']?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" name="password" type="password" class="form-control bg-light text-dark border-0" placeholder="Enter password">
                            <div id="error-message" style="color: red;"></div>

                            <?php if (isset($errors['password'])) : ?> 
                                <p class="text-xs mt-2" style="color: red;"><?= $errors['password']?></p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>