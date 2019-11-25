<?php
if($_SESSION['giaovien']){
	include_once('views/giaovien/headergiaovien.php');
	
	?>
	<div class="main-panel formupdate">
		<div class="content-wrapper">
			<div class="row">
				<!-- add data -->
				<div class="col-md-12 d-flex align-items-stretch grid-margin">
	              <div class="row flex-grow">
	                <div class="col-12" style="width: 100%;">
	                	<!-- form 1 -->
	                	<form class="forms-sample" method="post" id="frmkhoitao" style="display:block;">
	                	<div style="width: 100%;">
	                		<div class="card">
			                    <div class="card-body">
			                      <h4 class="card-title">Khởi tạo bài tập</h4>
			                      <div class="form-group">
			                          <label for="exampleFormControlSelect1">Tên bài tập</label>
			                          <input type="text" id="tenbaitap" name="tenbaitap" class="form-control" placeholder="Nhập tên bài tập" required/>
			                        </div>
			                        <div class="form-group">
			                          <label for="exampleFormControlSelect1">Chọn tên môn học để khởi tạo bài tập</label>
			                          <select style="width: auto;" class="form-control form-control-lg" id="mamon" name="mamon">
			                            <?php
			                                for ($i=0; $i < $count; $i++) { 
			                            ?>
			                            <option value="<?php echo $data[$i]['MAMONHOC'];?>"><?php echo $data[$i]['TENMONHOC'];?></option>
			                            <?php
			                                }
			                            ?>
			                          </select>
			                         </div>
			                          <div class="form-group">
			                          <label for="exampleFormControlSelect1">Thời hạn nộp bài</label>
			                          <input style="width: auto;" type="date" id="thoihan" name="thoihan" class="form-control">
			                          <input type="hidden" name="mabaitapEdit" id="mabaitapEdit">
			                        </div>
			                          <div class="form-group">
			                          <label for="exampleFormControlSelect1">Chọn số câu hỏi bạn muốn tạo</label>
			                          <select style="width: auto;" class="form-control form-control-lg" id="socauhoi" name="socauhoi">
			                          	<option value="5">5</option>
			                            <option value="10">10</option>
			                            <option value="15">15</option>
			                            <option value="20">20</option>
			                            <option value="25">25</option>
			                            <option value="30">30</option>
			                          </select>
			                          <button style="visibility: visible;margin-top: 10px;" type="button" id="khoitaobaitap" name="khoitaobaitap" class="btn btn-success mr-2">Khởi tạo</button>
			                        <button style="visibility: hidden;" type="submit" id="updatebaitap" name="updatebaitap" class="btn btn-success mr-2">UPDATE</button>
			                        </div>
			                        
			                    </div>
			                  </div>
	                	</div>
	                  	
			            </form>
			            <form method="post" style="display: none;">
			            	<input type="hidden" name="mabaitapDel" id="mabaitapDel">
			            	<button style="display: none;" type="submit" id="deleteBaiTap" name="deleteBaiTap" class="btn btn-success mr-2">DELETE</button>
			            </form>
			            <!-- End form 1 -->
			            <?php
			            	if (isset($_POST['updatebaitap'])) {
			            		$mamonhoc = $_POST['mamon'];
			            		$tenbaitap = $_POST['tenbaitap'];
			            		$mabaitap = $_POST['mabaitapEdit'];
			            		$thoigian = $_POST['thoihan'];
			            		$socau = $_POST['socauhoi'];
			            		if($db->EditDataTablebaitap($mabaitap,$mamonhoc,$thoigian,$socau,$tenbaitap) == true){
			            			echo "<script>alert('UpDate thành công!');</script>";
			            		}
			            		else{
			            			echo "<script>alert('UpDate không thành công!');</script>";
			            		}
			            	}
			            	// xóa bài giảng
			            	if (isset($_POST['deleteBaiTap'])) {
			            		$mabaitap = $_POST['mabaitapDel'];
			            		//echo "<script>alert('Bạn có chắc muốn xóa k?');</script>";
			            		if ($db->DeleteDataTableChiTietBaitap($mabaitap) == true) {
			            			if ($db->DeleteDataTableketquakiemtra($mabaitap) == true) {
				            			if($db->DeleteDataTableBaitap($mabaitap) == true){
				            			echo "<script>alert('Delete thành công!');</script>";
					            		}
					            		else{
					            			echo "<script>alert('Delete không thành công!');</script>";
					            		}
				            		}
			            		}
			            	}
			            ?>
			            <!-- Form 2 -->
			            <form class="forms-sample" method="post" style="display:none;" id="frmcauhoi">
			            	<input type="hidden" name="getsocau" id="getsocau">
			            	<input type="hidden" name="getmamon" id="getmamon">
			            	<input type="hidden" name="getthoihan" id="getthoihan">
			            	<input type="hidden" name="gettenbaitap" id="gettenbaitap">
			            	<div style="width: 100%;">
	                			<div class="card">
			                    	<div class="card-body">
			                    		<button style="visibility: visible;margin-bottom: 5px;" type="button" id="quaylai" name="quaylai" class="btn btn-success mr-2">Quay lại khởi tạo</button>
			                      		<h4 class="card-title">Thêm các câu hỏi cho bài tập</h4>
			                      		<p id="ptenbaitap"></p>
			                      		<p id="psocau"></p>
			                      		<p id="pmonhoc"></p>
			                      		<p id="pthoihan"></p>
							            	<table id="tableBaiGiang">
							            		<thead>
							            			<tr>
							            				<th style="width: 70px;">Số câu</th>
							            				<th style="width: 500px;">Tên câu hỏi</th>
							            				<th>Đáp án A</th>
							            				<th>Đáp án B</th>
							            				<th>Đáp án C</th>
							            				<th>Đáp án D</th>
							            				<th>Đáp án Đúng</th>
							            			</tr>
							            		</thead>
							            		<tbody id="addTrCauHoi">
							            			
							            		</tbody>
							            	</table>
							            	<button style="visibility: visible;margin-top: 5px;" type="submit" id="taobocauhoi" name="taobocauhoi" class="btn btn-success mr-2">Tạo bộ câu hỏi</button>
							            </div>
							        </div>  
							     </div>     
			            </form>
			            <?php
			            	if (isset($_POST['taobocauhoi'])) {
			            		// xu ly ma bai tap
			            		$DataAllma = $db->GetAllMaBaiTap();
				            	$DataAllma1 = array();
				            	foreach ($DataAllma as $key => $value) {
				            		$DataAllma1[] = explode("BT", $value['MABAITAP']);
				            	}
				            	$max = $DataAllma1[0][1];
				            	for($i = 0;$i < count($DataAllma1);$i++){
				            		if ($DataAllma1[$i][1] > $max) {
				            			$max = $DataAllma1[$i][1];
				            		}
				            	}
				            	$stt = $max+1;
				            	if ($stt < 10) {
				            		$mbt = "BT00".$stt;
				            	}
				            	elseif($stt > 10 && $stt < 100){
				            		$mbt = "BT0".$stt;
				            	}
				            	else{
				            		$mbt = "BT".$stt;
				            	}
				            	// xu ly xong
				            	// data
				            	$mamonhoc = $_POST['getmamon'];
				            	$magiaovien = $_SESSION['giaovien'];
				            	$hannop = $_POST['getthoihan'];
				            	$socau = $_POST['getsocau'];
				            	$tenbt = $_POST['gettenbaitap'];
				            	// add data to table baitap
				            	if ($db->AddDataToTablebaitap($mbt,$mamonhoc,$magiaovien,'',$hannop,$socau,$tenbt) == true) {
				            		echo "<script>alert('Thêm thành công!');</script>";
				            	}
				            	// end data
				            	$tencau = array();
				            	$tencauhoi = array();
				            	$dapana = array();
				            	$dapanb = array();
				            	$dapanc = array();
				            	$dapand = array();
				            	$dapandung = array();
				            	for ($i=1; $i <= $socau; $i++) { 
				            		$tencau[] = "Câu ".$i;
				            		$tencauhoi[] = $_POST['tencauhoi'.$i];
				            		$dapana[] = $_POST['dapana'.$i];
				            		$dapanb[] = $_POST['dapanb'.$i];
				            		$dapanc[] = $_POST['dapanc'.$i];
				            		$dapand[] = $_POST['dapand'.$i];
				            		$dapandung[] = $_POST['dapandung'.$i];
				            	}
				            	for ($i=0; $i < $socau; $i++) { 
				            		$db->AddDataToTablechitietbaitap($mbt,$tencau[$i],$tencauhoi[$i],$dapana[$i],$dapanb[$i],$dapanc[$i],$dapand[$i],$dapandung[$i]);
				            	}
				            	// add vào bảng kq
				            	$allsv = $db->GetAllSV();
				        		for ($i=0; $i < count($allsv); $i++) { 
				        			$db->AddDataToTableketquakiemtra($allsv[$i]['MASV'],$mbt,$mamonhoc,'0','');
				        		}
			            	}
			            ?>
			            <!-- End Form 2 -->
	                </div>


	                
	              </div>
	            </div>
	            <!-- End add data -->
	            <!-- Seen and Edit -->
	            <div class="col-md-12 d-flex align-items-stretch grid-margin">
	              <div class="row flex-grow">
	                <div class="col-12">
	                  <div class="card">
	                    <div class="card-body">
	                      <h4 class="card-title">Các bài tập đã khởi tạo</h4>
	                      <!-- <form method="post"> -->
	                      	<table class="table-bordered" id="tableBaiTap">
				                <thead>
				                    <tr>
				                        <th id="thtenbaitap">Tên Bài Tập</th>
				                        <th id="thmonhoc">Môn Học</th>
				                        <th id="thsoluongcau">Số Lượng Câu Hỏi</th>
				                        <th id="thhannopbai">Hạn nộp</th>
				                        <th style="display: none;">Mã Bài Tập</th>
				                        <th style="display: none;">Mã Môn Học</th>
				                        <th style="display: none;">Hạn Nộp</th>
				                        <th>Sửa</th>
				                        <th>Xóa</th>
				                    </tr>
				                </thead>
				                <tbody>
				                	<?php
				                		$DataByMaGV = $db->GetAllBaitapByMAGV($_SESSION['giaovien']);
				                		//var_dump($DataByMaGV);die;
				                		if ($DataByMaGV != null) {
				                		
				                		for($i=0;$i<count($DataByMaGV);$i++){
				                			$tbt = $DataByMaGV[$i]['TENBAITAP'];
				                			$mamh = $DataByMaGV[$i]['MAMONHOC'];
				                			$soluongcau = $DataByMaGV[$i]['SOCAU'];
				                			$ngaynop = $DataByMaGV[$i]['HANNOP'];
				                			$ngaynopformat = date("d-m-Y", strtotime($ngaynop));
				                			$datatenmh = $db->GetNameMonHoc($mamh);
				                			$tenmh = $datatenmh['TENMONHOC'];
				                	?>
				                    <tr>
				                        <td><?php echo $tbt;?></td>
				                        <td><?php echo $tenmh;?></td>
				                        <td><?php echo $soluongcau;?></td>
				                        <td><?php echo $ngaynopformat;?></td>
				                        <td style="display: none;"><?php echo $DataByMaGV[$i]['MABAITAP'];?></td>
				                        <td style="display: none;"><?php echo $DataByMaGV[$i]['MAMONHOC'];?></td>
				                        <td style="display: none;"><?php echo $DataByMaGV[$i]['HANNOP'];?></td>
				                        <td id="EditRow">
				                        	<input type="hidden" name="<?php echo $DataByMaGV[$i]['MABAITAP'];?>" value="<?php echo $DataByMaGV[$i]['MABAITAP'];?>">
				                            <button type="button" class="edit" title="Edit" id="EditBG"  style="border:none;background: none;color: #FFC107;"><i class="material-icons">&#xE254;</i>
				                            </button>
				                        </td>
				                        <td id="DeleteRow">
				                            <button class="delete" title="Delete" type="button" name="DeleteBaiTap" style="border:none;background: none;color: red;"><i class="material-icons">&#xE872;</i></button>
				                        </td>
				                    </tr>
				                    
				                    <?php
				                    	}
				                    	}
				                    ?>    
				                </tbody>
				            </table>
	                       <!-- </form> -->
	                       
	                    </div>
	                  </div>
	                </div>
	                
	              </div>
	            </div>
	            <!-- End Seen and Edit -->
			</div>
		</div>
		<!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019. Edit By TCU-Learning.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Nguyễn Công Minh
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
	</div>
<!-- </div> -->
		<!-- page-body-wrapper ends -->
	<!-- </div> -->
	<!-- scrip nhan tin -->
	
<!-- end script nhan tin -->
<?php
if (isset($_POST['signout'])) {
		unset($_SESSION['giaovien']);
		unset($_SESSION['tengiaovien']);
		header("location:index.php?controller=user&action=login");
	}
}

else{
	header("location:index.php?controller=user&action=login");
}
?>