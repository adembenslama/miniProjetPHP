<!DOCTYPE html>
<html lang="en">
<?php include_once("Jeu.php");
$adresse = $_GET['adresse'];

$jeu = new Jeu();
$jeux = $jeu->getAllJeux(); ?>

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>

        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">



                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">
                            <?php echo $adresse ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="achats.php" class="dropdown-item">mes Achats</a>

                        <a href="../signin.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
    </nav>
    <!-- Navbar End -->
    <div class="container mt-5">
        <div class="row">
            <?php


            foreach ($jeux as $jeu) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">

                        <?php
                        $imageData = $jeu['image'];
                        if ($imageData) {
                            $base64Image = base64_encode($imageData);
                            echo "<img src='data:image/jpeg;base64, $base64Image' class='card-img-top' alt='{$jeu['nom']}' >";
                        } else {
                            echo "<div class='card-img-top text-center' style='height: 100px; width: 100px; background-color: #f8f9fa;'>No Image</div>";
                        }
                        ?>
                        <div class="card-body">
                            <h5 class="card-title" style="color: black">
                                <?php echo $jeu['nom']; ?>
                            </h5>
                            <p class="card-text">prix: $
                                <?php echo $jeu['prix']; ?>
                            </p>
                            <p class="card-text">Genre:
                                <?php echo $jeu['genre']; ?>
                            </p>
                            <form method="post" action="achatPage.php">
                                <input hidden value="<?php echo $jeu['prix']; ?>" name="id">
                                <input hidden value="<?php echo $adresse; ?>" name="adresse">
                                <button type="submit" class="btn btn-primary">Acheter</button>
                            </form>
                        </div>
                    </div>

                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>