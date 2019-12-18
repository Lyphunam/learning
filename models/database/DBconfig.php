<?php
	class Database
	{
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

		// phuong thuc lay du lieu

		public function get_Data(){
			if($this->result){
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}

		// phuong thuc lay tat ca du lieu

		public function getAllData($table){
			$sql = "SELECT * FROM $table";
			$this->query_DB($sql);
			if($this->num_rows() == 0){
				$data[] = NULL;
			}
			else{
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			return $data;
		}
		// lay du lieu thong qua id

		public function getDatabyID($table, $id){
			$sql = "SELECT *  FROM $table WHERE id='$id'";
			$this->query_DB($sql);
			if($this->num_rows() != 0){
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}
		// dem so luong ban ghi

		public function num_rows(){
			if($this->result){
				$num = mysqli_num_rows($this->result);
			}
			else{
				$num = 0;
			}
			return $num;
		}

		// lay tat ca cac mon hoc
		public function get_name_subject(){
			$table = 'monhoc';
			$data = $this->getAllData($table);
			return $data;
		}
		//lay ten loai bani giang
		public function get_name_LBG(){
			$table = 'loaibaigiang';
			$data = $this->getAllData($table);
			return $data;
		}
		// lay ten danh sach bai hoc
		public function get_list_lesson($mamon,$maloai){
			$data = [];
			$sql = "select * from baihoc where MAMONHOC = '$mamon' and MALOAIBG ='$maloai'";
			$this->query_DB($sql);
			while ($datas = $this->get_Data()) {
				$data[] = $datas;
			}
			$sql1 = "select * from baihocsv where MAMONHOC = '$mamon' and MALOAIBG ='$maloai'";
			$this->query_DB($sql1);
			while ($datas = $this->get_Data()) {
				$data[] = $datas;
			}
			return $data;
		}
		// get id theo mon hoc
		public function getSubjectID($mamon){
			$sql = "SELECT *  FROM monhoc WHERE MAMONHOC='$mamon'";
			$this->query_DB($sql);
			if($this->num_rows() != 0){
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}
		// lay noi dung bai giảng
		public function getcontentSub($mamon,$maloai,$mabaihoc){
			$sql = "select * from baihoc where MAMONHOC = '$mamon' and MALOAIBG ='$maloai' and MABAIHOC ='$mabaihoc'";
			$this->query_DB($sql);
			if($this->num_rows() != 0){
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}

		// thay doi mat khau
		public function changePass($masv,$newPass){
			$sql = "update sinhvien set MATKHAU = '$newPass' where MASV = '$masv'";
			$this->conn->query($sql);
			return true;
		}
		public function changePassGV($magv,$newPass){
			$sql = "update giaovien set MATKHAU = '$newPass' where MAGIAOVIEN = '$magv'";
			$this->conn->query($sql);
			return true;
		}
		// lay so luong bai giang word
		public function getNumberWord(){
			$type = 'DOCX';
			$sql = "select * from baihoc where MALOAIBG = '$type'";
			$this->query_DB($sql);
			$number = $this->num_rows();
			return $number;
		}
		// lay so luong bai giang Video
		public function getNumberVideo(){
			$type = 'MP4';
			$sql = "select * from baihoc where MALOAIBG = '$type'";
			$this->query_DB($sql);
			$number = $this->num_rows();
			return $number;
		}
		// lay so luong bang giang PDF
		public function getNumberPDF(){
			$type = 'PDF';
			$sql = "select * from baihoc where MALOAIBG = '$type'";
			$this->query_DB($sql);
			$number = $this->num_rows();
			return $number;
		}
		// lay so luong bai giang PP
		public function getNumberPPTX(){
			$type = 'PPTX';
			$sql = "select * from baihoc where MALOAIBG = '$type'";
			$this->query_DB($sql);
			$number = $this->num_rows();
			return $number;
		}
		// lay thong tin toan bo giao vien
		public function getInfoGV(){
			$table = 'giaovien';
			$data = $this->getAllData($table);
			return $data;
		}
		// lay thong tin toan bo sinh vien
		public function getInfoSV(){
			$table = 'sinhvien';
			$data = $this->getAllData($table);
			return $data;
		}
		// tim kiem ten giao vien
		public function search_gv($name){
			$sql = "select * from giaovien where TENGIAOVIEN LIKE '%$name%'";
			$this->query_DB($sql);
			if($this->num_rows() == 0){
				$data[] = NULL;
			}
			else{
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			return $data;
		}
		// tim kiem ten sinhvien vien
		public function search_sv($name){
			$sql = "select * from sinhvien where TENSV LIKE '%$name%'";
			$this->query_DB($sql);
			if($this->num_rows() == 0){
				$data[] = NULL;
			}
			else{
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			return $data;
		}

		// lay thong tin giao vien tu magv
		public function inFoGVbyID($magv){
			$sql = "select * from giaovien where MAGIAOVIEN = '$magv'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}
		// lay thong tin giao vien tu masv
		public function inFoSVbyID($masv){
			$sql = "select * from sinhvien where MASV = '$masv'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}

		// them du lieu vao bang thong bao tin nhan
		public function AdDataThongBaoTinNhan($ma,$u1,$u2,$t1,$t2){
			$sql = "insert into thongbaotinnhan values('$ma','$u1','$u2','$t1','$t2')";
			$this->query_DB($sql);
		}
		// check user
		public function checkUSER($ma,$u){
			$sql = "select * from thongbaotinnhan where MATINNHAN = '$ma' and USER1 = '$u'";
			$this->query_DB($sql);
			if($this->num_rows() != 0){
				$result = true;
			}
			else{
				$result = false;
			}
			return $result;
		}
		// thay doi trang thai khi nhan tin
		public function changeSTTU1($ma){
			$sql = "update thongbaotinnhan set STT1 = '1' where MATINNHAN = '$ma'";
			$this->query_DB($sql);
		}
		public function changeSTTU2($ma){
			$sql = "update thongbaotinnhan set STT2 = '1' where MATINNHAN = '$ma'";
			$this->query_DB($sql);
		}
		// thay doi trang thai da xem
		public function changeSTTSeenMessU1($ma){
			$sql = "update thongbaotinnhan set STT1 = '0' where MATINNHAN = '$ma'";
			$this->query_DB($sql);
		}
		public function changeSTTSeenMessU2($ma){
			$sql = "update thongbaotinnhan set STT2 = '0' where MATINNHAN = '$ma'";
			$this->query_DB($sql);
		}
		// lay so luong tin nhan chua xem
		public function getCountMessNotSeenU1($u){
			$sql1 = "select * from thongbaotinnhan where USER1 = '$u' and STT2 = '1'";
			$this->query_DB($sql1);
			$count1 = $this->num_rows();
			return $count1;
		}
		public function getCountMessNotSeenU2($u){
			$sql1 = "select * from thongbaotinnhan where USER2 = '$u' and STT1 = '1'";
			$this->query_DB($sql1);
			$count2 = $this->num_rows();
			return $count2;
		}
		// get info user chat
		public function getInFoUserChatU1($u){
			$sql = "select USER1 from thongbaotinnhan where USER2 = '$u' and STT1 = '1'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}
		public function getInFoUserChatU2($u){
			$sql = "select USER2 from thongbaotinnhan where USER1 = '$u' and STT2 = '1'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}
		// get name chat user 1
		public function getNamaChatSV($u){
			$sql = "select TENSV from sinhvien where MASV = '$u'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}
		public function getNamaChatGV($u){
			$sql = "select TENGIAOVIEN from giaovien where MAGIAOVIEN = '$u'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}
		// them du lieu vao bang bai hoc
		public function AddDataToTableBaiHoc($mamonhoc,$malbg,$mabaihoc,$tenbaihoc,$tentailieu,$lienket,$nguoidang){
			$sql = "insert into baihoc values ('$mamonhoc','$malbg','$mabaihoc','$tenbaihoc','$tentailieu','$lienket','$nguoidang')";
			$this->query_DB($sql);
			return true;
		}
		// them du lieu vao bang bai hoc sv
		public function AddDataToTableBaiHocSV($mamonhoc,$malbg,$mabaihoc,$tenbaihoc,$tentailieu,$lienket,$nguoidang){
			$sql = "insert into baihocsv values ('$mamonhoc','$malbg','$mabaihoc','$tenbaihoc','$tentailieu','$lienket','$nguoidang')";
			$this->query_DB($sql);
			return true;
		}
		// Update bài giảng
		public function UpdateDataTableBaiHoc($mamonhoc,$malbg,$mabaihoc,$tenbaihoc,$lienket){
			$sql = "update baihoc set MAMONHOC = '$mamonhoc', MALOAIBG = '$malbg', TENBAIHOC = '$tenbaihoc', LIENKETTAILIEU = '$lienket' where MABAIHOC = '$mabaihoc'";
			$this->query_DB($sql);
			return true;
		}
		// Update bài giảng sv
		public function UpdateDataTableBaiHocSV($mamonhoc,$malbg,$mabaihoc,$tenbaihoc,$lienket){
			$sql = "update baihocsv set MAMONHOC = '$mamonhoc', MALOAIBG = '$malbg', TENBAIHOC = '$tenbaihoc', LIENKETTAILIEU = '$lienket' where MABAIHOC = '$mabaihoc'";
			$this->query_DB($sql);
			return true;
		}
		// Delete bài giảng
		public function DeleteDataTableBaiHoc($mabaihoc){
			$sql = "delete from baihoc where MABAIHOC = '$mabaihoc'";
			$this->query_DB($sql);
			return true;
		}
		// Delete bài giảng SV
		public function DeleteDataTableBaiHocSV($mabaihoc){
			$sql = "delete from baihocsv where MABAIHOC = '$mabaihoc'";
			$this->query_DB($sql);
			return true;
		}
		public function GetAllMaBaiHoc(){
			$sql = "select MABAIHOC from baihoc";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}
		// get all bai học giáo viên upload
		public function GetAllBaiHocByTenGV($name){
			$sql = "select * from baihoc where NGUOIDANG = '$name'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}
		// get all bai học sinh viên upload
		public function GetAllBaiHocByTenSV($name){
			$sql = "select * from baihocsv where NGUOIDANG = '$name'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}
		public function GetNameMaLBG($ma){
			$sql = "select TENLOAIBG from loaibaigiang where MALOAIBG = '$ma'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}
		public function GetNameMonHoc($ma){
			$sql = "select TENMONHOC from monhoc where MAMONHOC = '$ma'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}
		// bai tap
		// add data vào bảng bài tập
		public function AddDataToTablebaitap($mabaitap,$mamonhoc,$magiaovien,$chuthich,$hannop,$socau,$tenbt){
			$sql = "insert into baitap values ('$mabaitap','$mamonhoc','$magiaovien','$chuthich','$hannop','$socau','$tenbt')";
			$this->query_DB($sql);
			return true;
		}
		public function EditDataTablebaitap($mabaitap,$mamonhoc,$hannop,$socau,$tenbt){
			$sql = "update baitap set MAMONHOC = '$mamonhoc', HANNOP = '$hannop', SOCAU = '$socau', TENBAITAP = '$tenbt' where MABAITAP = '$mabaitap'";
			$this->query_DB($sql);
			return true;
		}
		public function DeleteDataTableBaitap($mabaitap){
			$sql = "delete from baitap where MABAITAP = '$mabaitap'";
			$this->query_DB($sql);
			return true;
		}
		public function DeleteDataTableChiTietBaitap($mabaitap){
			$sql = "delete from chitietbaitap where MABAITAP = '$mabaitap'";
			$this->query_DB($sql);
			return true;
		}
		public function DeleteDataTableketquakiemtra($mabaitap){
			$sql = "delete from ketquakiemtra where MABAITAP = '$mabaitap'";
			$this->query_DB($sql);
			return true;
		}
		public function AddDataToTablechitietbaitap($mabaitap,$tencau,$tencauhoi,$a,$b,$c,$d,$dung){
			$sql = "insert into chitietbaitap (MABAITAP, TENCAU, TENCAUHOI, DAPANA, DAPANB, DAPANC, DAPAND, DAPANDUNG) values ('$mabaitap','$tencau','$tencauhoi','$a','$b','$c','$d','$dung')";
			$this->query_DB($sql);
			return true;
		}
		public function GetAllMaBaiTap(){
			$sql = "select MABAITAP from baitap";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}
		public function GetAllBaitapByMAGV($ma){
			$sql = "select * from baitap where MAGIAOVIEN = '$ma'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}
		// làm bài tập
		public function GetDataChiTietBaiTap($mabt){
			$sql = "select * from chitietbaitap where MABAITAP = '$mabt'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}

		public function AddDataToTableketquakiemtra($masv,$mabaitap,$mamonhoc,$trangthai,$ketqua){
			$sql = "insert into ketquakiemtra (MASV,MABAITAP,MAMONHOC,TRANGTHAI,KETQUA) values ('$masv','$mabaitap','$mamonhoc','0','')";
			$this->query_DB($sql);
			return true;
		}
		public function GetAllSV(){
			$sql = "select MASV from sinhvien";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}
		// get bai tap chua lam va da lam
		public function GetBaiTapChuaLam($masv){
			$sql = "select * from ketquakiemtra where MASV = '$masv' and TRANGTHAI = '0'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}
		public function GetBaiTapDaLam($masv){
			$sql = "select * from ketquakiemtra where MASV = '$masv' and TRANGTHAI = '1'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}
		// get name bai tap by mabaitap
		public function GetNameBaiTapByMaBaiTap($mabaitap){
			$sql = "select TENBAITAP from baitap where MABAITAP = '$mabaitap'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}
		public function GetInfobaitapByMAbt($mabaitap){
			$sql = "select * from baitap where MABAITAP = '$mabaitap'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}

		public function GetDapAnDung($mabaitap){
			$sql = "select DAPANDUNG from chitietbaitap where MABAITAP = '$mabaitap'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}

		public function EditDataKetQuaWhenKtraXong($masv,$mabt,$ketqua){
			$sql = "update ketquakiemtra set TRANGTHAI = '1',KETQUA = '$ketqua' WHERE MASV = '$masv' and MABAITAP = '$mabt'";
			$this->query_DB($sql);
			return true;
		}

		public function GethannopQuabaitapvakiemtra($mabaitap){
			$sql = "select HANNOP from baitap where MABAITAP = '$mabaitap'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}

		public function GetAllDataBaitapByMaGV($maGV){
			$sql = "select * from baitap where MAGIAOVIEN = '$maGV'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}

		public function GetnameClass(){
			$sql = "select * from lop";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}

		public function GetnameClassBymalop($malop){
			$sql = "select * from lop where MALOP = '$malop'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				$data = mysqli_fetch_array($this->result);
			}
			else{
				$data = 0;
			}
			return $data;
		}

		public function GetListByMalopandMabaitap($malop,$mabaitap){
			$sql = "select * from sinhvien INNER JOIN lop INNER JOIN ketquakiemtra ON sinhvien.MALOP = lop.MALOP and sinhvien.MALOP = '$malop' and sinhvien.MASV = ketquakiemtra.MASV and ketquakiemtra.MABAITAP = '$mabaitap'";
			$this->query_DB($sql);
			if ($this->num_rows() != 0) {
				while ($datas = $this->get_Data()) {
					$data[] = $datas;
				}
			}
			else{
				$data = 0;
			}
			return $data;
		}
	}
?>