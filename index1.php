<!DOCTYPE html>
<html>
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

button {
    background-color: #4f4f4f;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

.cancelbtn {
    padding: 14px 20px;
    background-color: #CC6633;
}

.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}
.container {
    padding: 50px;
    border-color: #FFE4B5;
}

.modal {
    display: none;
    position: fixed; 
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto;
    background-color: #FFE4B5;
    padding-top: 50px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; 
    border: 1px solid #888;
    width: 50%; 
}

hr {
    border: 1px solid #CD853F;
    margin-bottom: 25px;
}
 


/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}

.error {
  color: #330000;
  font-size: 14px;
  }
</style>

<body>
    <?php
$emailErr =$email ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = " Invalid email format"; 
        }
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
    <form class="modal-content" method="post" onsubmit="return checkSubmit()">
        <div class="container">
            <h1 align="center" style="color: #CD853F">Sign Up</h1>
            <hr>
            <label for="username" style="color: #CD853F"><b>User Name</b></label>
            <input type="text" placeholder="Enter User Name" name="username" required>
            <br>

            <label for="email" style="color: #CD853F"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <div class="error">*
                <?php echo $emailErr;?>
            </div>
            <br>
            <label for="psw" style="color: #CD853F"><b>Password</b></label>
            <input id="txtPass" type="password" placeholder="Enter Password" required name="psw" pattern="(?=.*\d)(?=.*[a-z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                required>
            <br>

            <label for="psw-repeat" style="color: #CD853F"><b>Repeat Password</b></label>
            <input id="txtPass1" type="password" placeholder="Repeat Password" name="psw-repeat" required>
            <br>



            <p>By creating an account you agree to our <a href="#" style="color:#CD853F">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <button type="submit" class="button button--primary" name="btnSubmit" id="btnSubmit" class="signupbtn"
                    align="center">Sign Up</button>
            </div>
        </div>
    </form>
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
</body>

</html>