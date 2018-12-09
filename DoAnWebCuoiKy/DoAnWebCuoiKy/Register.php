<?php
  if(isset($_POST['submit'])){
    $name;
    $captcha;
    if(isset($_POST['dangky'])){
       $name = $_POST['dangky'];
    }
    if(isset($_POST['g-recaptcha-response'])){
       $captcha = $_POST['g-recaptcha-response'];
    }
    if(!$captcha){
       $thongbao = '<h2>Hay xac nhan CAPTCHA</h2>';
    }else{
       $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret6LfKMH8UAAAAAIMwdXe84ljJfjXSIbWp2d6KQqYN&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
       if($response.success == false){
          echo '<h2>SPAM!</h2>';
       }else{
          echo '<h2>'.$name.' Khong phai robot :)</h2>';
       }
    }
 }
?>
<!DOCTYPE html>
<html lang="vi">

<head>

    <title>Login</title>
    <?php
    include 'modules/include.php';
    ?>

</head>

<body>
    <div class="container">
        <?php
       
        include 'modules/header.php';

        ?>
        <div class="container register">
                <div class="row">
                  
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Chào Mừng Bạn</h3>
                        <p>Rinh ngay quà HOT khi mua sản phẩm. </p>
                        <a href="login.php" > <input type="submit"name="" value="Đăng Nhập"/></a>
                    </div>
                    <div class="col-md-9 register-right">
                      
                      <form  method="POST" action="">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Đăng Ký Tài Khoản</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Confirm Password *" value="" />
                                        </div>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option class="hidden"  selected disabled>Please select your Sequrity Question</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Your Answer *" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister"   name="dangky" value="Đăng Ký"/>
                                        <div class="g-recaptcha" data-sitekey="6LfKMH8UAAAAABkgh7HWzHQ2vyl8SFjY4gNBajKB"></div>
                                   
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        </form>
                    </div>
                </div>

            </div>
    
    </div>
    <?php
        include 'modules/footer.php';
        ?>
    <script src="/assets/js/theme-bundle.main.js"></script>

<script>
grecaptcha.ready(function() {
grecaptcha.execute('6LfeKH8UAAAAAEfYfOK3zbQNiZE_6sknlZZfFSc0', {action: 'action_name'})
.then(function(token) {
// Verify the token on the server.
});
});
</script>   


</body>

</html>