<?php
	require_once dirname(dirname(__FILE__)) . './model/m_tampilan.php';
	$mTampilan = new m_tampilan;
	// $response = array("error" => FALSE);
	
	if (isset($_POST['submit_btn'])){
		$field_values_array = $_POST['field_name'];
		// print_r($field_values_array);
		// foreach($field_values_array as $value){
			// $dekat = "";
			// $dekat = $dekat . $value . ", ";
		// }
		$dekat = implode(", ", $field_values_array);
		
		// $wisata = $mTampilan->submit($_POST['lokasi'], $_POST['lat'], $_POST['longt'], $_POST['unggah'], $_POST['dekat']);
		// $wisata = $mTampilan->submit($_POST['lokasi'], $_POST['lat'], $_POST['longt'], $_FILES['unggah'], $_POST['dekat']);
		// $wisata = $mTampilan->submit($_POST['lokasi'], $_POST['lat'], $_POST['longt'], $_FILES['unggah']['tmp_name'], $_POST['dekat']);
		$wisata = $mTampilan->submit($_POST['lokasi'], $_POST['lat'], $_POST['longt'], $_FILES['unggah']['tmp_name'], $dekat);
		// $wisata = $mTampilan->submit($_POST['lokasi'], $_POST['lat'], $_POST['longt'], $_FILES['unggah']['tmp_name'], $field_values_array);
		// $wisata = $mTampilan->submit($_POST['lokasi'], $_POST['lat'], $_POST['longt'], file_get_contents($_FILES['unggah']), $_POST['dekat']);
		
		if($wisata){
			// echo "Saved <br><br><a href='../controller/c_tampilan.php'>kembali</a>";
			// $response["error"] = FALSE;
			// $response["wisata"]["lokasi"] = $wisata["lokasi"];
			// $response["wisata"]["latitude"] = $wisata["latitude"];
			// $response["wisata"]["longitde"] = $wisata["longitude"];
			// $response["wisata"]["unggah"] = $wisata["unggah"];
			// $response["wisata"]["dekat"] = $wisata["dekat"];
			
			$response["lokasi"] = $wisata["lokasi"];
			$response["latitude"] = $wisata["latitude"];
			$response["longitude"] = $wisata["longitude"];
			// $response["unggah"] = $wisata["unggah"];
			$response["dekat"] = $wisata["dekat"];
			echo json_encode($response);
			echo "<br><br><a href='../controller/c_tampilan.php'>kembali</a>";
		} else{
			echo "Failed <br><br><a href='../controller/c_tampilan.php'>kembali</a><br><br> "." | ".$_POST['lokasi']." | ".$_POST['lat']." | ".$_POST['longt']." | ".$_POST['dekat']." | ";
		}
	}
?>