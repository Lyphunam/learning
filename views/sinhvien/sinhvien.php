<?php
	if($_SESSION['sinhvien']){
    $number_Word = $db->getNumberWord();
    $number_Video = $db->getNumberVideo();
    $number_PDF = $db->getNumberPDF();
    $number_PPTX = $db->getNumberPPTX();
		if (isset($_POST['signout'])) {
			unset($_SESSION['sinhvien']);
			unset($_SESSION['tensinhvien']);
			header("location:index.php?controller=user&action=login");
		}
    include_once('views/sinhvien/headersinhvien.php');
?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body tai-lieu">
                  <div class="clearfix">
                    <div class="float-left">
                      <img src="assets/upload/images/word.png">
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Tài liệu Word</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $number_Word;?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    TCU-Learning chúc bạn học tập tốt!
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <img src="assets/upload/images/video.jpg">
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Tài liệu Video</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $number_Video;?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0"> TCU-Learning chúc bạn học tập tốt!
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <img src="assets/upload/images/pdf.jpg">
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Tài liệu PDF</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $number_PDF;?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0"> TCU-Learning chúc bạn học tập tốt!
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <img src="assets/upload/images/pptx.png">
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Tài liệu PowerPoint</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $number_PPTX;?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">TCU-Learning chúc bạn học tập tốt!
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <!--weather card-->
              <div class="card card-weather">
                <div class="card-body">
                  <div class="weather-date-location">
                    <?php 
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $mydate=getdate(date("U"));
                        switch ($mydate['weekday']) {
                          case 'Monday':
                            $weekday = "Thứ Hai";
                            break;
                          case 'Tuesday':
                            $weekday = "Thứ Ba";
                            break;
                          case 'Wednesday':
                            $weekday = "Thứ Tư";
                            break;
                          case 'Thursday':
                            $weekday = "Thứ Năm";
                            break;
                          case 'Friday':
                            $weekday = "Thứ Sáu";
                            break;
                          case 'Saturday':
                            $weekday = "Thứ Bảy";
                            break;
                          default:
                            $weekday = "Chủ Nhật";
                            break;
                        }
                        switch ($mydate['month']) {
                          case 'January':
                            $month = "1";
                            break;
                          case 'February':
                            $month = "2";
                            break;
                          case 'March':
                            $month = "3";
                            break;
                          case 'April':
                            $month = "4";
                            break;
                          case 'May':
                            $month = "5";
                            break;
                          case 'June':
                            $month = "6";
                            break;
                          case 'July':
                            $month = "7";
                            break;
                          case 'August':
                            $month = "8";
                            break;
                          case 'September':
                            $month = "9";
                            break;
                          case 'October':
                            $month = "10";
                            break;
                          case 'November':
                            $month = "11";
                            break;
                          default:
                            $month = "12";
                            break;
                        }
                        //echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                      ?>
                    <h3><?php echo $weekday;?></h3>
                    <p class="text-gray">
                      <span class="weather-date"><?php echo "Ngày ".$mydate['mday']." tháng ".$month." năm ".$mydate['year']?></span>
                    </p>
                  </div>
                  <!-- <div class="weather-date-location">
                    <h3>Tông báo 1</h3>
                    <p class="text-gray">
                      <span class="weather-date">Ngày mai được nghỉ học.</span>
                    </p>
                  </div> -->
                </div>
              </div>
              <!--weather card ends-->
            </div>
            <!-- <div class="col-lg-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title text-primary mb-5">Thông tin truy cập</h2>
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2">Đang truy cập</p>
                      <p class="display-3 mb-4 font-weight-light">50</p>
                    </div>
                  </div>
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2">Tổng số truy cập</p>
                      <p class="display-3 mb-5 font-weight-light">2000</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Xem bài giảng</h4>
                  <div class="table-responsive">
                  	<p>Trang xem bài giảng chứa tất cả nội dung bài giảng mà các thầy cô đã đưa lên.</p>
                  	<p>Bài giảng được chia ra làm 4 hình thức để xem.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tự học</h4>
                  <div class="table-responsive">
                  	<p>Trang tự học sẽ có những bài kiểm tra bạn bắt buộc phải làm.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Nhắn tin</h4>
                  <div class="table-responsive">
                  	<p>Trang nhắn tin giúp bạn nhắn tin với thầy cô và bạn bè.</p>
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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
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