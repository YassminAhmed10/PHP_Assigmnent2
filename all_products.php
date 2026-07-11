<?php
session_start();

$products = [
    'Lip Stick' => [
        'price' => '320',
        'img'   => 'images/lipstick_1.png',
        'desc'  => 'Long-lasting, richly pigmented color that glides on smooth.',
    ],
    'Mascara' => [
        'price' => '300',
        'img'   => 'images/mascara_1.png',
        'desc'  => 'Volumizing formula that lifts and defines every lash.',
    ],
    'EyeShadow' => [
        'price' => '350',
        'img'   => 'images/eyeShadow.png',
        'desc'  => 'Blendable, buildable shades for a flawless eye look.',
    ],
    'Blush' => [
        'price' => '299',
        'img'   => 'images/blush.png',
        'desc'  => 'A soft, natural flush that lasts all day long.',
    ],
    'Foundation' => [
        'price' => '230',
        'img'   => 'images/foundation.png',
        'desc'  => 'Lightweight, full coverage for a smooth, even finish.',
    ],
    'Lip Gloss' => [
        'price' => '350',
        'img'   => 'images/lipgloss_1.png',
        'desc'  => 'A glossy, non-sticky shine that keeps lips hydrated.',
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Products | The Star</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="container products-section">
    <h2 class="text-center mb-4">All Products</h2>
    <div class="row">
        <?php foreach ($products as $product => $values): ?>
            <div class="col-md-4">
                <div class="card product-card">
                    <img src="<?php echo htmlspecialchars($values['img']); ?>"
                         class="card-img-top" alt="<?php echo htmlspecialchars($product); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($product); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($values['desc']); ?></p>
                        <p class="card-text"><strong><?php echo htmlspecialchars($values['price']); ?> EGP</strong></p>
                        <a href="#" class="btn btn-pink">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>