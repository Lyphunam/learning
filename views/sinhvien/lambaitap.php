<?php
	if($_SESSION['sinhvien']){
		if (isset($_POST['signout'])) {
			unset($_SESSION['sinhvien']);
			unset($_SESSION['tensinhvien']);
			header("location:index.php?controller=user&action=login");
		}
    include_once('views/sinhvien/headersinhvien.php');
?>
	<div class="main-panel">
	    <div class="content-wrapper">
	        <div class="row">
	        	<!-- select  -->
	        	<div class="col-md-12 d-flex align-items-stretch grid-margin">
	              <div class="row flex-grow">
	                <div class="col-12">
	                  <div class="card">
	                    <div class="card-body">
	                    	<?php
	                    		$datachualam = $db->GetBaiTapChuaLam($_SESSION['sinhvien']);
	                    		$datadalam = $db->GetBaiTapDaLam($_SESSION['sinhvien']);
	                    	?>
	                      <h4 class="card-title">Chọn một bài tập chưa làm để hoàn thành</h4>
	                      <form class="forms-sample" method="post">
	                        <div class="form-group">
	                          <label for="exampleFormControlSelect1">Bài tập chưa làm</label>
	                          <select class="form-control form-control-lg" id="baitapchualam" name="baitapchualam">
	                            <?php
	                            	if ($datachualam != null) {
	                            	
	                                for ($i=0; $i < count($datachualam); $i++) { 
	                                	$getnamebaitap = $db->GetNameBaiTapByMaBaiTap($datachualam[$i]['MABAITAP']);
	                                	$ngaynop = $db->GethannopQuabaitapvakiemtra($datachualam[$i]['MABAITAP']);
	                                	$layngaynop = $ngaynop['HANNOP'];
				                		$ngaynopformat = date("d-m-Y", strtotime($layngaynop));
	                            ?>
	                            <option value="<?php echo $datachualam[$i]['MABAITAP'];?>"><?php echo $getnamebaitap['TENBAITAP'];?>&ensp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thời hạn nộp bài: 24h <?php echo $ngaynopformat;?></option>
	                            <?php
	                                }
	                                }
	                            ?>
	                          </select>
	                        </div>
	                        <div class="form-group">
	                          <label for="exampleFormControlSelect1">Bài tập đã làm</label>
	                          <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="baitapdalam">
	                            <?php
	                            	if ($datadalam != null) {
	                            	
	                                for ($i=0; $i < count($datadalam); $i++) { 
	                                	$getnamebaitap = $db->GetNameBaiTapByMaBaiTap($datadalam[$i]['MABAITAP']);
	                            ?>
	                            <option value="<?php echo $datadalam[$i]['MABAITAP'];?>"><?php echo $getnamebaitap['TENBAITAP'];?></option>
	                            <?php
	                                }
	                                }
	                            ?>
	                          </select>
	                        </div>
	                        <button type="submit" name="chonbaitap" class="btn btn-success mr-2">Làm bài</button>
	                      </form>
	                      <?php
	                      		if (isset($_POST['chonbaitap'])) {
	                      			$_SESSION['mabaitap'] = $_POST['baitapchualam'];
	                      			header("location:index.php?controller=user&action=baikiemtra");
	                      		}
	                      ?>
	                    </div>
	                  </div>
	                </div>
	                
	              </div>
	            </div>
            <!-- end select bo bai tap -->
	        	
	        </div>
	    </div>
	    <!-- content-wrapper ends -->
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
<?php
	}
	else{
		header("location:index.php?controller=user&action=login");
	}
?>