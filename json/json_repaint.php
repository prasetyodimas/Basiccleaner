<?php include '../config/koneksi.php';
$id = isset($_GET['id_repaint']) ? strval($_GET['id_repaint']) : 0;

$get_repaint = "SELECT * FROM repaint WHERE id_repaint='$id'";
$result = mysqli_query($con,$get_repaint);
$response = array();
while ($hasil = mysqli_fetch_array($result)) {
	$response[] = $hasil;
}
echo json_encode($response);
?>