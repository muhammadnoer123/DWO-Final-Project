<?php
require('koneksi.php');

$sql1 = "SELECT s.Name kategori, 
        t.bulan as bulan,
       sum(fp.LineTotal) as pendapatan 
    FROM shipmethod s, faktapembelian fp, time t 
WHERE (s.ShipMethodID = fp.ShipMethodID) AND (t.TimeID = fp.TimeID) 
GROUP BY kategori, bulan";

$result1 = mysqli_query($koneksi,$sql1);

$pendapatan = array();

while ($row = mysqli_fetch_array($result1)) {
    array_push($pendapatan,array(
        "pendapatan"=>$row['pendapatan'],
        "bulan" => $row['bulan'],
        "kategori" => $row['kategori']
    ));
}

$data2 = json_encode($pendapatan);

?>