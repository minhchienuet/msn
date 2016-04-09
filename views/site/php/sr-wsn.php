<?php
  $conn = pg_connect("dbname=wsn user=postgres password=12345");
  $qr   = pg_exec($conn, "select stt, diem_dat, lat, long from wsn where diem_dat like '%".$_GET["wsn-name"]."%'");
  $re   = pg_fetch_all($qr);
  echo json_encode($re);
  pg_close($conn);
?>
