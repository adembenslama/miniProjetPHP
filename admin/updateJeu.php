<?php
include_once("Jeu.php");

// Assuming you pass the game ID through the URL
$gameId = $_POST['id'];

// Instantiate the Jeu class
$jeu = new Jeu();

// Get game details by ID
$gameDetails = $jeu->getJeuById($gameId);

// Fetch all genres for the dropdown
include_once("Genre.php");
$genreModel = new Genre();
$genres = $genreModel->getAllGenres();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Modifier Jeu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <!-- Navbar content goes here -->
            </nav>
            <!-- Navbar End -->

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <h3 class="mb-4">Modifier Jeu</h3>
                    <form action="UpdateJeux.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $gameDetails['IdJeu']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nom</label>
                            <input class="form-control mb-3" type="text" name="nom" placeholder="Nom"
                                value="<?php echo $gameDetails['nom']; ?>" aria-label="default input example">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Prix</label>
                            <input class="form-control mb-3" type="number" name="prix" placeholder="Prix"
                                value="<?php echo $gameDetails['prix']; ?>" aria-label="default input example">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Stock</label>
                            <input class="form-control mb-3" type="number" name="stock" placeholder="Stock"
                                value="<?php echo $gameDetails['stock']; ?>" aria-label="default input example">
                        </div>


                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Genre</label>
                            <select id="genre" class="form-select mb-3" name="genre">
                                <?php
                                foreach ($genres as $genre) {
                                    $selected = ($genre['nom'] === $gameDetails['genre']) ? 'selected' : '';
                                    echo "<option value='{$genre['nom']}' $selected>{$genre['nom']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Content End -->
    </div>

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