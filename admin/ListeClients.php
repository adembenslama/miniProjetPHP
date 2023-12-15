<?php
include_once("Client.php");

$client = new Client();
$clients = $client->getAllClients();
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

    <h2>Clients</h2>
    <!-- <button title="Ajout"><a href="AddClient.html">Ajouter</a></button>  -->


    <table border="1">
        <tr>

            <th>CIN</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Telephone</th>
            <th>Action</th>
        </tr>
        <?php foreach ($clients as $client) { ?>
            <tr>

                <td>
                    <?php echo $client['CIN']; ?>
                </td>
                <td>
                    <?php echo $client['nom']; ?>
                </td>
                <td>
                    <?php echo $client['adresse']; ?>
                </td>
                <td>
                    <?php echo $client['numero']; ?>
                </td>
                <td>
                    <form action="DeleteClient.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $client['CIN']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>