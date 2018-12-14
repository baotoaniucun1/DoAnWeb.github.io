<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | Product</title>

  <?php
    include 'modules/include.php'; 
  ?>


</head>

<body class="hold-transition sidebar-mini">

<div class="product">
    <div class="wrapper">

        <?php
            include 'modules/header.php';
             include 'modules/sidebar.php';


        ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h3 class="m-0 text-dark">Home / <a href="">Accounts</a></h3>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        
            <div class="action"> 
           
                 <div class="search">
                    <form action="" method="post">
                     <input type="text" name="" value="">
                     <button type="submit">
                        <i class="fa fa-search"></i>
                     </button>               
                   </form>
                 </div>

            </div>

         <div class="content">
          <div class="container-fluid">
            <div class="row">
                  <!-- /.card -->          
                <div class="card">
                  <div class="card-header no-border">
                    <h3 class="card-title">Products</h3>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fa fa-download"></i>
                      </a>
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fa fa-bars">
                        <img src="img/bar.png" alt="Smiley face" height="42" width="42" /></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped table-responsive"">
                      <thead>
                      <tr>
                        <th>.No</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Đơn giá</th>
                        <th>Lượt đánh giá</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                      </tr>
                      </thead>

                      <tbody>
                      <tr>
                        <td>                   
                          1
                        </td>

                        <td>Laptop Dell Inspiron 5560 U</td>

                        <td>
                          <img src="http://imageshack.com/a/img924/5626/qUUor9.png"  alt="Product 1" class="img-circle img-size-50">
                          
                        </td>
                        <td>
                          <small class="text-success mr-1">
                            <i class="fa fa-arrow-up"></i>
                            12%
                          </small>
                          12,000 Sold
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fa fa-search"></i>
                          </a>
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fa fa-cog"></i>
                          </a>
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fa fa-trash-o"></i>
                          </a>
                        </td>
                      </tr>

                      <tr>
                        <td>                   
                          1
                        </td>

                        <td>Laptop Dell Inspiron 5560 U</td>

                        <td>
                          <img src="http://imageshack.com/a/img924/5626/qUUor9.png"  alt="Product 1" class="img-circle img-size-50">
                          
                        </td>
                        <td>
                          <small class="text-success mr-1">
                            <i class="fa fa-arrow-up"></i>
                            12%
                          </small>
                          12,000 Sold
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fa fa-search"></i>
                          </a>
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fa fa-cog"></i>
                          </a>
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                            <i class="fa fa-trash-o"></i>
                          </a>
                        </td>
                      </tr>
              
                     
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card -->
              
              </div>

            </div>
          </div>
          <div class="action">
            <ul class="pagination">
              <li><a href="#">&laquo;</a></li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
               <li><a href="#">&raquo;</a></li>
            </ul>

           
          </div>
        </div>
        
      </div>
</div>
        <?php
            include 'modules/footer.php';
        ?>



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.js"></script>
<script src="js/adminlte.js"></script>

<script src="js/Chart.min.js"></script>

<script src="js/dashboard3.js"></script>
</body>
</html>
