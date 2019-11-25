<!-- dialog change pass -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close dong-cua-so">&times;</span>
    <form method="post">
    <div class="form-group">
      <label for="email">Nhập mật khẩu mới</label>
      <input type="password" class="form-control" id="pass1" placeholder="Enter password" name="pass1">
    </div>
    <div class="form-group">
      <label for="pwd">Nhập lại mật khẩu mới</label>
      <input type="password" class="form-control" id="pass2" placeholder="Enter password" name="pass2">
    </div>
    <button type="submit" name="changePass" class="btn btn-primary">Đổi mật khẩu</button>
  </form>
  <?php
  if (isset($_POST['changePass'])) {
    if ($_POST['pass1'] == $_POST['pass2']) {
      $magv = $_SESSION['giaovien'];
      $newpass = $_POST['pass1'];
      if ($db->changePassGV($magv,$newpass) == true) {
       echo "<script>alert('Thay đổi mật khẩu thành công!')</script>";
     }
     else{
       echo "<script>alert('Thay đổi mật khẩu không thành công!')</script>";
     }
   }
   else{
    echo "<script>alert('Mật khẩu nhập vào không trùng nhau!')</script>";
  }
}
  ?>
  </div>

</div>
<!-- end dialog change pass -->
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <div class="navbar-brand brand-logo">
          <a href="index.php?controller=user&action=giaovien">
            <img src="assets/upload/images/tcu.png" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center cham-ngon">
        <div>Chúc đồng chí có một ngày làm việc vui vẻ!</div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <div id="CountMessNotSeen">
              <span class="count CountMessNotSeen">
                <?php 
                    $n1 = $db->getCountMessNotSeenU1($_SESSION['giaovien']);
                    $n2 = $db->getCountMessNotSeenU2($_SESSION['giaovien']);
                    $n = $n1 + $n2;
                  echo $n; 
                ;?>
              </span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div id="numberMessNotSeen" class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left numberMessNotSeen">Bạn có <?php echo $n;?> tin nhắn chưa xem
                </p>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                </div>
                <div id="listUserSendMess" class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">Danh sách người gửi
                  </h6>
                    <?php
                      $dataU1 = $db->getInFoUserChatU1($_SESSION['giaovien']);

                      foreach($dataU1 as $key => $value)
                      {
                        $namesv1 = $db->getNamaChatSV($value['USER1']);
                        $namegv1 = $db->getNamaChatGV($value['USER1']);
                        if ($namesv1['TENSV'] != "") {
                          echo '<p class="font-weight-light small-text listUserSendMess">'.$namesv1['TENSV'].'</p>';
                         
                        }
                        if ($namegv1['TENGIAOVIEN'] != "") {
                          echo '<p class="font-weight-light small-text listUserSendMess">'.$namegv1['TENGIAOVIEN'].'</p>';
                          
                        }
                      }
                      $dataU2 = $db->getInFoUserChatU2($_SESSION['giaovien']);
                      foreach($dataU2 as $key => $value)
                      {
                        $namesv2 = $db->getNamaChatSV($value['USER2']);
                        $namegv2 = $db->getNamaChatGV($value['USER2']);
                        if ($namesv2['TENSV'] != "") {
                          echo '<p class="font-weight-light small-text listUserSendMess">'.$namesv2['TENSV'].'</p>';
                          
                        }
                        if ($namegv2['TENGIAOVIEN'] != "") {
                          echo '<p class="font-weight-light small-text listUserSendMess">'.$namegv2['TENGIAOVIEN'].'</p>';
                           
                        }
                        
                      }
                  ?>
                  
                  
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Xin chào, <?php echo $_SESSION['tengiaovien'];?></span>
              <img class="img-xs rounded-circle" src="assets/upload/images/favicon.png" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <button class="dropdown-item mt-2" id="myBtn">Đổi Mật Khẩu</button>
            	<form method="post">
            		<input type="submit" class="dropdown-item mt-2" name="signout" value="Đăng Xuất">
            	</form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=user&action=xembaigianggv">
              <i class="menu-icon mdi mdi-laptop"></i>
              <span class="menu-title">Xem bài giảng</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=user&action=thembaigiang">
              <i class="menu-icon mdi mdi-cloud-upload"></i>
              <span class="menu-title">Thêm bài giảng</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=user&action=thembaitap">
              <i class="menu-icon mdi mdi-clipboard-text"></i>
              <span class="menu-title">Thêm bài tập</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=user&action=ketquakiemtra">
              <i class="menu-icon mdi mdi-flag"></i>
              <span class="menu-title">Xem Kết quả kiểm tra</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controller=user&action=nhantingv">
              <i class="menu-icon mdi mdi-facebook-messenger"></i>
              <span class="menu-title">Nhắn tin</span>
            </a>
          </li>
        </ul>
      </nav>