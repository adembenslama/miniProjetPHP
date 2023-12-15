<!DOCTYPE html>
<html>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h2 {
        text-align: center;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<body>

    <h2>Ajout d'un jeu</h2>

    <form action="AddJeux.php" method="post" enctype="multipart/form-data">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom"><br>
        <label for="prix">Prix:</label><br>
        <input type="text" id="prix" name="prix"><br>
        <label for="stock">Stock:</label><br>
        <input type="text" id="stock" name="stock"><br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image"><br>
        <label for="gallerie">Gallerie:</label><br>
        <input type="text" id="gallerie" name="gallerie"><br>
        <label for="genre">Genre:</label><br>
        <select id="genre" name="genre">
            <?php
            include_once("Genre.php");
            $genreModel = new Genre();
            $genres = $genreModel->getAllGenres();

            foreach ($genres as $genre) {
                echo "<option value='{$genre['idGenre']}'>{$genre['nom']}</option>";
            }
            ?>
        </select><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>