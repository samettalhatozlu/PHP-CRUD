<!DOCTYPE html>
<html>

<head>
    <title>Ürün Silme</title>
</head>

<body>
    <h1>Ürün Silme</h1>
    <form action="sil.php" method="post">
        <label for="urun_id">Ürün ID:</label>
        <input type="number" name="urun_id" required><br>

        <input type="submit" value="Ürünü Sil">
    </form>
    <?php
include "mysql.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $urun_id = $_POST["urun_id"];

    $sql = "DELETE FROM products WHERE id = $urun_id";

    if ($query->query($sql) === TRUE) {
        echo "Ürün silindi";
    } else {
        echo "Hata: " . $sql . "<br>" . $query->error;
    }
}
$query->close();
?>
</body>

</html>