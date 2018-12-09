<?php
if(isset($_POST['submit'])){
    $name;
    $captcha;
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['g-recaptcha-response'])){
        $captcha = $_POST['g-recaptcha-response'];
    }
    if(!$captcha){
        echo '<h2>Hay xac nhan CAPTCHA</h2>';
    }else{
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfeKH8UAAAAAOLCxlSSkpFpG1e0IQIfjGqASkfK=".$captcha."&remoteip=".$_SERVER['']);
        if($response.success == false){
            echo '<h2>SPAM!</h2>';
        }else{
            echo '<h2>'.$name.' Khong phai robot :)</h2>';
        }
    }
}
?>
<html>
<head>
    <title>Google recapcha demo - LeVanToan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <h1>Google reCAPTHA Demo</h1>
    <form id="comment_form" action="123" method="post">
        <input type="text" placeholder="Tên của bạn" size="40" required name="name" />
        <br />
        <br />
        <input type="submit" name="submit" value="Gửi" />
        <br />
        <br />
        <div class="g-recaptcha" data-sitekey="6LfeKH8UAAAAAEfYfOK3zbQNiZE_6sknlZZfFSc0"></div>
    </form>
</body>

<script>
grecaptcha.ready(function() {
grecaptcha.execute('6LfeKH8UAAAAAEfYfOK3zbQNiZE_6sknlZZfFSc0', {action: 'action_name'})
.then(function(token) {
// Verify the token on the server.
});
});
</script>
</html>