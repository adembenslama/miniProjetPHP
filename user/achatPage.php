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
            echo $gameId;
            echo $adresse;

            // Insert the purchase details into the 'achat' table
            $achat = new Achat();
            $achatResult = $achat->insert($adresse, $gameId);

            if ($achatResult) {
                echo "<div class='alert alert-success' role='alert'>
                        Thank you for your purchase! Your order for Game #$gameId has been confirmed.
                      </div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                        Oops! Something went wrong. Please try again.
                      </div>";
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