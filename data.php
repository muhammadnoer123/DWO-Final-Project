<?php
require('koneksi.php');

$sql = "SELECT s.Name nama_toko, 
        SUM(p.LineTotal) AS total
        FROM shipmethod s, faktapembelian p 
        WHERE s.ShipMethodID = p.ShipMethodID GROUP BY s.Name";
$result = mysqli_query($koneksi,$sql);

$hasil = array();

while ($row = mysqli_fetch_array($result)) {
    array_push($hasil,array(
        "name"=>$row['nama_toko'],
        "total"=>$row['total']
    ));
}

$data = json_encode($hasil);

?>