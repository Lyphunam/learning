
<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card" style="padding: 20px;">
            <div class="card-header text-center"><img class="logo-img" src="assets/upload/images/tcu.png" alt="logo"><span class="splash-description"><b><h3>Đăng nhập hệ thống</h3></b></span></div>
            <div class="card-body">
                <form method="post" action="index.php?controller=user&action=login">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="text" placeholder="Nhập tài khoản" name="username" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Nhập mật khẩu" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block btn-login">Đăng nhập</button>
                </form>
            </div>
            <!-- <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link"><b>Tạo tài khoản</b></a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link"><b>Quên mật khẩu?</b></a>
                </div>
            </div> -->
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    
