<?php
  $conn = pg_connect("dbname=msn user=postgres password=12345");
  $qr   = pg_exec($conn, "select stt, diem_dat, lat, long, dia_chi from wsn where dia_chi like '%".$_GET["keyword"]."%'");
  $re   = pg_fetch_all($qr);
  echo json_encode($re);
  pg_close($conn);
?>
