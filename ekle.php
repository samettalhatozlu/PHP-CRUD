<?php
include "navbar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $urun_ad = $_POST["urun_ad"];
    $urun_fiyat = $_POST["urun_fiyat"];
    $stok_miktar = $_POST["stok_miktar"];
    $kategori = $_POST["kategori"];
}

const host = "spotindustry.net";
const username = "samet_smt1";
const password = "UdxvX16qd7";
const dbname = "samet_smt1";

$query = mysqli_connect(host, username, password, dbname);

if (!$query) {
    die("Veri tabanına bağlantı başarısız. Hata:" . mysqli_connect_error());
} else {
    echo "Veri tabanına bağlantı başarılı." . "<br>";
}

if ($query->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $query->connect_error);
}

if ($kategori === "yeni_kategori") {
    $yeni_kategori_ad = $_POST["yeni_kategori"];
    $sql_kategori = "INSERT INTO categories (category_name) VALUES ('$yeni_kategori_ad')";
    if ($query->query($sql_kategori) === TRUE) {
        $kategori_id = $query->insert_id;
    } else {
        echo "Yeni kategori eklenirken hata oluştu: " . $sql_kategori . "<br>" . $query->error;
    }
} else {

    $kategori_id = $kategori;
}

$sql_urun = "INSERT INTO products (urun_ad, urun_fiyat, stok_miktar, category_id) VALUES ('$urun_ad', '$urun_fiyat', '$stok_miktar', '$kategori_id')";

if ($query->query($sql_urun) === TRUE) {
    echo "Ürün başarıyla eklendi!";
} else {
    echo "Hata: " . $sql_urun . "<br>" . $query->error;
}

$query->close();
?>
