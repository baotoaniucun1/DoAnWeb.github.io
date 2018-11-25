<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>

      <?php
    include 'modules/include.php';
      ?>

</head>


<body>
    <?php
    include 'modules/header.php';
    ?>
    <div>
        <header class="header" role="banner">
            <div id="header"> </div>
        </header>
        <script>
            function checkSubmit() {
                var pass = document.getElementById("txtPass");
                var pass1 = document.getElementById("txtPass1");
                if (pass.value != pass1.value) {
                    alert("Inconrect!");
                    pass1.focus();
                    return false;
                }
                return true;
            }
        </script>
        <div class="container">
            <div class="login">
                <ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li class="breadcrumb " itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a href="index.php" class="breadcrumb-label" itemprop="item"><span
                                itemprop="name">Home</span></a>
                        <meta itemprop="position" content="0">
                    </li>
                    <li class="breadcrumb is-active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <meta itemprop="item" content="">
                        <span class="breadcrumb-label" itemprop="name">Register</span>
                        <meta itemprop="position" content="1">
                    </li>
                </ul>
                <form class="modal-content" method="post" onsubmit="return checkSubmit()">

                    <h1 align="center" style="color: #454545">Register</h1>
                    <hr>
                    <label for="username" style="color: #454545"><b>User Name</b></label>
                    <input class="form-input" placeholder="Enter User Name" name="username" required>
                    <br>

                    <label for="email" style="color: #454545"><b>Email</b></label>
                    <input class="form-input"  placeholder="Enter Email" name="email" required>


                    <br>
                    <label for="psw" style="color: #454545"><b>Password</b></label>
                    <input class="form-input" id="txtPass" type="password" placeholder="Enter Password" required name="psw" pattern="(?=.*\d)(?=.*[a-z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                        required>
                    <br>

                    <label for="psw-repeat" style="color: #454545"><b>Repeat Password</b></label>
                    <input class="form-input" id="txtPass1" type="password" placeholder="Repeat Password" name="psw-repeat" required>
                    <br>



                    <p>By creating an account you agree to our <a href="#" style="color:#454545">Terms & Privacy</a>.</p>

                    <div class="clearfix">
                        <button type="submit" class="button button--primary" name="btnSubmit" id="btnSubmit" class="signupbtn"
                            align="center">Sign Up</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

   <?php
    include 'modules/footer.php';
      ?>
    <script src="/assets/js/theme-bundle.main.js"></script>
</body>

</html>