<?php
if($_SESSION['sinhvien']){
	include_once('views/sinhvien/headersinhvien.php');
	?>
	<div class="main-panel formupdate">
		<div class="content-wrapper">
			<div class="row">
				<!-- add data -->
				<div class="col-md-12 d-flex align-items-stretch grid-margin">
	              <div class="row flex-grow">
	                <div class="col-12" style="width: 100%;">
	                	<form class="forms-sample" method="post">
	                	<div style="float: left;width: 50%;">
	                		<div class="card">
			                    <div class="card-body">
			                      <h4 class="card-title">UPLOAD, UPDATE bài giảng</h4>
			                        <div class="form-group">
			                          <label for="exampleFormControlSelect1">Chọn tên môn học bạn giảng dạy</label>
			                          <select class="form-control form-control-lg" id="mamonsv" name="mamon">
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
			                          <label for="exampleFormControlSelect1">Chọn loại bài giảng bạn UPLOAD</label>
			                          <select class="form-control form-control-lg" id="maloaisv" name="maloai">
			                            <?php
			                                for ($i=0; $i < $count_LBG; $i++) { 
			                            ?>
			                            <option value="<?php echo $data_LBG[$i]['MALOAIBG'];?>"><?php echo $data_LBG[$i]['TENLOAIBG'];?></option>
			                            <?php
			                                }
			                            ?>
			                          </select>
			                        </div>
			                    </div>
			                  </div>
	                	</div>
	                  	<div style="float: right;width: 50%;">
	                		<div class="card">
			                    <div class="card-body">
			                      <h4 class="card-title"></h4>
			                        <div class="form-group">
			                          <label for="exampleFormControlSelect1">Nhập liên kết của bài học 
			                          	<br>Nếu là Word,PDF,PowerPoint thì nhập link Drive 
			                          	<br>Nếu là Video thì nhập link Youtube</label>
			                          <input type="text" class="form-control" id="lienketsv" name="lienket" placeholder="Nhập liên kết bài học" required/>
			                        </div>
			                        <div class="form-group">
			                          <label for="exampleFormControlSelect1">Đặt tên bài học</label>
			                          <input type="hidden" name="mabaihocEdit" id="mabaihocEditsv">
			                          <input type="text" class="form-control" id="tenbaihocsv" name="tenbaihoc" placeholder="Nhập tên bài học" required/>
			                        </div>
			                        <button style="visibility: visible;" type="submit" id="uploadbaigiangsv" name="uploadbaigiang" class="btn btn-success mr-2">Thêm mới</button>
			                        <button style="visibility: hidden;" type="submit" id="updatebaigiangsv" name="updatebaigiangsv" class="btn btn-success mr-2">Sửa</button>
			                    </div>
			                  </div>
	                	</div>
			            </form>
			            <form method="post" style="display: none;">
			            	<input type="hidden" name="mabaihocDel" id="mabaihocDel">
			            	<button style="display: none;" type="submit" id="deletebaigiang" name="deletebaigiang" class="btn btn-success mr-2">DELETE</button>
			            </form>
			            <?php
			            	$DataAllma = $db->GetAllMaBaiHoc();
			            	$DataAllma1 = array();
			            	foreach ($DataAllma as $key => $value) {
			            		$DataAllma1[] = explode("BH", $value['MABAIHOC']);
			            	}
			            	$max = $DataAllma1[0][1];
			            	for($i = 0;$i < count($DataAllma1);$i++){
			            		if ($DataAllma1[$i][1] > $max) {
			            			$max = $DataAllma1[$i][1];
			            		}
			            	}
			            	$stt = $max+1;
			            	if ($stt < 10) {
			            		$mbh = "BH0".$stt;
			            	}
			            	else{
			            		$mbh = "BH".$stt;
			            	}	
			            	// thêm bài giảng
			            	if (isset($_POST['uploadbaigiang'])) {
			            		$mamonhoc = $_POST['mamon'];
			            		$malbg = $_POST['maloai'];
			            		$mabaihoc = $mbh;
			            		$tenbaihoc = $_POST['tenbaihoc'];
			            		$lienket = $_POST['lienket'];
			            		$nguoidang = $_SESSION['tensinhvien'];
			            		if($db->AddDataToTableBaiHocSV($mamonhoc,$malbg,$mabaihoc,$tenbaihoc,'',$lienket,$nguoidang) == true){
			            			echo "<script>alert('UpLoad thành công!');</script>";
			            		}
			            		else{
			            			echo "<script>alert('UpLoad không thành công!');</script>";
			            		}
			            	}
			            	// Update bài giảng
			            	if (isset($_POST['updatebaigiangsv'])) {
			            		$mamonhoc = $_POST['mamon'];
			            		$malbg = $_POST['maloai'];
			            		$mabaihoc = $_POST['mabaihocEdit'];
			            		$tenbaihoc = $_POST['tenbaihoc'];
			            		$lienket = $_POST['lienket'];
			            		if($db->UpdateDataTableBaiHocSV($mamonhoc,$malbg,$mabaihoc,$tenbaihoc,$lienket) == true){
			            			echo "<script>alert('Cập nhật thành công!');</script>";
			            		}
			            		else{
			            			echo "<script>alert('UpDate không thành công!');</script>";
			            		}
			            	}
			            	// xóa bài giảng
			            	if (isset($_POST['deletebaigiang'])) {
			            		$mabaihoc = $_POST['mabaihocDel'];
			            		//echo "<script>alert('Bạn có chắc muốn xóa k?');</script>";
			            		if($db->DeleteDataTableBaiHocSV($mabaihoc) == true){
			            			echo "<script>alert('Xóa thành công!');</script>";
			            		}
			            		else{
			            			echo "<script>alert('Xóa không thành công!');</script>";
			            		}
			            	}
			            ?>
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
	                      <h4 class="card-title">Các bài giảng đã UpLoad</h4>
	                      <!-- <form method="post"> -->
	                      	<table class="table-bordered" id="tableBaiGiangSV" style="width: 100%">
				                <thead>
				                    <tr>
				                        <th id="thtenbaihoc">Tên Bài Học</th>
				                        <th>Loại Bài Giảng</th>
				                        <th>Môn Học</th>
				                        <th style="display: none;">Mã Bài Giảng</th>
				                        <th style="display: none;">Link</th>
				                        <th style="display: none;">Mã môn</th>
				                        <th style="display: none;">Mã Loại</th>
				                        <th style="text-align: center;">Sửa</th>
				                        <th style="text-align: center;">Xóa</th>
				                    </tr>
				                </thead>
				                <tbody>
				                	<?php
				                		$DataByNameSV = $db->GetAllBaiHocByTenSV($_SESSION['tensinhvien']);
				                		if ($DataByNameSV != null) {
				                		for($i=0;$i<count($DataByNameSV);$i++){
				                			$tbh = $DataByNameSV[$i]['TENBAIHOC'];
				                			$malbg = $DataByNameSV[$i]['MALOAIBG'];
				                			$dataten = $db->GetNameMaLBG($malbg);
				                			$tenlbg = $dataten['TENLOAIBG'];
				                			$mamh = $DataByNameSV[$i]['MAMONHOC'];
				                			$datatenmh = $db->GetNameMonHoc($mamh);
				                			$tenmh = $datatenmh['TENMONHOC'];
				                			$link = $DataByNameSV[$i]['LIENKETTAILIEU'];
				                	?>
				                    <tr>
				                        <td><?php echo $tbh;?></td>
				                        <td><?php echo $tenlbg;?></td>
				                        <td><?php echo $tenmh;?></td>
				                        <td style="display: none;"><?php echo $DataByNameSV[$i]['MABAIHOC'];?></td>
				                        <td style="display: none;"><?php echo $link;?></td>
				                        <td style="display: none;"><?php echo $mamh;?></td>
				                        <td style="display: none;"><?php echo $malbg;?></td>
				                        <td id="EditRow" style="text-align: center;">
				                        	<input type="hidden" name="<?php echo $DataByNameSV[$i]['MABAIHOC'];?>" value="<?php echo $DataByNameSV[$i]['MABAIHOC'];?>">
				                            <button type="button" class="edit" title="Edit" id="EditBG"  style="border:none;background: none;color: #FFC107;"><i class="material-icons">&#xE254;</i>
				                            </button>
				                        </td>
				                        <td id="DeleteRow" style="text-align: center;">
				                        	<input type="hidden" name="<?php echo $DataByNameSV[$i]['MABAIHOC'];?>" value="<?php echo $DataByNameSV[$i]['MABAIHOC'];?>">
				                            <button class="delete" title="Delete" type="button" name="DeleteBaiGiang" style="border:none;background: none;color: red;"><i class="material-icons">&#xE872;</i></button>
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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
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
		unset($_SESSION['sinhvien']);
		unset($_SESSION['tensinhvien']);
		header("location:index.php?controller=user&action=login");
	}
}

else{
	header("location:index.php?controller=user&action=login");
}
?>