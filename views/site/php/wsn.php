<?php
  $conn = pg_connect("dbname=wsn user=postgres password=12345");
  $qr   = pg_exec($conn, "select stt, diem_dat, lat, long from wsn");
  $re   = pg_fetch_all($qr);
  echo json_encode($re);
  pg_close($conn);
?>
