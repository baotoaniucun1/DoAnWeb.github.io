<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>  
    <?php
    include 'modules/include.php';
    ?>

</head>

<body>  
    <?php
    include 'modules/header.php';
    ?>

    <div class="container">
        <div class="login">
            <ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li class="breadcrumb " itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <a href="index.php" class="breadcrumb-label" itemprop="item">
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="0">
                </li>
                <li class="breadcrumb is-active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                    <meta itemprop="item" content="">
                    <span class="breadcrumb-label" itemprop="name">Login</span>
                    <meta itemprop="position" content="1">
                </li>
            </ul>
            <h1 class="page-heading">Sign in</h1>
            <div class="login-row">
                <form class="login-form form" action="https://store-n0i50vy.mybigcommerce.com/login.php?action=check_login"
                      method="post">


                    <div class="form-field form-field--input form-field--inputEmail">
                        <label class="form-label" for="login_email">Email Address:</label>
                        <input class="form-input" name="login_email" id="login_email" type="email">
                        <span style="display: none;"></span>
                    </div>
                    <div class="form-field form-field--input form-field--inputPassword">
                        <label class="form-label" for="login_pass">Password:</label>
                        <input class="form-input" id="login_pass" type="password" name="login_pass">
                        <span style="display: none;"></span>
                    </div>
                    <div class="form-actions">
                        <input type="submit" class="button button--primary" value="Sign in">
                        <a class="forgot-password" href="https://store-n0i50vy.mybigcommerce.com/login.php?action=reset_password">
                            Forgot
                            your password?
                        </a>
                    </div>
                </form>
                <div class="new-customer">
                    <div class="panel">
                        <div class="panel-header">
                            <h2 class="panel-title">New Customer?</h2>
                        </div>
                        <div class="panel-body">
                            <p class="new-customer-intro">Create an account with us and you'll be able to:</p>
                            <ul class="new-customer-fact-list">
                                <li class="new-customer-fact">Check out faster</li>
                                <li class="new-customer-fact">Save multiple shipping addresses</li>
                                <li class="new-customer-fact">Access your order history</li>
                                <li class="new-customer-fact">Track new orders</li>
                                <li class="new-customer-fact">Save items to your Wish List</li>
                            </ul>
                            <a href="https://store-n0i50vy.mybigcommerce.com/login.php?action=create_account">
                                <button class="button button--primary">
                                    Create
                                    Account
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>    <?php
    include 'modules/footer.php';
    ?>
    <script src="/assets/js/theme-bundle.main.js"></script>
</body>

</html>