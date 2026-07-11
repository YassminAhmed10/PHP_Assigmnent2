<?php
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_SESSION['logged_in'])) {
        $email    = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($email)) {
            $errors[] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address.';
        }

        if (empty($password)) {
            $errors[] = 'Password is required.';
        } elseif (strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters long.';
        }

        if (empty($errors)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['email']     = $email;

            header('Location: all_products.php');
            exit;
        }

    } else {
        $username  = trim($_POST['username'] ?? '');
        $password  = trim($_POST['password'] ?? '');
        $email     = trim($_POST['email'] ?? '');
        $phone     = trim($_POST['phone'] ?? '');
        $facebook  = trim($_POST['facebook'] ?? '');
        $twitter   = trim($_POST['twitter'] ?? '');
        $instagram = trim($_POST['instagram'] ?? '');

        if (empty($username)) {
            $errors[] = 'Username is required.';
        } elseif (strlen($username) < 3) {
            $errors[] = 'Username must be at least 3 characters long.';
        }

        if (empty($password)) {
            $errors[] = 'Password is required.';
        } elseif (strlen($password) < 6) {
            $errors[] = 'Password must be at least 6 characters long.';
        }

        if (empty($email)) {
            $errors[] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address.';
        }

        if (empty($phone)) {
            $errors[] = 'Phone number is required.';
        } elseif (!preg_match('/^01[0-2,5]{1}[0-9]{8}$/', $phone)) {
            $errors[] = 'Please enter a valid phone number (e.g. 01012345678).';
        }

        if (!empty($facebook) && !filter_var($facebook, FILTER_VALIDATE_URL)) {
            $errors[] = 'Facebook account URL is not valid.';
        }

        if (!empty($twitter) && !filter_var($twitter, FILTER_VALIDATE_URL)) {
            $errors[] = 'Twitter account URL is not valid.';
        }

        if (!empty($instagram) && !filter_var($instagram, FILTER_VALIDATE_URL)) {
            $errors[] = 'Instagram account URL is not valid.';
        }

        if (empty($errors)) {
            $_SESSION['username']      = $username;
            $_SESSION['profile_email'] = $email;
            $_SESSION['phone']         = $phone;
            $_SESSION['facebook']      = $facebook;
            $_SESSION['twitter']       = $twitter;
            $_SESSION['instagram']     = $instagram;

            header('Location: index.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account | The Star</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="form-wrapper">

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (!isset($_SESSION['logged_in'])): ?>

        <h3 class="mb-4 text-center">Login</h3>
        <form method="POST" action="account.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>

    <?php else: ?>

        <h3 class="mb-4 text-center">Complete Your Profile</h3>
        <form method="POST" action="account.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                       value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone"
                       value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook URL</label>
                <input type="text" class="form-control" id="facebook" name="facebook"
                       value="<?php echo isset($_POST['facebook']) ? htmlspecialchars($_POST['facebook']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="twitter">Twitter URL</label>
                <input type="text" class="form-control" id="twitter" name="twitter"
                       value="<?php echo isset($_POST['twitter']) ? htmlspecialchars($_POST['twitter']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram URL</label>
                <input type="text" class="form-control" id="instagram" name="instagram"
                       value="<?php echo isset($_POST['instagram']) ? htmlspecialchars($_POST['instagram']) : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Save Profile</button>
        </form>

    <?php endif; ?>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
