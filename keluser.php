
<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>STOK BARANG</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">TOKO AMARA </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form method="get" action="stock.php"  class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input name="search" class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <?php require 'menu.php';?>
                           
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">KELOLA USER</h1>
                        <ol class="breadcrumb mb-4">

                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                      <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Tambah user
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Email Admin</th>
                                                <th>Level</th>
                                                <th>Aksi</th>
                
                                        </thead>
                                        <tbody>
                                                                                       <?php
                                            $ambilsemuadatauser = mysqli_query($conn,"select * from login");
                                            $i=1;
                                            while($data=mysqli_fetch_array($ambilsemuadatauser)){
                                                    $em = $data['email'];
                                                    $iduser= $data['iduser'];
                                                    $pw= $data['password'];
                                                    $level= $data['level'];

                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$em?></td>
                                                <td><?=$level?></td>
                                                <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$iduser;?>">
                                                     Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$iduser;?>">
                                                     Delete
                                                </button>
                                                </td>
                                            </tr>
                                             <!-- edit modal modal -->
                                        <div class="modal fade" id="edit<?=$iduser;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Edit User</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method= "post">
                                                <div class="modal-body">
                                                <input type="email" name="emailadmin" value="<?=$em;?>" class = "form-control" placeholder="Email" required> 
                                                <br>
                                                <input type="password" name="passwordbaru" class = "form-control" value="<?=$pw;?>" placeholder="Password">
                                                <br>
                                                <select name="level">
                                                <option value="Admin">Admin</option>
                                                <option value="Kepala Gudang">Kepala Gudang</option>
                                                </select>
                                                <input type="hidden" name="id" value="<?=$iduser;?>">
                                                <button type="submit" class="btn btn-primary" name="updateuser">submit</button>
                                                </div>
                                        </form>
                                                
                                                
                                            </div>
                                            </div>
                                        </div>

                                        <!-- delete modal modal -->
                                        <div class="modal fade" id="delete<?=$iduser;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">HAPUS USER YANG DIPILIH?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method= "post">
                                                <div class="modal-body">
                                                    Apakah  anda yakin ingin menghapus <?=$em;?> ?
                                                    <br>
                                                <input type="hidden" name="id" value="<?=$iduser;?>">
                                                <br>
                                                <button type="submit" class="btn btn-danger" name="hapususer">Hapus</button>
                                                </div>
                                        </form>
                                                
                                                
                                            </div>
                                            </div>
                                        </div>
                                            <?php
                                            };
                                            ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Proyek 2 Gita 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
    
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method= "post">
        <div class="modal-body">
            
          <input type="email" name="email" placeholder="Email" class = "form-control" required> 
          <br>
          <input type="password" name="password" placeholder="Password" class = "form-control" required>
          <br>
            <select name="level">
            <option value="Admin">Admin</option>
            <option value="Kepala Gudang">Kepala Gudang</option>
            </select>
          <button type="submit" class="btn btn-primary" name="adduser">submit</button>
        </div>
</form>
        
        
      </div>
    </div>
  </div>
</html>
