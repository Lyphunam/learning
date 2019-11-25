<?php
	class DBlogin{
		private $username = "root";
		private $hostname = "localhost";
		private $password = "";
		private $dbname = "tculearning";
		private $conn = NULL;
		private $result = NULL;

		//ket noi den co so du lieu

		public function connect_DB(){
			$this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
			if(!$this->conn){
				echo "Không thể kết nối đến cơ sở dữ liệu";
				exit();
			}
			else{
				mysqli_set_charset($this->conn, 'utf8');
			}
			return $this->conn;
		}
		// thuc thi cau lenh truy van

		public function query_DB($sql){
			$this->result = $this->conn->query($sql);
			return $this->result;
		}
		public function get_Data_SV($tk,$mk){
			$sql = "SELECT * FROM sinhvien where MASV = '$tk' and MATKHAU = '$mk'";
			$this->query_DB($sql);
			if($this->result){
				$num = mysqli_num_rows($this->result);
			}
			else{
				$num = 0;
			}
			return $num;
		}
		public function get_Data_GV($tk,$mk){
			$sql = "SELECT * FROM giaovien where MAGIAOVIEN = '$tk' and MATKHAU = '$mk'";
			$this->query_DB($sql);
			if($this->result){
				$num = mysqli_num_rows($this->result);
			}
			else{
				$num = 0;
			}
			return $num;
		}

		public function getInFoSV($table, $id){
			$sql = "SELECT *  FROM $table WHERE MASV='$id'";
			$this->query_DB($sql);
			if($this->num_rows() != 0){
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}
		public function getInFoGV($table, $id){
			$sql = "SELECT *  FROM $table WHERE MAGIAOVIEN='$id'";
			$this->query_DB($sql);
			if($this->num_rows() != 0){
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}
		public function num_rows(){
			if($this->result){
				$num = mysqli_num_rows($this->result);
			}
			else{
				$num = 0;
			}
			return $num;
		}
	}
?>