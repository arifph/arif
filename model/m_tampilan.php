<?php
	// include dirname(dirname(__FILE__)) . '../config/DB_Connect.php';
	// include dirname(dirname(__FILE__)) . '../config/koneksi.php';
	
	class m_tampilan{
	
		// Konstruktor
		function __construct(){
			require_once dirname(dirname (__FILE__)) .  './config/DB_Connect.php';
		
			// connecting to database
			$db = new DB_Connect();
			$this->conn = $db->connect();
		}
		
		// Destruktor
		function __destruct() {
			 
		}
		
		function submit($lokasi, $lat, $longt, $unggah, $dekat){
			$imgData = file_get_contents($unggah);
			$tgl = date("Y-m-d H:i:s");
			
			$stmt = $this->conn->prepare("INSERT INTO bayanaka(lokasi, latitude, longitude, unggah, tgl_unggah, dekat) VALUES(?, ?, ?, ?, ?, ?)");
			// $stmt->bind_param("sssss", $lokasi, $lat, $longt, $unggah, $dekat);
			$stmt->bind_param("ssssss", $lokasi, $lat, $longt, $imgData, $tgl, $dekat);
			
			$result = $stmt->execute();
			$stmt->close();
			
			/** check for successful store **/
			if ($result) {
				$stmt = $this->conn->prepare("SELECT * FROM bayanaka WHERE lokasi = ?");
				$stmt->bind_param("s", $lokasi);
				$stmt->execute();
				$wisata = $stmt->get_result()->fetch_assoc();
				$stmt->close();
	 
				return $wisata;
			} else {
				return false;
			}
		}
		
	}
?>