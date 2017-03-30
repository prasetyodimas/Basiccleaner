<?php include '../config/koneksi.php';
$id = isset($_GET['id_reglue']) ? strval($_GET['id_reglue']) : 0;

$get_reglue = "SELECT * FROM reglue WHERE id_reglue='$id'";
$result = mysqli_query($con,$get_reglue);
$response = array();
while ($hasil = mysqli_fetch_array($result)) {
	$response[] = $hasil;
}
echo json_encode($response);
?>
