<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Purchase</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <?php
        include_once("Jeu.php");
        include_once("Achat.php");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle the form submission and purchase confirmation here
            // Retrieve details from the form
            $gameId = $_POST['id'];
            $adresse = $_POST['adresse'];

            // Fetch game details from the database
            $jeu = new Jeu();
            $gameDetails = $jeu->getJeuById($gameId);

            if ($gameDetails) {
                // Display game details and confirmation button
                ?>
                <div class="card">
                    <?php
                    $imageData = $gameDetails['image'];
                    if ($imageData) {
                        $base64Image = base64_encode($imageData);
                        echo "<img src='data:image/jpeg;base64, $base64Image' class='card-img-top' alt='{$gameDetails['nom']}' style='height: 300px; width: 300px;'>";
                    } else {
                        echo "<div class='card-img-top text-center' style='height: 300px; width: 300px; background-color: #f8f9fa;'>No Image</div>";
                    }
                    ?>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $gameDetails['nom']; ?>
                        </h5>
                        <p class="card-text">Price: $
                            <?php echo $gameDetails['prix']; ?>
                        </p>
                        <p class="card-text">Genre:
                            <?php echo $gameDetails['genre']; ?>
                        </p>
                        <!-- Add more details as needed... -->

                        <!-- Purchase form -->
                        <form method="post" action="confirmer_achat.php">
                            <input type="hidden" name="id" value="<?php echo $gameDetails['idJeu']; ?>">
                            <input type="hidden" name="adresse" value="<?php echo $adresse; ?>">
                            <!-- Add more hidden fields and form elements as needed... -->

                            <button type="submit" class="btn btn-primary">Confirm Purchase</button>
                        </form>
                    </div>
                </div>
                <?php
            } else {
                echo "<div class='alert alert-danger' role='alert'>Game not found!</div>";
            }
        } else {
            // If the form is not submitted, show a message
            echo "<div class='alert alert-warning' role='alert'>
                    Invalid request. Please go back and try again.
                  </div>";
        }
        ?>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>