<?php
	if($_SESSION['sinhvien']){
		if (isset($_POST['signout'])) {
			unset($_SESSION['sinhvien']);
			unset($_SESSION['tensinhvien']);
			header("location:index.php?controller=user&action=login");
		}
		if ($_SESSION['mabaitap']) {
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
	                    			$dataByMabt = $db->GetInfobaitapByMAbt($_SESSION['mabaitap']);
	                    			$namemonhoc = $db->GetNameMonHoc($dataByMabt['MAMONHOC']);
	                    			$datachitiet = $db->GetDataChiTietBaiTap($_SESSION['mabaitap']);
	                    			//var_dump($datachitiet);
	                    		?>
	                    	<h4 class="card-title" style="text-align: center;">Tên bài kiểm tra: <?php echo $dataByMabt['TENBAITAP'];?></h4>
	                    	<h4 class="card-title" style="text-align: center;">Môn học: <?php echo $namemonhoc['TENMONHOC'];?></h4>
	                    	<div id="page-wrap">
								<form method="post" id="quiz">
								
						            <ol>
						            <?php
						            	for ($i=0; $i < count($datachitiet); $i++) { 
						            		$stt = $i + 1;
						            		$cauhoi = $datachitiet[$i]['TENCAUHOI'];
						            		$daa = $datachitiet[$i]['DAPANA'];
						            		$dab = $datachitiet[$i]['DAPANB'];
						            		$dac = $datachitiet[$i]['DAPANC'];
						            		$dad = $datachitiet[$i]['DAPAND'];
						            ?>
						                <li>
						                
						                    <h3><?php echo $cauhoi;?></h3>
						                    
						                    <div>
						                        <input type="radio" name="<?php echo $stt;?>" id="question-1-answers-A" value="A" />
						                        <label for="question-1-answers-A">A) <?php echo $daa;?> </label>
						                    </div>
						                    
						                    <div>
						                        <input type="radio" name="<?php echo $stt;?>" id="question-1-answers-B" value="B" />
						                        <label for="question-1-answers-B">B) <?php echo $dab;?></label>
						                    </div>
						                    
						                    <div>
						                        <input type="radio" name="<?php echo $stt;?>" id="question-1-answers-C" value="C" />
						                        <label for="question-1-answers-C">C) <?php echo $dac;?>
						                        </label>
						                    </div>
						                    
						                    <div>
						                        <input type="radio" name="<?php echo $stt;?>" id="question-1-answers-D" value="D" />
						                        <label for="question-1-answers-D">D) <?php echo $dad;?>
						                        </label>
						                    </div>
						                
						                </li>
						             <?php
						             	}
						             ?>
						            </ol>
						            
						            <input class="btn btn-warning" type="submit" id="nopbai" name="nopbai" value="Nộp bài" />
								
								</form>
								<?php
									if (isset($_POST['nopbai'])) {
										//echo "<script>alert('received!');</script>";
										$dapandung = array();
    									$dapanchon = array();
    									$socaudung = 0;
    									$socausai = 0;
    									$laydapandung = $db->GetDapAnDung($_SESSION['mabaitap']);
    									for ($i=0; $i < count($laydapandung); $i++) { 
    										$dapandung[] = $laydapandung[$i]['DAPANDUNG'];
    									}
    									for ($i=1; $i <= count($datachitiet); $i++) { 
    										if (isset($_POST[$i])) {
										        $dapanchon[$i] = $_POST[$i];
										    }
										    else{
										     $dapanchon[$i] = "";
      										}
    									}
    									for ($i=1; $i <= count($datachitiet); $i++) { 
    										if ($dapanchon[$i] == $dapandung[$i-1]) {
										        $socaudung++;
										    }
										    else{
										        $socausai++;
										    }
    									}
    									$tongsocau = count($datachitiet);
    									if (($socaudung / $tongsocau) >= 0.6) {
    										$ketqua = "D";
    									}
    									else{
    										$ketqua = "KD";
    									}
    									if ($db->EditDataKetQuaWhenKtraXong($_SESSION['sinhvien'],$_SESSION['mabaitap'],$ketqua) == true) {
    										unset($_SESSION['mabaitap']);
    										header("location:index.php?controller=user&action=lambaitap");
    									}
									}
								?>
							</div>
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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019. Edit By TCU-Learning.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Nguyễn Công Minh
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
	</div>
<?php
		}
		else{
			header("location:index.php?controller=user&action=lambaitap");
		}
	}
	else{
		header("location:index.php?controller=user&action=login");
	}
?>