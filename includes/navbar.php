<nav class="navbar navbar-expand-lg navbar-dark navbar-navy px-4">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="images\Logo.png" alt="LOGO" class="navbar-logo mr-2">
        Y Store
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="all_products.php">All Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="account.php">Account</a>
            </li>
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
