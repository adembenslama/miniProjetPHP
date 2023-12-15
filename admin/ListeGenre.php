<?php
include_once("Genre.php");

$genre = new Genre();
$genres = $genre->getAllGenres();
?>

<!DOCTYPE html>
<html>
<style>
    <style>body {
        font-family: Arial, sans-serif;
    }

    h2 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    form {
        display: inline-block;
    }
</style>

<body>
    <button title="home"><a href="Dashboard.php">Home</a></button>

    <h2>Genres</h2>
    <button title="Ajout"><a href="AddGenre.html">Ajouter</a></button>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($genres as $index => $genre) { ?>
            <tr>
                <td>
                    <?php echo $genre['IdGenre']; ?>
                </td>
                <td>
                    <?php echo $genre['nom']; ?>
                </td>
                <td>
                    <form action="DeleteGenre.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $genre['IdGenre']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>