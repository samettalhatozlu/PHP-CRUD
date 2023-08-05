<?php include "navbar.php";
include "mysql.php";

$sql = "SELECT products.*, categories.category_name FROM products
        LEFT JOIN categories ON products.category_id = categories.id";
$result = $query->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ürün Listesi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Ürün Listesi</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ürün Adı</th>
                    <th scope="col">Ürün Fiyatı</th>
                    <th scope="col">Stok Miktarı</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["urun_ad"]; ?></td>
                        <td><?php echo $row["urun_fiyat"]; ?></td>
                        <td><?php echo $row["stok_miktar"]; ?></td>
                        <td><?php echo $row["category_name"]; ?></td>
                        <td>
                            <a href="guncelle.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary">Güncelle</a>
                            <button onclick="confirmAndDelete(<?php echo $row["id"]; ?>)" class="btn btn-danger">Sil</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        function confirmAndDelete(id) {
            var result = confirm("Bu ürünü silmek istediğinizden emin misiniz?");
            if (result) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "sil.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            alert("Ürün başarıyla silindi.<?php $urun_ad;?>");
                            location.reload();
                        } else {
                            alert("Ürün silinirken bir hata oluştu.");
                        }
                    }
                };
                xhr.send("urun_id=" + id);
            }
        }
    </script>
</body>

</html>

<?php
$query->close();
?>
