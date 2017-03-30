<?php include '../config/koneksi.php';
$id = isset($_GET['id_cleaning']) ? strval($_GET['id_cleaning']) : 0;

$get_cleaning = "SELECT id_cleaning, nama_cleaning, harga_cleaning, deskripsi_cleaning FROM cleaning WHERE id_cleaning='$id'";
$result = mysqli_query($con,$get_cleaning);
$response = array();
while ($hasil = mysqli_fetch_array($result)) {
	$response[] = $hasil;
}
echo json_encode($response);
?>