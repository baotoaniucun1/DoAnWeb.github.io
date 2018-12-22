<?php
session_start();

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <?php
    include 'modules/include.php';
    ?>
    <title>Chíc Chòe Shop</title>
</head>

<body>

    <div class="container">

 
        <?php
       include 'modules/header.php';
        include 'modules/menu.php';
       include 'modules/content.php';
      
        ?>

       

    </div>
<?php   include 'modules/footer.php'; ?>


    <script src="assets/js/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
   
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/holder.min.js"></script>
   
</body>

</html>
