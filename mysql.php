<?php
const host = "spotindustry.net";
const username = "samet_smt1";
const password = "UdxvX16qd7";
const dbname = "samet_smt1";

$query = mysqli_connect(host, username, password, dbname);

if (!$query) {
    die("Veri tabanına bağlantı başarısız. Hata:" . mysqli_connect_error());
} else {
    echo "Veri tabanına bağlantı başarılı.";
}
?>