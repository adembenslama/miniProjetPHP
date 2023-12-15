<?php
include_once("Jeu.php");

$jeu = new Jeu();
$jeux = $jeu->getAllJeux();
?>

<!DOCTYPE html>
<html>
<style>
  style>body {
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


<!-- ... (previous HTML code) ... -->
<!-- ... (previous HTML code) ... -->

<body>

  <button title="home"><a href="Dashboard.php">Home</a></button>

  <h2>Jeux</h2>
  <button title="Ajout"><a href="AddJeux.html.php">Ajouter</a></button>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prix</th>
      <th>Stock</th>
      <th>Image</th>
      <th>Gallerie</th>
      <th>Genre</th>
      <th>Action</th>
    </tr>
    <?php foreach ($jeux as $index => $jeu) { ?>
      <tr>
        <td>
          <?php echo $jeu['IdJeu']; ?>
        </td>
        <td>
          <?php echo $jeu['nom']; ?>
        </td>
        <td>
          <?php echo $jeu['prix']; ?>
        </td>
        <td>
          <?php echo $jeu['stock']; ?>
        </td>
        <td>
          <?php
          $imageData = $jeu['image'];
          if ($imageData) {
            $base64Image = base64_encode($imageData);

            echo "<img src='data:image/jpeg;base64, $base64Image'  height=100 width=100 alt='Image'>";
          } else {
            echo "No Image";
          }
          ?>
        </td>
        <td>
          <?php echo $jeu['gallerie']; ?>
        </td>
        <td>
          <?php echo $jeu['genre']; ?>
        </td>
        <td>
          <form action="DeleteJeux.php" method="post">
            <input type="hidden" name="id" value="<?php echo $jeu['IdJeu']; ?>">
            <input type="submit" value="Delete">
          </form>
        </td>
      </tr>
    <?php } ?>
  </table>

</body>

</html>


</html>


</html>