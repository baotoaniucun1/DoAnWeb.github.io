<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Dashboard 3</title>

 <?php
    include 'modules/include.php'; 
  ?>

</head>

<body class="hold-transition sidebar-mini">

<div class="account">
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
                  <p>Tìm kiếm</p>
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
                        <i class="fa fa-bars"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped table-responsive"">
                      <thead>
                      <tr>
                        <th>.No</th>
                        <th>Tên tài khoản</th>
                        <th>Email</th>
                        <th>Giới tính</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                      </tr>
                      </thead>

                      <tbody>
                      <tr>
                        <td>                   
                          1
                        </td>

                        <td>zipzizza</td>

                        <td>
                          zipzizza20@gmail.com
                        </td>
                        <td>
                          Nam
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                           <button>Admin</button>
                          </a>
                        </td>
                        <td><button>bị khóa</button></td>
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

                        <td>zipzizza1</td>

                        <td>
                          zipzizza20@gmail.com
                        </td>
                        <td>
                          Nam
                        </td>
                        <td>
                          <a href="#" class="text-muted">
                           <button>Member</button>
                          </a>
                        </td>
                        <td><button>online</button></td>
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
