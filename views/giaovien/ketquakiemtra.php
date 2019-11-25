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
	                <div class="col-12">
	                  <div class="card">
	                    <div class="card-body">
	                    	<?php
	                    		$dataAllnameBT = $db->GetAllDataBaitapByMaGV($_SESSION['giaovien']);
	                    		$dataAllclass = $db->GetnameClass();
	                    	?>
	                      <h4 class="card-title">Chọn một bài tập chưa làm để hoàn thành</h4>
	                      <form method="post">
	                      <table id="tableduyet">
						    <thead>
						      <tr>
						        <th id="select-one" class="name-test">
						        	<div class="form-group">
								      <label style="text-align:center;"  for="inputdefault">Tên bài kiểm tra</label>
								      <select style="width: 100%;" class="form-control form-control-lg inputdefault" id="mabaitap" name="mabaitap">
			                            <?php
			                                for ($i=0; $i < count($dataAllnameBT); $i++) { 
			                            ?>
			                            <option value="<?php echo $dataAllnameBT[$i]['MABAITAP'];?>"><?php echo $dataAllnameBT[$i]['TENBAITAP'];?></option>
			                            <?php
			                                }
			                            ?>
			                          </select>
								    </div>
						        </th>
						        <th id="select-one" class="name-class">
						        	<div class="form-group">
								      <label style="text-align:center;"  for="inputdefault">Lớp</label>
								      <select style="width: 100%;" class="form-control form-control-lg inputdefault" id="malop" name="malop">
			                            <?php
			                                for ($i=0; $i < count($dataAllclass); $i++) { 
			                            ?>
			                            <option value="<?php echo $dataAllclass[$i]['MALOP'];?>"><?php echo $dataAllclass[$i]['TENLOP'];?></option>
			                            <?php
			                                }
			                            ?>
			                          </select>
								    </div>
						        </th>
						        <th id="select-one" class="btn-duyet">
						        	<div class="form-group">
								      <label style="text-align:center;"  for="inputdefault"></label>
								      <br>
								      <button type="submit" style="padding: 15px;" name="duyet" class="btn btn-warning">Duyệt</button>
								    </div>
						        </th>
						      </tr>
						    </thead>
						  </table>
	                      </form>
	                      <?php
	                      		if (isset($_POST['duyet'])) {
	                      			$_SESSION['mabaikiemtra'] = $_POST['mabaitap'];
	                      			$_SESSION['malop'] = $_POST['malop'];
	                      		}
	                      ?>
	                    </div>
	                  </div>
	                </div>
	                
	              </div>
	            </div>
	            <!-- End Seen and Edit -->
	            <!-- phan danh sach -->
	            <?php
	            	if (isset($_SESSION['mabaikiemtra']) && isset($_SESSION['malop'])) {
	            		$datalop = $db->GetnameClassBymalop($_SESSION['malop']);
	            		$databaitest = $db->GetInfobaitapByMAbt($_SESSION['mabaikiemtra']);
	            		$list = $db->GetListByMalopandMabaitap($_SESSION['malop'],$_SESSION['mabaikiemtra']);
	            ?>
	            <div class="col-md-12 d-flex align-items-stretch grid-margin">
	              <div class="row flex-grow">
	                <div class="col-12">
	                  <div class="card">
	                    <div class="card-body">
	                      <h4 class="card-title" style="text-align: center;">Danh sách kết quả kiểm tra của lớp <?php echo $datalop['TENLOP'];?></h4>
	                      <h4 class="card-title" style="text-align: center;">Tên bài thi: <?php echo $databaitest['TENBAITAP'];?></h4>
	                      <!-- <form method="post"> -->
	                      	<table class="table-bordered" id="tableKetQua">
				                <thead>
				                    <tr>
				                        <th>Mã Sinh Viên</th>
				                        <th>Tên Sinh Viên</th>
				                        <th>Kết Quả Thi</th>
				                    </tr>
				                </thead>
				                <tbody>
				                	<?php
				                	if ($list != null) {
				                		for ($i=0; $i < count($list); $i++) { 
				                			$ma = $list[$i]['MASV'];
				                			$ten = $list[$i]['TENSV'];
				                			$tt = $list[$i]['TRANGTHAI'];
				                			if ($tt == '0') {
				                				$kq = 'Chưa làm bài tập';
				                			}
				                			else{
				                				if ($list[$i]['KETQUA'] == 'D') {
				                					$kq = 'Đạt';
				                				}
				                				else{
				                					$kq = 'Không đạt';
				                				}
				                			}
				                	?>
				                    <tr>
				                        <td class="tdmasv"><?php echo $ma;?></td>
				                        <td><?php echo $ten;?></td>
				                        <td><?php echo $kq;?></td>
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
	            <?php
	            	}
	            ?>
	            <!-- End phan danh sach -->
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
		unset($_SESSION['mabaikiemtra']);
		unset($_SESSION['malop']);
		header("location:index.php?controller=user&action=login");
	}
}

else{
	header("location:index.php?controller=user&action=login");
}
?>