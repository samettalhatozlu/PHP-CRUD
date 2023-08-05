<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
</head>

<body>

    <?php include "navbar.php"; ?>
    <div class="container">
        <h1 class="mt-4">Ürün Ekleme Sayfası</h1>
        <form action="ekle.php" method="post">
            <div class="form-group">
                <label for="urun_ad">Ürün Adı:</label>
                <input type="text" name="urun_ad" id="urun_ad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="urun_fiyat">Ürün Fiyatı:</label>
                <input type="number" name="urun_fiyat" id="urun_fiyat" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="stok_miktar">Stok Miktarı:</label>
                <input type="number" name="stok_miktar" id="stok_miktar" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori Seç:</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <?php
                    include "mysql.php";
                    $sql = "SELECT * FROM categories";
                    $result = $query->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $kategori_id = $row['id'];
                            $kategori_ad = $row['category_name'];
                            echo '<option value="' . $kategori_id . '">' . $kategori_ad . '</option>';
                        }
                    } else {
                        echo '<option value="" disabled selected>Kategori Bulunamadı</option>';
                    }

                    $query->close();
                    ?>
                    <option value="yeni_kategori">Yeni Kategori</option>
                </select>
            </div>

            <!-- Yeni kategori adını girmek için gizli alan -->
            <div class="form-group" id="yeni_kategori_alani" style="display:none;">
                <label for="yeni_kategori">Yeni Kategori Adı:</label>
                <input type="text" name="yeni_kategori" id="yeni_kategori" class="form-control">
            </div>


            <button type="submit" class="btn btn-primary mt-2">Ürünü Ekle</button>
        </form>
    </div>

    <script>
        // Yeni kategori seçeneği değiştirildiğinde tetiklenen işlev
        document.getElementById("kategori").addEventListener("change", function() {
            var yeniKategoriAlanı = document.getElementById("yeni_kategori_alani");
            var secilenKategori = this.value;

            // "Yeni Kategori" seçeneği seçildiyse, yeni kategori alanını göster
            if (secilenKategori === "yeni_kategori") {
                yeniKategoriAlanı.style.display = "block";
            } else {
                yeniKategoriAlanı.style.display = "none";
            }
        });
    </script>

</html>