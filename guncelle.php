<!DOCTYPE html>
<html>
<head>
    <title>Ürün Güncelleme</title>
</head>
<body>
    <?php include "navbar.php";?>
    <div class="container">
  <h1 class="mt-4">Ürün Güncelleme</h1>
  <form action="guncelle.php" method="post">
    <div class="form-group">
      <label for="urun_id">Ürün ID:</label>
      <input type="number" name="urun_id" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="yeni_urun_ad">Yeni Ürün Adı:</label>
      <input type="text" name="yeni_urun_ad" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="yeni_urun_fiyat">Yeni Ürün Fiyatı:</label>
      <input type="number" name="yeni_urun_fiyat" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="yeni_stok_miktar">Stok Miktarı:</label>
      <input type="number" name="yeni_stok_miktar" class="form-control" id="yeni_stok_miktar" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Ürünü Güncelle</button>
  </form>
</div>

<?php
include "mysql.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $urun_id = $_POST["urun_id"];
    $yeni_urun_ad = $_POST["yeni_urun_ad"];
    $yeni_urun_fiyat = $_POST["yeni_urun_fiyat"];
    $yeni_stok_miktar = $_POST["yeni_stok_miktar"];
    
    $sql = "UPDATE products SET urun_ad = '$yeni_urun_ad', urun_fiyat = '$yeni_urun_fiyat' , stok_miktar = '$yeni_stok_miktar' WHERE id = $urun_id";

    if ($query->query($sql) === TRUE) {
        echo "Ürün başarıyla güncellendi!";
    } else {
        echo "Hata: " . $sql . "<br>" . $query->error;
    }
}

$query->close();
?>
</body>
</html>
