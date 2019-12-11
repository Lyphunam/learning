<?php
	if($_SESSION['sinhvien']){
		if (isset($_POST['signout'])) {
			unset($_SESSION['sinhvien']);
			unset($_SESSION['tensinhvien']);
      unset($_SESSION['timmamonsv']);
      unset($_SESSION['timmaloaisv']);
			header("location:index.php?controller=user&action=login");
		}
    include_once('views/sinhvien/headersinhvien.php');
?>
	
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-5 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Chọn tên môn và loại bài giảng</h4>
                      
                      <form class="forms-sample" method="post">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Tên Môn Học</label>
                          <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="mamon">
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
                          <label for="exampleFormControlSelect1">Loại Bài Giảng</label>
                          <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="maloai">
                            <?php
                                for ($i=0; $i < $count_LBG; $i++) { 
                            ?>
                            <option value="<?php echo $data_LBG[$i]['MALOAIBG'];?>"><?php echo $data_LBG[$i]['TENLOAIBG'];?></option>
                            <?php
                                }
                            ?>
                          </select>
                        </div>
                        <button type="submit" name="timbaihoc" class="btn btn-success mr-2">Tìm bài học</button>
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Kết quả tìm kiếm bài giảng</h4>
                  <p class="card-description">
                    <?php
                    if (isset($_POST['timbaihoc'])) {
                      $_SESSION['timmamonsv'] = $_POST['mamon'];
                      $_SESSION['timmaloaisv'] = $_POST['maloai'];
                    }
                    ?>
                    Danh sách bài giảng tìm kiếm được
                  </p>
                  <?php 
                      if (isset($_SESSION['timmamonsv']) && isset($_SESSION['timmaloaisv'])) {
                        $data_les = $db->get_list_lesson($_SESSION['timmamonsv'],$_SESSION['timmaloaisv']);
                  ?>
                  <form method="post">
                  <div class="form-group">
                    <input type="hidden" id="mamonhidden" name="mamonhidden" value="<?php echo $_SESSION['timmamonsv'];?>">
                    <input type="hidden" id="maloaihidden" name="maloaihidden" value="<?php echo $_SESSION['timmaloaisv'];?>">
                    <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="baihoc">
                      <?php
                      for ($i=0; $i < count($data_les); $i++) { 
                        ?>
                        <option value="<?php echo $data_les[$i]['MABAIHOC'];?>"><?php echo $data_les[$i]['TENBAIHOC'];?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <button type="submit" name="xembaihoc" class="btn btn-success">Xem bài học</button>
                  </form>
                  <?php
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="col-md-12 d-flex align-items-stretch">
              <div class="row flex-grow">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Nội dung bài giảng</h4>
                      <?php
                          if (isset($_POST['xembaihoc'])) {
                            if (!empty($_POST['baihoc'])) {
                            $mamonhidden = $_POST['mamonhidden'];
                            $maloaihidden = $_POST['maloaihidden'];
                            $mabaihoc = $_POST['baihoc'];
                            $data_content_sub = $db->getcontentSub($mamonhidden,$maloaihidden,$mabaihoc);
                            $tenbai = $data_content_sub['TENBAIHOC'];
                            $link = $data_content_sub['LIENKETTAILIEU'];
                            $name_teacher = $data_content_sub['NGUOIDANG'];
                            $data_sb = $db->getSubjectID($mamonhidden);

                            $name_sub = $data_sb['TENMONHOC'];
                      ?>
                      <p class="card-description">
                        Tên Môn Học: <?php echo $name_sub;?>
                      </p>
                      <p class="card-description">
                        Tên Bài Học: <?php echo $tenbai;?>
                      </p>
                      <p class="card-description">
                        Nguồn: <?php echo $name_teacher;?>
                      </p>
                      <?php
                        if ($maloaihidden != 'MP4') {
                      ?>
                          <iframe src="<?php $Fun_XBG->getLink($link);?>" width="100%" height="500px"></iframe>
                      <?php
                          }
                          else{
                            echo $Fun_XBG->convertYoutube($link);
                          }
                        }
                          else{
                            echo'<p class="card-description"><b>Không có bài học nào!</b></p>';
                          }
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
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
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
<?php
	}
	else{
		header("location:index.php?controller=user&action=login");
	}
?>