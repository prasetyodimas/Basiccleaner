<?php include '../config/koneksi.php';
$id = isset($_GET['id_kategori_layanan']) ? intval($_GET['id_kategori_layanan']) : 0;

$get_repaint = "SELECT * FROM kategori_layanan WHERE jenis_layanan='$id'";
$result = mysqli_query($con,$get_repaint);
$response = array();
while ($hasil = mysqli_fetch_array($result)) {
	$response[] = $hasil;
}
echo json_encode($response);
?>