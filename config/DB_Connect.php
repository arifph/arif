<?php

// $conn = mysql_connect("localhost:8081", "root", "");
// if(!$conn){
	// echo "Error koneksi: " . mysql_error();
// }

// $db_selected = mysql_select_db("ta");
// if(!$db_selected){
	// echo "Tidak bisa select DB: " . mysql_error();
// }

// $server = "localhost:8081";
// $username = "root";
// $password = "";
// $db = "ta";

// $conn = new mysqli($server, $username, $password, $db);

// if($conn->connect_error){
	// echo "Koneksi gagal: " . $conn->connect_error;
// }

class DB_Connect {
    private $conn;
 
    //Menghubungkan ke database
    public function connect() {
        include_once dirname (__FILE__) .  './Config.php';
         
        //Menghubungkan ke database MySQL
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        
		// Mengecek koneksi
		if($this->conn->connect_error){
			die("Koneksi gagal: " . $this->conn->connect_error);
		}
		
        // return
        return $this->conn;
    }
}

?>